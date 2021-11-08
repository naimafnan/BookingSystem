<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class myBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        // $appointments=Appointment::all();
        return view('booking.bookingDetails',compact('appointments'));
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
        //query to cancel every appointment
        $appointmentId=$request->input('appointmentId');
        $times=$request->input('time');
        $dates=$request->input('date');
        $doctorId=$request->input('doctorId');
        // $Appointments =Appointment::where('id',$appointmentId)->where('user_id',auth()->user()->id)->where('doctor_id',$doctorId)->where('date',$dates)->where('time',$times)->update(array('status'=>2));
        $appointments=Appointment::where('id',$appointmentId)->where('user_id',auth()->user()->id)->where('time',$times)->where('date',$dates)->update(array('status'=>2));
        
        return redirect()->back()->with('success', 'Your booking has been cancelled !');
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
