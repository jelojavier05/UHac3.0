<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get("id");
        $ViolationDetails = DB::select("SELECT e.intEnfoId, d.strDrivLicense, d.strDrivAccNo, d.strDrivUname, m.strMunicName, r.strRuleDesc, r.dblRuleFine, vh.blStatus, e.intEnfoId, CONCAT(e.strEnfoFname,' ',e.strEnfoLname) AS EnfoFullName, vh.datToday, vh.intVHId
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
                WHERE d.strDrivLicense = '$id' AND vh.blStatus = 0");


         $history = DB::select("SELECT vh.*, CONCAT(e.strEnfoFname,' ',e.strEnfoLname) AS EnfoFullName FROM tblViolationHeader AS vh
                INNER JOIN tblDriver AS d ON
                vh.strVHDriver = d.strDrivLicense
                INNER JOIN tblEnforcer AS e ON
                vh.intVHEnfoId = e.intEnfoId
                WHERE d.strDrivLicense = '$id' AND vh.blStatus > 0");

        $DriverDetails = DB::table('tblDriver')
            ->join('tblLicenseType', 'tblLicenseType.intLicenseId', '=' ,'tblDriver.intLicenseType')
            ->select('*')
            ->where('strDrivLicense', $id)
            ->first();
            $strDrivAccNo = $DriverDetails->strDrivAccNo;
            $strFullName = $DriverDetails->strDrivFname . ' ' . $DriverDetails->strDrivLname;
            $strLicense = $DriverDetails->strDrivLicense;
            $strLicenseType = $DriverDetails->strLicenseType;
            $datExpiration = $DriverDetails->datExpiration;
        $intVHId = 0;
        $strMunicipal = "";
        $strEnfoFullName = "";
        $datViolationDay = "";
        $intVioCounter = 0;
        foreach ($ViolationDetails as $value) {
            $intVHId = $value->intVHId;
            $strMunicipal = $value->strMunicName;
            $strEnfoFullName = $value->EnfoFullName;
            $datViolationDay = $value->datToday;
            $enforcerID = $value->intEnfoId;
            $intVioCounter++;
            break;
        }

        return view('dashboard', ['history' => $history, 'FullName' => $strFullName, 'License' => $strLicense, 'LicenseType' => $strLicenseType, 'datExpiration' => $datExpiration, 'datViolationDay' => $datViolationDay, 'strMunicipal' => $strMunicipal, 'strEnfoFullName' => $strEnfoFullName, 'intVioCounter' => $intVioCounter, 'ViolationDetails' => $ViolationDetails,'strDrivAccNo' => $strDrivAccNo, 'intVHId' => $intVHId, 'enforcerID' => $enforcerID]);
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
