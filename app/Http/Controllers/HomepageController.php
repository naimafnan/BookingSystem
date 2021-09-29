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
        $check=$this->checkBookingTimeInterval();
        if($check){
            return redirect()->back()->with('errmsg','You have already booked an appointment');
        }
        $date=Carbon::parse($request->dateText);
        $time=Carbon::parse($request->time); 
        Appointment::create([
            'user_id'=>auth()->user()->id,
            'doctor_id'=>$request->doctorId,
            'time'=>$time,
            'date'=>$date,
            'status'=>0,
        ]);
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
        $user=User::where('id',$doctorId)->first();
        $doctor_id=$doctorId;
        return view('reserve.appointment',compact('user','doctor_id'));
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
            $location=$request->get('location');
            $cli_name=$request->get('clinic');
            $address=$request->get('add');
            $services=$request->get('service');
            //get all data from db
            $reserves=doctor::all();
            $users=User::all();
            if($keyword){
                $reserves=doctor::where("doc_service","LIKE","%".$keyword."%")
                ->orWhere("cli_name","LIKE","%".$keyword."%")
                ->orWhere("doc_specialist","LIKE","%".$keyword."%")
                ->get();
                $users=User::where("name","LIKE","%".$keyword."%");
            }
            if($location){
                $reserves=doctor::where('doc_location','LIKE','%'.$location.'%')->get();
            }
            if($cli_name){
                $reserves=doctor::where('cli_name','LIKE','%'.$cli_name.'%')->get();
            }
            if($services){
                $reserves=doctor::where('doc_service','LIKE','%'.$services.'%')->get();
            }
            if($address){
                $reserves=doctor::where('doc_address1','LIKE','%'.$address.'%')
                ->orWhere("doc_address2","LIKE","%".$address."%")
                ->orWhere("doc_address3","LIKE","%".$address."%")
                ->orWhere("doc_address4","LIKE","%".$address."%")
                ->orWhere("doc_postcode","LIKE","%".$address."%")
                ->orWhere("doc_state","LIKE","%".$address."%")
                ->orWhere("doc_location","LIKE","%".$address."%")
                ->get();
            }
            return view('reserve.search',compact('reserves'));
        }

        public function checkTime(Request $request){
            
            //get date as input
            $date=$request->get('date');
            // $start_time=doctor::where('start_time',$start_time);
            // $reserves=doctor::where('start_time',$start_time)->get();
            //logic query : where start_time + duration 1 hour(timeType) 
            // $newYear = new Carbon('first day of January 2016');
            return view('reserve.checkdate',compact('date'));
        }

        // public function getTimeSlot($interval,$start_time,$end_time){
        //     //create time slot available doctor
        //     // $start=new DateTime($start_time);
        //     // $end=new DateTime($end_time);
        //     // $startTime=$start->format('H:i');
        //     // $endTime=$end->format('H:i');

        //     // $i=0;
        //     // $time=[];

        //     // while(strtotime($startTime)<=strtotime($endTime)){
        //     //     $start=$startTime;
        //     //     $end=date('H:i',strtotime('+'.$interval.'minutes',strtotime($startTime)));
        //     //     $startTime=date('H:i',strtotime('+'.$interval.'minutes',strtotime($startTime)));
        //     //     $i++;
        //     //     if(strtotime($startTime)<=strtotime($endTime)){
        //     //         $time[$i]['start_time']=$start;
        //     //         $time[$i]['end_time']=$end;
        //     //     }
        //     // }   



        // }

        // $today = Carbon::today(); // 2017-04-01 00:00:00
        // $allTimes = [];
        // array_push($allTimes, $today->toTimeString()); //add the 00:00 time before looping
        // for ($i = 0; $i <= 95; $i ++){ //95 loops will give you everything from 00:00 to 23:45
        //     $today->addMinutes(15); // add 0, 15, 30, 45, 60, etc...
        //     array_push($allTimes, $today->toTimeString()); // inserts the time into the array like 00:00:00, 00:15:00, 00:30:00, etc.
        // }
        public function timeSlot(){
            // $time=new CarbonPeriod('08:00','15 minutes','13:00');
            // $slots=[];
            // foreach($time as $item){
            //     array_push($slots,$item->format("h:i A"));
            // }

            // $dates=[];
            // $slots=$start_time->diffInMinutes($end_time)/$interval;

            // $dates[$start_time->toDateString()][]=$start_time->toTimeString();
            // for($i=1;$i<=$slots;$i++){
            //     $dates[$start_time->toDateString()][]=$start_time->addMinute($interval)->toTimeString();

            // }
            // dd($dates);

            $start_time=Carbon::now();
            $newDateTime=Carbon::now()->addMinutes(5);
            return view('reserve.appointment',compact('dates'));
        }
        public function myBooking(){
            $appointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
            return view('booking.index',compact('appointments'));
        }

        public function checkBookingTimeInterval()
        {
            return Appointment::orderby('id','desc')
                ->where('user_id',auth()->user()->id)
                ->whereDate('created_at',date('Y-m-d'))
                ->exists();
        }

        
}
