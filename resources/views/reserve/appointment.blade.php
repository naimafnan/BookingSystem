@extends('layouts.app')

@section('content')
    
    <div class="container">
        @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif
        @if(Session::has('errmsg'))
            <div class="alert alert-danger">
                {{Session::get('errmsg')}}
            </div>
        @endif
        <div class="row mb-3">
            
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center   ">
                        
                        <h4 class="text-center">
                            Doctor Information
                        </h4>
                        <img src="/img/doc.png" style="background-size: cover; border-radius: 999px; height: 150px; width: 150px; margin: 0 auto 20px auto" class="card-img-top" class="img-fluid rounded" class="" alt="...">
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5">
                                <label for="5">☆</label> 
                            <input type="radio" name="rating" value="4" id="4">
                                <label for="4">☆</label> 
                            <input type="radio" name="rating" value="3" id="3">
                                <label for="3">☆</label> 
                            <input type="radio" name="rating" value="2" id="2">
                                <label for="2">☆</label> 
                            <input type="radio" name="rating" value="1" id="1">
                                <label for="1">☆</label>
                        </div>
                        <br>
                        <p class="lead">
                            Name : {{ ucfirst($doctor->mydoctor->name) }}
                        </p>
                        <p class="lead"> 
                            {{-- Degree : {{ $user->doctordetails->doc_career}} --}}
                            Degree : {{ $doctor->doc_career}}
                        </p>
                        <p class="lead">
                            Specialist : {{ $doctor->doc_specialist }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('userAppointment') }}" method="post">
            @csrf
            <div class="col-12 .col-sm-8 mb-3">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="text-center">
                            Book your Appointment 
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted">Date</h6>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                {{-- <input id=datepicker name="date" class="form-control" placeholder="choose date"> --}}
                                <input type='text' id="datepicker" class="form-control" name="dateText" placeholder="Select date" >
                                {{-- <div id="datepicker"></div> --}} 
                            </div>
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-sm">check available time</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 .col-sm-8 mb-3">   
                <span>&nbsp;</span>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Time Slot</h6>
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                {{-- <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="9:30 A.M.">
                                    <span>9.30 A.M.</span>
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="10:30 A.M.">
                                    <span>10.30 A.M</span>
                                </label> --}}
                                {{-- @foreach ($time as $times) --}}
                                {{-- <label class="btn btn-outline-primary">
                                    
                                // $sometimeOut=15;
                                // $i=0;
                                //     while(strtotime( $doctor->start_time) <= strtotime( $doctor->end_time)){
                                //         $start = $doctor->start_time;
                                        
                                //         $end = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($doctor->start_time)));
                                //         $doctor->start_time = date('H:i',strtotime('+'.$sometimeOut.' minutes',strtotime($doctor->start_time)));
                                //         $i++;
                                //         if(strtotime($doctor->start_time) <= strtotime( $doctor->end_time)){
                                //             $time[$i]['start'] = $start;
                                //             $time[$i]['end'] = $end;
                                //             echo $start;
                                //         }
                                //     }
                                //     return $time;
                                //     echo $time ;--}}
                                @foreach ($appointments as $appointment )
                                    <input type="hidden" name="end_time" value="{{ $appointment->time }}"> 
                                @endforeach
                                @php
                                    // $date=$date;     
                                    // if ($dates=>)
                                        
                                    // endif  
                                    //check if user choose date then display  time slots 
                                    $sometimeOut=20;
                                    $start=$doctor->start_time;
                                    $startRest=$doctor->start_rest_time;
                                    $endRest=$doctor->end_rest_time;
                                    $end=$doctor->end_time;
                                    function getTimeSlot($sometimeOut, $start, $startRest)
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
                                                    // $time[$i]['end'] = $end;
                                                }
                                            }
                                            return $time;
                                        }
                                        $slot = getTimeSlot(20, $start, $startRest);
                                        // if($slot==$appointments->time)
                                        // echo "<pre>";
                                        // print_r($slot);
                                    function getTimeSlot2($sometimeOut, $endRest, $end)
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
                                                    // $time[$i]['end'] = $end;
                                                }
                                            }
                                            return $time;
                                        }
                                        $slot2 = getTimeSlot2(20, $endRest, $end);
                                        // $test=array($slot2);
                                        // $test2 = implode(" ",$test);
                                        // echo "<pre>";
                                        // print_r($slot2);
                                @endphp
                                {{-- </label>  --}}
                                {{-- {{ $slot2 }} --}}
                                {{-- @foreach ($slot as $slots )
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value=@php
                                        print_r($slots);
                                    @endphp>
                                    <span>@php
                                        print_r($slots);
                                    @endphp A.M.</span>
                                </label>
                                
                                
                                @endforeach
                                @foreach ($slot2 as $slots )
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value=@php print_r($slots); @endphp>
                                    <span>@php print_r($slots); @endphp P.M.</span>
                                    </label>
                                
                                
                                @endforeach --}}
                                @php
                                    $test = '<input type="text" id="selected" name="selected" value="">';
                                    //  echo $test;
                                     
                                @endphp
                                {{-- @if ($test = null) --}}
                                    <select class="form-control" name="time" id="time">
                                            <option value="">Select time slot</option>
                                        @foreach ($slot as $slots )
                                            {{-- @if ($slots==$)
                                            @endif --}}
                                            <option value="@php print_r($slots); @endphp">@php print_r($slots); @endphp A.M.</option>               
                                        @endforeach
                                        @foreach ($slot2 as $slots )
                                            <option value="@php print_r($slots); @endphp">@php print_r($slots); @endphp P.M.</option>               
                                        @endforeach
                                    </select>
                                    {{-- @else
                                    <p>sdfsdfsdfs</p>
                                @endif --}}
                            </div>
                        </div>                       
                        
                        <input type="hidden" name="doctorId" value="{{ $doctor_id }}"> 
                        <input type="hidden" name="doctorName" value="{{ $doctor->mydoctor->name }}"> 
                        <input type="hidden" name="clinicName" value="{{ $doctor->cli_name }}"> 
                        <input type="hidden" name="docAdd1" value="{{ $doctor->mydoctor->address1 }}"> 
                        <input type="hidden" name="docAdd2" value="{{ $doctor->mydoctor->address2 }}"> 
                        <input type="hidden" name="docAdd3" value="{{ $doctor->mydoctor->address3 }}"> 
                        <input type="hidden" name="docAdd4" value="{{ $doctor->mydoctor->address4}}"> 
                        <input type="hidden" name="docPostcode" value="{{ $doctor->mydoctor->postcode }}"> 
                        <input type="hidden" name="docState" value="{{ $doctor->mydoctor->state }}"> 
                        <input type="hidden" name="start_time" value="{{ $doctor->start_time }}"> 
                        <input type="hidden" name="end_time" value="{{ $doctor->end_time }}"> 
                        
                        
                        @if (Auth::check())
                            <button type="submit" class="btn btn-success btn-lg main-blink">Proceed</button> 
                        @else
                            <p>Please login or register to make an appointment</p>
                            <a href="{{ route('register') }}">Register</a><br>
                            <a href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
