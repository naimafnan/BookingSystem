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
        <form action="{{ route('userAppointment') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-body text-center   ">
                            
                            <h4 class="text-center">
                                Doctor Information
                            </h4>
                            <img src="/img/doc.png" style="background-size: cover; border-radius: 999px; height: 120px; width: 120px; margin: 0 auto 20px auto" class="card-img-top" class="img-fluid rounded" class="" alt="...">
                            <br>
                            <p class="lead">
                                Name : {{ ucfirst($doctor->mydoctor->name) }}
                            </p>
                            <p class="lead">  
                                Degree : {{ $doctor->doc_career}}
                            </p>
                            <p class="lead">
                                Specialist : {{ $doctor->doc_specialist }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-2">
                    <div class="card" >
                        <div class="card-body">
                            <h4 class="text-center">
                                Book your Appointment 
                            </h4> 
                            <input type='date' id="datepicker1" class="form-control mb-2" name="dateText" placeholder="Select date"> 
                            @foreach ($appointments as $appointment )
                                <input type="hidden" name="end_time" value="{{ $appointment->time }}"> 
                            @endforeach
                            {{-- @php
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
                                            }
                                        }
                                        return $time;
                                    }
                                    $slot = getTimeSlot(20, $start, $startRest); 
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
                                            }
                                        }
                                        return $time;
                                    }
                                    $slot2 = getTimeSlot2(20, $endRest, $end); 
                            @endphp  --}}
                            @php
                                $test='<input type="text" id="selected" name="selected" value="">'; 
                                
                            @endphp 
                                <select class="form-control mb-2" name="time" id="time">
                                        {{-- <option value="">Select time slot</option>
                                    @foreach ($slot as $slots ) 
                                        <option value="@php print_r($slots); @endphp">@php print_r($slots); @endphp A.M.</option>               
                                    @endforeach
                                    @foreach ($slot2 as $slots )
                                        <option value="@php print_r($slots); @endphp">@php print_r($slots); @endphp P.M.</option>               
                                    @endforeach --}}
                                </select> 
                            
                            <input type="hidden" id="doctor_id" name="doctorId" value="{{ $doctor_id }}"> 
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
                            <input type="hidden" name="doc_email" value="{{ $doctor->mydoctor->email }}">

                            <input class="form-control mb-2" name="reasons" placeholder="Remarks" required>
                            
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
                
            </div>
        </form>
    </div>
@endsection
@push('script')
<script>


    $("#datepicker1").on('change',function(){

        $('#time').html('');
        $('#time').append('<option value="">----- Processing -----</option>');
        $('#time').attr("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ route('getTime') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "datepicker": $('#datepicker1').val(),
                "doctor_id": $('#doctor_id').val()
            },
        success: function (data) { 
            // console.log(data);
                        $('#time').html('');
                        $('#time').append('<option value="">----- Please Select -----</option>');
                        $.each(data, function(i,v)
                        {
                            $('#time').append('<option value="'+ v + '">'+ v + '</option>');
                        });

                        $('#time').select().prop("disabled", false);
                    }        
            
        });
    });
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        $('#datepicker1').attr('min', maxDate);
});


</script>
@endpush
