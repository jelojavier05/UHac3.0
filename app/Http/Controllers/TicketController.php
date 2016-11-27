<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = DB::table('tblRules')
            ->select('*')
            ->get();

        return view('ticketing')
            ->with('rules', $rules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->arrViolation);
        $request->session()->put('licenseNumber', $request->licenseNumber);
        $request->session()->put('arrViolation', $request->arrViolation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $licenseNumber = $request->session()->get('licenseNumber');
        $arrViolation = $request->session()->get('arrViolation');
        $enforcerID = $request->session()->get('id');

        $violationHeaderID = DB::table('tblViolationHeader')->insertGetId([
            'intVHEnfoId' => $enforcerID,
            'strVHDriver' => $licenseNumber
        ]);

        foreach($arrViolation as $value){
            DB::table('tblViolationDetail')->insert([
                'intVDVH' => $violationHeaderID,
                'intDVRules' => $value
            ]);
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
