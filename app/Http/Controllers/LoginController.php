<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function loginDriver(Request $request){
        $driverID = DB::table('tblDriver')
            ->select('intDrivId', 'strDrivLicense')
            ->where('strDrivUname', $request->username)
            ->where('strDrivPword', $request->password)
            ->first();
        if(is_null($driverID)){
            return response()->json(false);
        }else{
            $request->session()->put('id', $driverID->strDrivLicense);
            return response()->json(true);
        }
    }

    public function loginEnforcer(Request $request){
        $enforcerID = DB::table('tblEnforcer')
            ->select('intEnfoId')
            ->where('strUsername', $request->username)
            ->where('strPassword', $request->password)
            ->first();
        if(is_null($enforcerID)){
            return response()->json(false);
        }else{
            $request->session()->put('id', $enforcerID->intEnfoId);
            return response()->json(true);
        }
    }  
    public function loginCompany(Request $request){
        $companyID = DB::table('tblMunicipal')
            ->select('intMunicipalId')
            ->where('strUsername', $request->username)
            ->where('strPassword', $request->password)
            ->first();
        if(is_null($companyID)){
            return response()->json(false);
        }else{
            $request->session()->put('id', $companyID->intMunicipalId);
            return response()->json(true);
        }
    }   

    public function logout(Request $request){
        $request->session()->flush();
    }
}
