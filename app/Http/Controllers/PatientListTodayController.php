<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PatientListTodayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $appointments=Appointment::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->get();
        return view("doctor.patientList",compact('appointments'));
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
    public function update(Request $request)
    {
        
        $user_id=$request->input('user_id');
        $times=$request->input('time');
        $dates=$request->input('date');
        // $appointments = Appointment::where('user_id',$user_id)->where('status',0)->get();
        $appointments=Appointment::where('user_id',$user_id)->where('time',$times)->where('date',$dates)->first();
        $appointments->prescription=$request->prescription;
        $appointments->status=1;
        $appointments->update();
        return redirect()->back()->with('msg','Prescription has been created');
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
