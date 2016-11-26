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
		$rules = array(
			'transId' => 'required',
			'PaidTo' => 'required',
            'amount' => 'required',
		);
		$messages = [
		    'required' => 'The :attribute field is required.',
		];
		$niceNames = array(
		    'transId' => 'Transaction ID',
		    'PaidTo' => 'Paid To',
		    'amount' => 'Amount',
		);
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            // return Redirect::route('/Payment')->withErrors($validator);
        }
        try{
        	$transId = $request->input('transId');
        	$PaidTo = $request->input('PaidTo');
        	$amount = $request->input('amount');
        	$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.us.apiconnect.ibmcloud.com/ubpapi-dev/sb/api/RESTs/payment",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"channel_id\":\"BLUEMIX\",\"transaction_id\":\"$transId\",\"source_account\":\"100188510270\",\"source_currency\":\"php\",\"biller_id\":\"$PaidTo\",\"reference1\":\"000000000A\",\"reference2\":\"000000000B\",\"reference3\":\"000000000C\",\"amount\":$amount}",
			  CURLOPT_HTTPHEADER => array(
			    "accept: application/json",
			    "content-type: application/json",
			    "x-ibm-client-id:7c695a6c-43e0-409d-ad4e-3f73633db3e2",
			    "x-ibm-client-secret:rH2rN7sX4yW1eA0rX6mX5wY2gM6gY5tI8iR3lP0jU3vE4bW8aE"
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
					// Redirect with error message
				} else {
					try{
						DB::beginTransaction();  

						$strDate =  date('Y-m-d');
					  	$VH = ViolationHeader::find(4);
			            $VH->blStatus = 1;
			            $VH->datDatePaid = $strDate;
			            $VH->strConfirmationNo = $manage['confirmation_no'];
			            $VH->save();

			            $Payment = new Payment();
			            $Payment->strTransactionId = $transId;
			            $Payment->strViolationHeaderId = 4;
			            $Payment->strPaidTo = $PaidTo;
			            $Payment->dblAmount = $amount;
			            $Payment->save();
			            DB::commit();
					} catch(Exception $f){
						DB::rollBack();
						$f->getMessage();
					}
					
				}
			}
        } catch(Exception $e){
        	$e->getMessage();
        }
	}
}
