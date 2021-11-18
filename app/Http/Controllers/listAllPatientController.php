<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class listAllPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $dates=$request->input('date');
        $appointments=Appointment::where('doctor_id',auth()->user()->id)->where('date','>',date('Y-m-d'))->get();
        return view('doctor.listAllPatient',compact('appointments'));
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
        // $appointments->prescription=$request->prescription;
        $appointments->status=1;
        $appointments->update();
        return redirect()->back()->with('msg','This patient has attended the appointment');
    }
    public function cancelBooking(Request $request)
    {
        $user_id=$request->input('user_id');
        $times=$request->input('time');
        $dates=$request->input('date');
        // $appointments = Appointment::where('user_id',$user_id)->where('status',0)->get();
        $appointments=Appointment::where('user_id',$user_id)->where('time',$times)->where('date',$dates)->first();
        // $appointments->prescription=$request->prescription;
        $appointments->status=2;
        $appointments->update();
        return redirect()->back()->with('msg','You have cancel this appointment');
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
