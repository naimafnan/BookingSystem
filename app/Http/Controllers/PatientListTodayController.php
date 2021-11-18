<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\NotificationDoctorCancelBooking;
use Illuminate\Support\Carbon;
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
        $date=Carbon::parse($request->date)->format('Y-m-d');
        $time=Carbon::parse($request->time)->format('H:i:s');
        $notificationCancelBookingbyDoctor=[
            'user_name'=>request()->get('user_name'),
            'time'=>request()->get('time'),
            'date'=>Carbon::parse($date)->format('d/m/Y'),
            'doctor_name'=>request()->get('doctorName'),
            'user_email'=>request()->get('user_email'),
            'cli_name'=>request()->get('clinicName'),
            'doctor_add1'=>request()->get('docAdd1'),
            'doctor_add2'=>request()->get('docAdd2'),
            'doctor_add3'=>request()->get('docAdd3'),
            'doctor_add4'=>request()->get('docAdd4'),
            'doctor_postcode'=>request()->get('docPostcode'),
            'doctor_state'=>request()->get('docState')
        ];
        Mail::to(request()->get('user_email') )->send(new \App\Mail\NotificationDoctorCancelBooking($notificationCancelBookingbyDoctor));
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
