@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @forelse ($appointments as $key=>$appointment)
            <div class="col-md-8 mb-3">
                <div class="card bg-white">
               
                    <div class="card-header bg-info">Booking Details</div>
                    <div class="card-body">
                        
                            <h6 class="card-title text-black-50">Doctor's Name :</h6>
                            <h5 class="card-text">{{ $appointment->appUser->name }}</h5>
                            <h6 class="card-title text-black-50">Time :</h6>
                            <h5 class="card-text">{{ $appointment->time }}</h5>
                            <h6 class="card-title text-black-50">Date :</h6>
                            <h5 class="card-text">{{ $appointment->date }}</h5>
                            <h6 class="card-title text-black-50">Location :</h6>
                            <h5 class="card-text">{{ $appointment->docApp->doc_address1 }},{{ $appointment->docApp->doc_address2 }},{{ $appointment->docApp->doc_address3 }},{{ $appointment->docApp->doc_address4 }},{{ $appointment->docApp->doc_postcode }},{{ $appointment->docApp->doc_state }}</h5>
                            <h6 class="card-title text-black-50">Clinic's name :</h6>
                            <h5 class="card-text">{{ $appointment->docApp->cli_name }}</h5>
                            <h6 class="card-title text-black-50">Status :</h6>
                                @if($appointment->status==0)
                                <button class="btn btn-primary">Not visited</button>
                                @else 
                                <button class="btn btn-success"> Cheked</button>
                                @endif
                        
                    </div>
                </div>
            </div>
            @empty
            <h3>You have no any appointments</h3>
            @endforelse
        </div>
    </div>
@endsection