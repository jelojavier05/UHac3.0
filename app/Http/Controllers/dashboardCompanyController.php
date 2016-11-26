<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\SmartCounter as smartCounter;

class dashboardCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboardCompany');
    }

    public function getMunicipalityTickets(Request $request){
        $municipalityID = $request->session()->get('id');

        $tickets = DB::table('tblMunicipal')
            ->join('tblEnforcer', 'tblEnforcer.intEnfoMunicipal', '=', 'tblMunicipal.intMunicipalId')
            ->join('tblViolationHeader', 'tblViolationHeader.intVHEnfoId', '=', 'tblEnforcer.intEnfoId')
            ->join('tblDriver', 'tblDriver.strDrivLicense', '=' ,'tblViolationHeader.strVHDriver')
            ->select('tblViolationHeader.intVHId', 'tblEnforcer.strEnfoFname', 'tblEnforcer.strEnfoLname',
                'tblDriver.strDrivFname', 'tblDriver.strDrivLname', 'tblDriver.strDrivLicense', 'tblViolationHeader.datToday',
                'tblViolationHeader.blStatus')
            ->where('tblMunicipal.intMunicipalId', $municipalityID)
            ->get();

        return response()->json($tickets);
    }

    public function paymentInCompany(Request $request){
        $ticketID = $request->ticketID;
        $latestID = DB::table('tblPayment')
            ->select('strTransactionId')
            ->orderBy('strTransactionId','desc')
            ->first();
        $smartCounter = new SmartCounter();
        $counter = $smartCounter->smartcounter($latestID->strTransactionId);

        $rules = DB::table('tblViolationDetail')
            ->join('tblRules', 'tblRules.intRulesId', '=' ,'tblViolationDetail.intDVRules')
            ->select('dblRuleFine')
            ->where('tblViolationDetail.intVDVH', $ticketID)
            ->get();

        $dblTotal = 0;
        foreach($rules as $value){
            $dblTotal += $value->dblRuleFine;
        }

        DB::table('tblPayment')->insert([
            'strTransactionId' => $counter,
            'strViolationHeaderId' => $ticketID,
            'strPaidTo' => 'Municipal',
            'dblAmount' => $dblTotal
        ]);

        DB::table('tblViolationHeader')
            ->where('intVHId', $ticketID)
            ->update([
                'blStatus' => 1,
                'datDatePaid' => Date('Y-m-d')
            ]);
    }

    public function claimInCompany(Request $request){
        $ticketID = $request->ticketID;
        DB::table('tblViolationHeader')
            ->where('intVHId', $ticketID)
            ->update([
                'blStatus' => 2,
                'datDatePaid' => Date('Y-m-d')
            ]);
    }
}
