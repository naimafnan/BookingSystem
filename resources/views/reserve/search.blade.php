@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-12 text-center">
            <h1>A New Experience with Booking</h1>
        </div>
    </div>
    <div class="mb-5">
        <form class="form-inline justify-content-center" action="{{ url('/search') }}" method="GET" role="search">
            {{csrf_field()}}
            <select class="form-control" id="service" name="service">
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
            <span>&nbsp;</span>
            {{-- nak masukkan satu category location & clinic  --}}
            <select class="form-control" name="clinic" id="clinic">
                <option value="">Clinic Name</option>
                <option value="klinik Mawar">klinik mawar</option>
                <option value="klinik Cempaka">klinik Cempaka</option>
                <option value="klinik Melur">klinik Melur</option>
                <option value="klinik Rafidah">klinik Rafidah</option>
                <option value="klinik Hamzah">klinik Hamzah</option>
                <option value="klinik Bahagia">klinik Bahagia</option>              
                <option value="klinik Rahim">klinik Rahim</option>                
                
            </select>
            <span>&nbsp;</span>
            <input type="text" class="form-control" name="add" placeholder="Enter Location" id="add" >
            <span>&nbsp;</span>
            <input type="text" class="form-control" name="keyword" placeholder="Enter Doctor,Clinic,etc.. " id="keyword" >
            <span>&nbsp;</span>
            <button type="submit" class="btn btn-outline-primary">Search</button>
            <span>&nbsp;</span>
        </form>
    </div>    
    <div class="container">
        
        <div class="row">
            @forelse ($reserves as $reserve)
                <div class="col-sm-4 mb-3">
                    <div class="card text-center h-100">
                        <img src="/img/doc.png" style="background-size: cover; border-radius: 999px; height: 150px; width: 150px; margin: 0 auto 20px auto" class="card-img-top" class="img-fluid rounded" class="" alt="...">
                        
                        <div class="card-body">
                            {{-- @foreach ($mydoctor as $doctor)
                            <h1 class="card-title">{{ $$mydoctor->mydoctor->name }}</h1>
                            @endforeach --}}
                            
                            <h1 class="card-title text-black">{{ ucfirst($reserve->mydoctor->name) }}</h1>
                            <p class="card-text">{{ $reserve->doc_career }}</p>
                            <p class="card-text text-black-50">Specialty</p>
                            <p class="card-text">{{ $reserve->doc_specialist }}</p>
                            <p class="card-text text-black-50">Location</p>
                            <p class="card-text">{{ $reserve->cli_name }}</p>
                            <p class="card-text">{{ $reserve->mydoctor->address1 }},{{ $reserve->mydoctor->address2 }},{{ $reserve->mydoctor->address3 }},{{ $reserve->mydoctor->address4 }},{{ $reserve->mydoctor->postcode }},{{ $reserve->mydoctor->state }}</p>
                            {{-- <p class="card-text">{{ $reserve->doc_location }}</p> --}}
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
    </div>
</div>
@endsection