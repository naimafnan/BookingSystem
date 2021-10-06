@extends('layouts.app')
@section('content')

    <div class="container">
      @forelse ($appointments as $appointment)
        <div class="row mb-3 ml-3 mr-3">
            <div class="column" style="background-color:#ffffff;">
              {{-- insert important information of booking details then after user click the column will redirect to booking details of appointment --}}
              <h6 class="card-title text-black-50">Clinic</h6>
              <b><p class="card-text" style="font-size:25px;font-family: Arial, Helvetica, sans-serif;">{{ $appointment->docApp->cli_name }}</p></b>
              {{-- <h6 class="card-title text-black-50">Date :</h6>
              <h5 class="card-text">{{ $appointment->date }}</h5>
              <h6 class="card-title text-black-50">Time :</h6>
              <h5 class="card-text">{{ $appointment->time }}</h5> --}}
              <h6 class="card-title text-black-50">Status</h6>
                @if($appointment->status==0)
                  <b><p class="" style="font-size:18px;font-family: Arial, Helvetica, sans-serif;">Not visited</p></b>
                @else 
                  <b><p class="" style="font-size:18px;font-family: Arial, Helvetica, sans-serif;"> Checked</p></b>
                @endif
              <a href="{{ url('/BookingDetails',[$appointment->id]) }}" style="text-align: right">click</a>
            </div>
        </div>
      @empty
      <h3>You have no any appointments</h3>
      @endforelse
    </div>
@endsection