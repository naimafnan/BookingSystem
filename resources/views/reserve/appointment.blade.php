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
                        <h6 class="card-subtitle mb-2 text-muted">Select a date</h6>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                {{-- <input id=datepicker name="date" class="form-control" placeholder="choose date"> --}}
                                <input type='text' id="datepicker" class="form-control" name="dateText" placeholder="choose date">
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
                        <h6 class="card-subtitle mb-2 text-muted">Select a time slot</h6>
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="9.30A.M.">
                                    <span>9.30 A.M</span>
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="10.30A.M.">
                                    <span>10.30 A.M</span>
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="2.30P.M.">
                                    <span>2.30 P.M</span>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="doctorId" value="{{ $doctor_id }}"> 
                        <input type="hidden" name="doctorName" value="{{ $doctor->mydoctor->name }}"> 
                        <input type="hidden" name="clinicName" value="{{ $doctor->cli_name }}"> 
                        <input type="hidden" name="docAdd1" value="{{ $doctor->doc_address1 }}"> 
                        <input type="hidden" name="docAdd2" value="{{ $doctor->doc_address2 }}"> 
                        <input type="hidden" name="docAdd3" value="{{ $doctor->doc_address3 }}"> 
                        <input type="hidden" name="docAdd4" value="{{ $doctor->doc_address4 }}"> 
                        <input type="hidden" name="docPostcode" value="{{ $doctor->doc_postcode }}"> 
                        <input type="hidden" name="docState" value="{{ $doctor->doc_state }}"> 
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