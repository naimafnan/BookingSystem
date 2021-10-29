@extends('admin.layouts.main')
@section('content')
<div class="container">
    <form action="{{ url('/doctor-update') }}" method="POST" role="search">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12 .col-sm-8 mb-3"> 
                @if (Session::has('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('msg') }}
                        </div>
                @endif
                <div class="card" >
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Schedule Time</h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="">Start Time</label>
                                    <input class="form-control mb-2" type="time" id="Start Time" name="Startime" value="{{ $doctors->start_time }}">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="">End Time</label>
                                    <input class="form-control mb-2" type="time" id="End Time" name="EndTime" value="{{ $doctors->end_time }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <label for="">Start Rest Time</label>
                                    <input class="form-control mb-2" type="time" id="startRestTime" name="startRestTime" value="{{ $doctors->start_rest_time }}">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="">End Rest Time</label>
                                    <input class="form-control mb-2" type="time" id="endRestTime" name="endRestTime" value="{{ $doctors->end_rest_time }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <label for="">Time Slot </label>
                                    <select class="form-control mb-2"  name="TimeSlots" id="TimeSlots" onchange="change_state();" aria-valuenow="{{ $doctors->slot_duration }}">
                                        <option value="">Time Slots</option>
                                        <option value="15" {{ $doctors->slot_duration == 15 ? 'selected' : '' }}>15 Minutes</option>              
                                        <option value="30"{{ $doctors->slot_duration == 30 ? 'selected' : '' }} >30 Minutes</option>              
                                        <option value="45" {{ $doctors->slot_duration == 45 ? 'selected' : '' }}>45 Minutes</option>
                                        <option value="60" {{ $doctors->slot_duration == 60 ? 'selected' : '' }}>1 hour</option>
                                    </select>
                                </div>
                            </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection