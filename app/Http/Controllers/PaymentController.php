<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmartCounter AS SmartCounter;
use App\Payment AS Payment;
use App\ViolationHeader AS ViolationHeader;
use App\Http\Requests;
use DB;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{
	
	public function index(){

		// Get Transaction Id
		$strIds = DB::table('tblPayment')->select('strTransactionId')->get();
		foreach($strIds as $strId){
            $strLatest = $strId->strTransactionId;
        }
        $counter = new SmartCounter();
        $strCounter = $counter->smartcounter($strLatest);

        // Get Violation Header Id
        $TransactionDetails = DB::select('SELECT d.strDrivLicense, d.strDrivAccNo, d.strDrivUname, m.strMunicName, r.strRuleDesc, r.dblRuleFine
			FROM tblViolationHeader AS vh
				INNER JOIN tblViolationDetail AS vd
					ON vh.intVHid = vd.intVDVH
				INNER JOIN tblDriver AS d
					ON vh.strVHDriver = d.strDrivLicense
				INNER JOIN tblRules AS r
					ON vd.intDVRules = r.intRulesId
				INNER JOIN tblEnforcer AS e
					ON vh.intVHEnfoId = e.intEnfoId
				INNER JOIN tblMunicipal AS m
					ON e.intEnfoMunicipal = m.intMunicipalId
				WHERE vh.intVHId = 4;');
        $dblTotalFine = 0;
        foreach($TransactionDetails AS $detail){
        	$strDrivLicense = $detail->strDrivLicense;
        	$strDrivAccNo = $detail->strDrivAccNo;
        	$strDrivUname = $detail->strDrivUname;
        	$strMunicName = $detail->strMunicName;
        	$strRuleDesc = $detail->strRuleDesc;
        	$dblRuleFine = $detail->dblRuleFine;
        	$dblTotalFine += $dblRuleFine;
        }
		// $counter = new SmartCounter();
  //           $Payment = new Payment();
  //           $Payment->strTransactionId = $counter->smartcounter($latest);
		return view('payment', ['strDrivLicense' => $strDrivLicense, 'strDrivAccNo' => $strDrivAccNo,'strDrivUname' => $strDrivUname,'strMunicName' => $strMunicName,'strRuleDesc' => $strRuleDesc,'dblRuleFine' => $dblRuleFine,'dblTotalFine' => $dblTotalFine,'strCounter' => $strCounter, 'TransactionDetails' => $TransactionDetails]);
	}

	public function transact(Request $request){
		
		$strIds = DB::table('tblPayment')->select('strTransactionId')->get();
		foreach($strIds as $strId){
            $strLatest = $strId->strTransactionId;
        }
        $counter = new SmartCounter();
        $strCounter = $counter->smartcounter($strLatest);

		$rules = array(
			'strDrivAccNo' => 'required',
			'strMunicipal' => 'required',
            'dblTotalFine' => 'required',
		);
		$messages = [
		    'required' => 'The :attribute field is required.',
		];
		$niceNames = array(
		    'strDrivAccNo' => 'Account Number',
		    'strMunicipal' => 'Municipal',
		    'dblTotalFine' => 'Total Fine',
		);
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        try{
        	$strDrivAccNo = $request->input('strDrivAccNo');
        	$strMunicipal = $request->input('strMunicipal');
        	$dblTotalFine = $request->input('dblTotalFine');
        	$intVHId = $request->input('intVHId');
        	$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.us.apiconnect.ibmcloud.com/ubpapi-dev/sb/api/RESTs/payment",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"channel_id\":\"BLUEMIX\",\"transaction_id\":\"$strCounter\",\"source_account\":\"$strDrivAccNo\",\"source_currency\":\"php\",\"biller_id\":\"$strMunicipal\",\"reference1\":\"000000000A\",\"reference2\":\"000000000B\",\"reference3\":\"000000000C\",\"amount\":$dblTotalFine}",
			  CURLOPT_HTTPHEADER => array(
			    "accept: application/json",
			    "content-type: application/json",
			    "x-ibm-client-id:3cb17028-fb48-4d55-86c4-747e1792ef9b",
			    "x-ibm-client-secret:pD7oB0jE1eO2pI0iH8lO7lL3eO3mP2hB1xX5kK5kU4gP1mJ0vG"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$manage = (array) json_decode($response);
				if($manage['status'] == 'F'){
					return Redirect::back()->withErrors($manage);
				} else {
					try{
						DB::beginTransaction();  

						$strDate =  date('Y-m-d');
					  	$VH = ViolationHeader::find($intVHId);
			            $VH->blStatus = 1;
			            $VH->datDatePaid = $strDate;
			            $VH->strConfirmationNo = $manage['confirmation_no'];
			            $VH->save();

			            $Payment = new Payment();
			            $Payment->strTransactionId = $strCounter;	
			            $Payment->strViolationHeaderId = $intVHId;
			            $Payment->strPaidTo = $strMunicipal;
			            $Payment->dblAmount = $dblTotalFine;
			            $Payment->save();
			            DB::commit();
			            return redirect('/dashboard')->with('manage', $manage);
					} catch(Exception $f){
						DB::rollBack();
						echo $f->getMessage();
					}
				}
			}
        } catch(Exception $e){
        	echo $e->getMessage();
        	
        }
	}
}
