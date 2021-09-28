@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($appointments as $appointment)
            <div class="col-md-8">
                <div class="card bg-white">
               
                    <div class="card-header bg-info">Booking Details</div>
                    <div class="card-body">
                        
                            <h6 class="card-title text-black-50">Doctor's Name :</h6>
                            <h5 class="card-text"></h5>
                            <h6 class="card-title text-black-50">Time :</h6>
                            <h5 class="card-text">{{ $appointment->time }}</h5>
                            <h6 class="card-title text-black-50">Date :</h6>
                            <h5 class="card-text">{{ $appointment->date }}</h5>
                            <h6 class="card-title text-black-50">Status :</h6>
                                @if($appointment->status==0)
                                <button class="btn btn-primary">Not visited</button>
                                @else 
                                <button class="btn btn-success"> Cheked</button>
                                @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection