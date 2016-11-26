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
    public function index()
    {
        $ViolationDetails = DB::select('SELECT d.strDrivLicense, d.strDrivAccNo, d.strDrivUname, m.strMunicName, r.strRuleDesc, r.dblRuleFine, vh.blStatus, e.intEnfoId, CONCAT(e.strEnfoFname," ",e.strEnfoLname) AS EnfoFullName, vh.datToday
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
                WHERE d.strDrivLicense = "D06-11-009386" AND vh.blStatus = 0');

         $ViolationDetails2 = DB::select('SELECT d.strDrivLicense, d.strDrivAccNo, d.strDrivUname, m.strMunicName, r.strRuleDesc, r.dblRuleFine, vh.blStatus, e.intEnfoId, CONCAT(e.strEnfoFname," ",e.strEnfoLname) AS EnfoFullName, vh.datToday
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
                WHERE d.strDrivLicense = "D06-11-009386" AND vh.blStatus = 1');

        $DriverDetails = DB::select('SELECT CONCAT(d.strDrivFname," ",d.strDrivLname) AS "FullName", d.strDrivLicense, d.datExpiration, lt.strLicenseType 
                FROM tblDriver AS d
                    INNER JOIN tblLicenseType AS lt
                        ON d.intLicenseType = lt.intLicenseId
                        WHERE d.strDrivLicense = "D06-11-009386"');
        foreach ($DriverDetails as $value) {
            $strFullName = $value->FullName;
            $strLicense = $value->strDrivLicense;
            $strLicenseType = $value->strLicenseType;
            $datExpiration = $value->datExpiration;
        }
        $strMunicipal = "";
        $strEnfoFullName = "";
        $datViolationDay = "";
        $intVioCounter = 0;
        foreach ($ViolationDetails as $value) {
            $strMunicipal = $value->strMunicName;
            $strEnfoFullName = $value->EnfoFullName;
            $datViolationDay = $value->datToday;
            $intVioCounter++;
            break;
        }

        $strMunicipal2 = "";
        $strEnfoFullName2 = "";
        $datViolationDay2 = "";
        $intVioCounter2 = 0;

        foreach ($ViolationDetails2 as $value2) {
            $strMunicipal2 = $value2->strMunicName;
            $strEnfoFullName2 = $value2->EnfoFullName;
            $datViolationDay2 = $value2->datToday;
            $intVioCounter2++;
            break;
        }
        return view('dashboard', ['FullName' => $strFullName, 'License' => $strLicense, 'LicenseType' => $strLicenseType, 'datExpiration' => $datExpiration, 'datViolationDay' => $datViolationDay, 'strMunicipal' => $strMunicipal, 'strEnfoFullName' => $strEnfoFullName, 'intVioCounter' => $intVioCounter, 'ViolationDetails' => $ViolationDetails]);
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
