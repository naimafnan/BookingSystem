@extends('layouts.app')
@section('content')
    <div class="container">
      @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
      @endif
        <h2>History</h2>
      <form action="{{ url('/booking-cancel') }}" method="POST">
        @csrf
        @forelse ($appointments as $appointment)
        <input type="hidden" name="appointmentId" value="{{ $appointment->id }}">
        <input type="hidden" name="time" value="{{ $appointment->time }}">
        <input type="hidden" name="date" value="{{ $appointment->date }}">
        <input type="hidden" name="docAdd1" value="{{ $appointment->appUser->address1 }}">
        <input type="hidden" name="docAdd2" value="{{ $appointment->appUser->address2 }}">
        <input type="hidden" name="docAdd3" value="{{ $appointment->appUser->address3 }}">
        <input type="hidden" name="docAdd4" value="{{ $appointment->appUser->address4 }}">
        <input type="hidden" name="docPostcode" value="{{ $appointment->appUser->postcode }}">
        <input type="hidden" name="docState" value="{{ $appointment->appUser->state }}">
        <input type="hidden" name="doctorName" value="{{ $appointment->appUser->name }}">
        <input type="hidden" name="doc_email" value="{{ $appointment->appUser->email }}">
        <input type="hidden" name="clinicName" value="{{ $appointment->docApp->cli_name }}">
          <ul class="list-group">
            <b><li class="list-group-item mb-2" style="font-size:18px;font-family: Arial, Helvetica, sans-serif;">{{ $appointment->docApp->cli_name }} </b>
              <p class="text-black-50" style="font-size: 15px">{{ $appointment->date }} {{ $appointment->time }} <a href="{{ url('/BookingDetails',[$appointment->id]) }}" class="fa fa-angle-right" style="float: right;font-size:36px" ></a><br>
                @if($appointment->status==0)
                  Not visited
                @elseif($appointment->status==2)
                  Cancelled
                @else
                  Checked
                @endif
              </p>
              @if ($appointment->status==0)
                <button class="btn btn-danger" type="submit">cancel</button>
              @endif
            </li>
          </ul>
        @empty
        <h3>You have no any appointments</h3>
        @endforelse
      </form>
    </div>
@endsection