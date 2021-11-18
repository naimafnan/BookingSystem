<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationCancelBooking;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $appointments=Appointment::where('id',$appointmentId)->where('user_id',auth()->user()->id)->where('time',$times)->where('date',$dates)->where('status',0)->update(array('status'=>2));
        // dd($appointments);
        $date=Carbon::parse($request->date)->format('Y-m-d');
        $notificationCancelBooking=[
            'name'=>auth()->user()->name,
            'time'=>request()->get('time'),
            'date'=>Carbon::parse($date)->format('d/m/Y'),
            'doctor_name'=>request()->get('doctorName'),
            'doctor_email'=>request()->get('doc_email'),
            'cli_name'=>request()->get('clinicName'),
            'doctor_add1'=>request()->get('docAdd1'),
            'doctor_add2'=>request()->get('docAdd2'),
            'doctor_add3'=>request()->get('docAdd3'),
            'doctor_add4'=>request()->get('docAdd4'),
            'doctor_postcode'=>request()->get('docPostcode'),
            'doctor_state'=>request()->get('docState')
        ];
        Mail::to(request()->get('doc_email') )->send(new \App\Mail\NotificationCancelBooking($notificationCancelBooking));
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
