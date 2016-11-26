<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $summary = new \stdClass();
        $driverData = DB::table('tblDriver')
            ->join('tblLicenseType', 'tblLicenseType.intLicenseId', '=', 'tblDriver.intLicenseType')
            ->select('tblDriver.*', 'tblLicenseType.strLicenseType')
            ->where('strDrivLicense', $request->session()->get('licenseNumber'))
            ->first();
        $driverData->strDate = (new Carbon($driverData->datExpiration))->toFormattedDateString();
        $summary->driverData = $driverData;
        $arrViolation = array();
        foreach($request->session()->get('arrViolation') as $value){
            $violation = DB::table('tblRules')
                ->select('*')
                ->where('intRulesId', $value)
                ->first();

            array_push($arrViolation, $violation);
        }
        $summary->arrViolation = $arrViolation;

        return view('summary')
            ->with('summary', $summary);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
