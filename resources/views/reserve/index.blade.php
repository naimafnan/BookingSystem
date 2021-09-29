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
            <select class="form-control" name="clinic" id="clinic">
                <option value="">Clinic Name</option>
                <option value="klinik Mawar">klinik mawar</option>
                <option value="klinik Cempaka">klinik Cempaka</option>
                <option value="klinik Melur">klinik Melur</option>
                <option value="klinik Rafidah">klinik Rafidah</option>
                <option value="klinik Hamzah">klinik Hamzah</option>
                <option value="klinik Bahagia">klinik Bahagia</option>                 
                <option value="klinik Seri">klinik Wardah</option>                 
                <option value="klinik Seri">klinik Petaling</option>                 
                <option value="klinik Seri">klinik Hamzah</option>                 
                <option value="klinik Seri">klinik Rahim</option>                
                
            </select>
            <span>&nbsp;</span>
            <input type="text" class="form-control " name="add" placeholder="Enter Location" id="add" >
            <span>&nbsp;</span>
            <input type="text" class="form-control" name="keyword" placeholder="Enter Doctor,Clinic,Speicalist,etc.. " id="keyword" >
            <span>&nbsp;</span>
            <button type="submit" class="btn btn-outline-primary">Search</button>
            <span>&nbsp;</span>
        </form>
    </div>
</div>
@endsection