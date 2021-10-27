@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-12 text-center">
            <h1>A New Experience with Booking</h1>
        </div>
        <div class="col-12">
        </div>
    </div>
    <div class="mb-5">
        <form class="form-inline justify-content-center" action="{{ url('/search') }}" method="GET" role="search">
            {{csrf_field()}}
             <!-- Can add label if want -->
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
            <select class="form-control mb-2 mr-2" name="clinic" id="clinic">
                <option value="">Clinic Name</option>
                @foreach ($reserves as $reserve )
                <option value="{{ $reserve->cli_name }}">{{ $reserve->cli_name }}</option> 
                @endforeach
            </select>
            <input type="text" class="form-control mb-2 mr-2" name="add" placeholder="Enter Location" id="add" >
            <input type="text" class="form-control mb-2 mr-2" name="keyword" placeholder="Enter Doctor,Clinic,Speicalist,etc.. " id="keyword" >
            <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
        </form>
    </div>
</div>
@endsection