<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\User;
use App\Models\Time;
use App\Models\Appointment;
use DateTime;
use Carbon\CarbonPeriod;
use App\Mail\Notification;
use App\Mail\NotificationDoctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Timer\Duration;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reserves=doctor::all();
        return view('reserve.index',compact('reserves'));
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
        $request->validate(['dateText'=>'required']);
        $request->validate(['time'=>'required']);
        //validate 1 booking only
        // $check=$this->checkBookingTimeInterval();
        // if($check){
        //     return redirect()->back()->with('errmsg','You have already booked an appointment');
        // }
        $date=Carbon::parse($request->dateText)->format('Y-m-d');
        $time=Carbon::parse($request->time)->format('H:i:s'); 
        Appointment::create([
            'user_id'=>auth()->user()->id,
            'doctor_id'=>$request->doctorId,
            'time'=>$time,
            'date'=>$date,
            'status'=>0,
        ]);
        //send email notification
        $appointment=Appointment::all();
        $notificationBooking=[
            'name'=>auth()->user()->name,
            'time'=>$time,
            'date'=>$date,
            'doctor_name'=>request()->get('doctorName'),
            'cli_name'=>request()->get('clinicName'),
            'doctor_add1'=>request()->get('docAdd1'),
            'doctor_add2'=>request()->get('docAdd2'),
            'doctor_add3'=>request()->get('docAdd3'),
            'doctor_add4'=>request()->get('docAdd4'),
            'doctor_postcode'=>request()->get('docPostcode'),
            'doctor_state'=>request()->get('docState')
            
        ];
        $notificationDoctor=[
            'name'=>auth()->user()->name,
            'time'=>$time,
            'date'=>$date,
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
        Mail::to(auth()->user()->email)->send(new \App\Mail\Notification($notificationBooking));
        Mail::to(request()->get('doc_email') )->send(new \App\Mail\NotificationDoctor($notificationDoctor));
        return redirect()->back()->with('msg','Your appointment was booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($doctorId)
    {
        $appointments=Appointment::where('doctor_id',$doctorId)->get();
        $doctor=doctor::where('id',$doctorId)->first();
        $doctor_id=$doctorId;

        return view('reserve.appointment',compact('doctor','doctor_id','appointments'));
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
    public function search(Request $request){
            $keyword=$request->get('keyword');
            $cli_name=$request->get('clinic');
            $address=$request->get('add');
            $services=$request->get('service');
            //get all data from db
            $reserves=doctor::all();
            $reserves=User::join("doctors","doctors.user_id","=","users.id")
            ->where('role_id','=','2')->get();
            // dd($reserves);
            if($keyword){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->Where("users.name","LIKE","%".$keyword."%")
                ->orWhere("doctors.cli_name","LIKE","%".$keyword."%")
                ->orWhere("doctors.doc_specialist","LIKE","%".$keyword."%")
                ->get();
            }
            if($cli_name){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->where('doctors.cli_name','LIKE','%'.$cli_name.'%')
                ->get();
            }
            if($services){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->where('doctors.doc_service','LIKE','%'.$services.'%')->get();
            }
            if($address){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->where('users.address1','LIKE','%'.$address.'%')
                ->orWhere("users.address2","LIKE","%".$address."%")
                ->orWhere("users.address3","LIKE","%".$address."%")
                ->orWhere("users.address4","LIKE","%".$address."%")
                ->orWhere("users.postcode","LIKE","%".$address."%")
                ->orWhere("users.state","LIKE","%".$address."%")
                ->get();
            }
            return view('reserve.search',compact('reserves'));
        }
        public function myBooking(){
            $appointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
            // $appointments=Appointment::all();
            return view('booking.bookingDetails',compact('appointments'));
        }
        public function BookingDetails($appointmentsId){
            $appointments=Appointment::where('id',$appointmentsId)->first();
            $appointments_id=$appointmentsId;
            return view('booking.index',compact('appointments','appointments_id'));
        }

        public function checkBookingTimeInterval()
        {
            return Appointment::orderby('id','desc')
                ->where('user_id',auth()->user()->id)
                ->whereDate('created_at',date('Y-m-d'))
                ->exists();
        }

        public function getTime(Request $request) {
            $doctor=doctor::where('id',$request->doctor_id)->first();

            $sometimeOut=20;
            $start=$doctor->start_time;
            $startRest=$doctor->start_rest_time;
            $endRest=$doctor->end_rest_time;
            $end=$doctor->end_time;
            // dapatkan masa based on tarikh ($request->datepicker).
            $time = Appointment::select('time')
            ->where('doctor_id',$request->doctor_id)
            ->whereDate('date',$request->datepicker)
            ->get();
            $data2=[];
            $timeSlot = $this->getTimeSlot($sometimeOut, $start, $startRest);
            $data1=[];
            $data3=[];
            foreach($timeSlot as $timeSlots){
                // foreach($time as $times){
                    // if($timeSlots != Carbon::parse($times->time)->format('H:i')){
                        $arr=array($timeSlots);
                        // $arr2=array(Carbon::parse($times->time)->format('H:i'));
                        
                        // $combined = array_merge($arr,$arr2);
                        // $result =array_intersect($arr,$arr2);
                        // $output=array_diff($arr,$arr2);
                        $dataAm = $arr;
                        // $dataAm=array(1, 2, 3, 4);

                        // dd($dataAm);
                    // }
                // }
                // dd($arr2);
                
                array_push($data1,$dataAm);
            }
            foreach($time as $times){
                $arr2=array(Carbon::parse($times->time)->format('H:i'));
                $data = $arr2;
                // $data = array(3, 4, 5, 6);
                array_push($data2,$data);
            }
                // $data4=array_unique( array_merge($data1, $data2) );
                // $output=array_diff($data1,$data2);
                $combined = array_intersect($data1,$data2);
                // array_push($data3,$output);
                // $data4=implode(",",$data3);
                // dd($combined);

        //    dd($arr);


                
        //    combine result timeslot,timeslot2 and send in json format to ajax
            return response()->json(['data'=>$combined]);
        }

        private function getTimeSlot($sometimeOut, $start, $startRest)
            {
                $start = new DateTime($start);
                $end = new DateTime($startRest);
                $BeginTimeStemp = $start->format('H:i'); // Get time Format in Hour and minutes
                $lastTimeStemp = $end->format('H:i');
                $i=0;
                while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                    $start = $BeginTimeStemp;
                    $end = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
                    $BeginTimeStemp = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
                    $i++;
                    if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                                           
                            $time[$i]= $start; 
                    
                    }
                }
                return $time;
            }
        private function getTimeSlot2($sometimeOut, $endRest, $end)
            {
                $start = new DateTime($endRest);
                $end = new DateTime($end);
                $BeginTimeStemp = $start->format('H:i'); // Get time Format in Hour and minutes
                $lastTimeStemp = $end->format('H:i');
                $i=0;
                while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                    $start = $BeginTimeStemp;
                    $end = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
                    $BeginTimeStemp = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
                    $i++;
                    if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                        $time[$i] = $start; 
                    }
                }
                return $time;
            }

        
}
