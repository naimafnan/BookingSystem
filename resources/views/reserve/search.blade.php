@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row text-center">
        <div class="col-12 text-center">
            <h1>A New Experience with Booking</h1>
        </div>
    </div>
    <div class="mb-5">
        <form class="form-inline justify-content-center" action="{{ url('/search') }}" method="GET" role="search">
            {{csrf_field()}}
            <select class="form-control mb-2 mr-2" id="service" name="service">
                <option value="">Service</option>
                <optgroup label="Doctor"><!-- Use "select" to create object -->
                    <option value="Fomema Examinations">Fomema Examinations</option>
                    <option value="X-ray">X-ray</option>
                <optgroup label="Car Rental" disabled><!-- Add all applicable options -->
                    <option>MPVs</option>
                    <option>Sedan</option>
                    <option>Coupe</option>
                <!-- add selected to change default from first option -->
                <optgroup label="Meeting Room" disabled> <!-- To create nested options for categories use "optgroup" -->
                    <option>Lecture Hall</option>
                    <option>T shape</option>
                    <option>Hollow Square Style</option>
            </select>
            {{-- nak masukkan satu category location & clinic  --}}
            <select class="form-control mb-2 mr-2" name="clinic" id="clinic">
                <option value="">Clinic Name</option>
                @foreach ($reserves as $reserve )
                    <option value="{{ $reserve->cli_name }}">{{ $reserve->cli_name }}</option> 
                @endforeach
                
            </select>
            {{-- <span>&nbsp;</span> --}}
            <input type="text" class="form-control mb-2 mr-2" name="add" placeholder="Enter Location" id="add" >
            {{-- <span>&nbsp;</span> --}}
            <input type="text" class="form-control mb-2 mr-2" name="keyword" placeholder="Enter Doctor,Clinic,etc.. " id="keyword" >
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>    
    {{-- <div class="container"> --}}
        
        <div class="row mb-3">
            @forelse ($reserves as $reserve)
                <div class="col-sm-4 mb-2">
                    <div class="card text-center h-100">
                        <img src="/img/doc.png" style="background-size: cover; border-radius: 999px; height: 120px; width: 120px; margin: 0 auto 0 auto" class="card-img-top" class="img-fluid rounded" class="" alt="...">
                        
                        <div class="card-body">
                            {{-- @foreach ($mydoctor as $doctor)
                            <h1 class="card-title">{{ $$mydoctor->mydoctor->name }}</h1>
                            @endforeach --}}
                            
                            <h1 class="card-title text-black">{{ ucfirst($reserve->name) }}</h1>
                            <p class="card-text">{{ $reserve->doctorDetails->doc_career }}</p>
                            <p class="card-text text-black-50">Specialty</p>
                            <p class="card-text">{{ $reserve->doctorDetails->doc_specialist }}</p>
                            <p class="card-text text-black-50">Location</p>
                            <p class="card-text">{{ $reserve->doctorDetails->cli_name }}</p>
                            <p class="card-text">{{ $reserve->address1 }},{{ $reserve->address2 }},{{ $reserve->address3 }},{{ $reserve->address4 }},{{ $reserve->postcode }},{{ $reserve->state }}</p>
                            {{-- <p class="card-text">{{ $reserve->mydoctor->address1 }},{{ $reserve->mydoctor->address2 }},{{ $reserve->mydoctor->address3 }},{{ $reserve->mydoctor->address4 }},{{ $reserve->mydoctor->postcode }},{{ $reserve->mydoctor->state }}</p> --}}
                            
                        </div>
                        <div class="card-footer bg-transparent">
                                <a href="{{ route('booking',[$reserve->id]) }}" class="btn btn-primary">Book Appointment</a>
                        </div>
                    </div>
                </div>
            @empty
            <h4>No doctors available yet</h4>
            @endforelse
        </div>
    {{-- </div> --}}
</div>
@endsection