@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            {{-- @foreach ($appointments as $key=>$appointment) --}}
            <div class="col-md-8 mb-3">
                <div class="card bg-white">
               
                    <div class="card-header bg-info">Booking Details</div>
                    <div class="card-body">
                        
                            <h6 class="card-title text-black-50">Doctor's Name</h6>
                            <h5 class="card-text">{{ $appointments->appUser->name }}</h5>
                            <h6 class="card-title text-black-50">Time</h6>
                            <h5 class="card-text">{{ $appointments->time }}</h5>
                            <h6 class="card-title text-black-50">Date</h6>
                            <h5 class="card-text">{{ $appointments->date }}</h5>
                            <h6 class="card-title text-black-50">Location</h6>
                            <h5 class="card-text">{{ $appointments->docApp->doc_address1 }},{{ $appointments->docApp->doc_address2 }},{{ $appointments->docApp->doc_address3 }},{{ $appointments->docApp->doc_address4 }},{{ $appointments->docApp->doc_postcode }},{{ $appointments->docApp->doc_state }}</h5>
                            <h6 class="card-title text-black-50">Clinic's name</h6>
                            <h5 class="card-text">{{ $appointments->docApp->cli_name }}</h5>
                            <h6 class="card-title text-black-50">Status</h6>
                                @if($appointments->status==0)
                                <h5 class="">Not visited</h5>
                                @else 
                                <h5 class=""> Checked</h5>
                                @endif
                        
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection