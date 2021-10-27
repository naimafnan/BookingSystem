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
        return view('reserve.index');
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
        //$dateTime = Carbon::parse($request->your_datetime_field);
        //$request['your_datetime_field'] = $dateTime->format('Y-m-d H:i:s');
        //$("input").datepicker({ dateFormat: 'dd, mm, yy' });
        //store booking user
        // $date = $request->input('dateFrom');
        // $data = $request->all();
        // $data['transaction_date'] = Carbon::createFromFormat('m/d/Y', $request->transaction_date)->format('Y-m-d');
        // $transaction = Transaction::create($data);
        // $date=$request->input('date');
        // $date=$request->input('datepicker');
        // $date['date']=Carbon::createFromFormat('d/m/Y',$request->date)->format('Y-m-d');
        // $date_variable = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        // $date=Carbon::createFromFormat('d-m-y',$request->date->format('Y-m-d'));
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
                // $reserves=doctor::where("cli_name","LIKE","%".$keyword."%")
                // ->orWhere("cli_name","LIKE","%".$keyword."%")
                // ->orWhere("doc_specialist","LIKE","%".$keyword."%")
                // ->get();

                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->Where("users.name","LIKE","%".$keyword."%")
                ->orWhere("doctors.cli_name","LIKE","%".$keyword."%")
                ->orWhere("doctors.doc_specialist","LIKE","%".$keyword."%")
                ->get();
                // dd($reserves);
                // $reserves=User::select('*')
                // ->Where("users.name","LIKE","%".$keyword."%")
                // ->with('doctorDetails')
                // ->get();

                // $reserves=doctor::where("*")
                // ->with('mydoctor')
                // ->get();
            }
            if($cli_name){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->where('cli_name','LIKE','%'.$cli_name.'%')
                ->get();
            }
            if($services){
                $reserves=User::join("doctors","doctors.user_id","=","users.id")
                ->where('doc_service','LIKE','%'.$services.'%')->get();
            }
            if($address){
                // $reserves=User::join("doctors","doctors.user_id","=","users.id")
                // ->Where("users.address2","LIKE","%".$address."%")
                // ->orWhere("users.address3","LIKE","%".$address."%")
                // ->orWhere("users.address4","LIKE","%".$address."%")
                // ->orWhere("users.postcode","LIKE","%".$address."%")
                // ->orWhere("users.state","LIKE","%".$address."%")
                // ->get();
                $reserves=User::where('address1','LIKE','%'.$address.'%')
                ->orWhere("address2","LIKE","%".$address."%")
                ->orWhere("address3","LIKE","%".$address."%")
                ->orWhere("address4","LIKE","%".$address."%")
                ->orWhere("postcode","LIKE","%".$address."%")
                ->orWhere("state","LIKE","%".$address."%")
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
            ->whereDate('date',$request->datepicker)
            ->get();
         $data2=[];
            foreach($time as $times){
                $timeSlot =  $this->getTimeSlot($sometimeOut, $start, $startRest);
                $data1=[];
                foreach($timeSlot as $timeSlots){
                    if(Carbon::parse($times->time)->format('H:i') != $timeSlots){
                            $dataAm = $timeSlots;
                    }
                    array_push($data1,$dataAm);
                }
                    // $arr = array_merge($data2,$data1);
                    array_push($data2,$data1);
                }

        //    dd($arr);

                
        //    combine result timeslot,timeslot2 and send in json format to ajax
            return response()->json(['data'=>$data2]);
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
