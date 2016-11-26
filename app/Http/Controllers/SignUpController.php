<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/signup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $id = DB::table('tblDriver')->insertGetId([
                'strDrivLicense' => $request->strDrivLicense,
                'strDrivAccNo' => $request->strDrivAccNo,
                'strDrivUname' => $request->strDrivUname,
                'strDrivPword' => $request->strDrivPword,
                'strDrivFname' => $request->strDrivFname,
                'strDrivLname' => $request->strDrivLname,
                'strDrivMname' => $request->strDrivMname,
                'intLicenseType' => $request->intLicenseType,
            ]);

            foreach ($request->arrRestriction as $value) {
                DB::table('tblDriverRestriction')->insert([
                    'intDRRestId' => $value,
                    'strDRLicense' => $request->strDrivLicense
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
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
