@extends('admin.layouts.main')
@section('content')
<div class="container">
    <form action="" method="POST" role="search">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12 .col-sm-8 mb-3"> 
                <div class="card" >
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Schedule Time test</h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="">Start Time</label>
                                    <input class="form-control mb-2" type="time" id="Start Time" name="Start Time">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="">End Time</label>
                                    <input class="form-control mb-2" type="time" id="End Time" name="End Time">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <label for="">Start Rest Time</label>
                                    <input class="form-control mb-2" type="time" id="startRestTime" name="startRestTime">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="">End Rest Time</label>
                                    <input class="form-control mb-2" type="time" id="endRestTime" name="endRestTime">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <label for="">Time Slot</label>
                                    <select class="form-control mb-2" name="TimeSlots" id="TimeSlots">
                                        <option value="">Time Slots</option>
                                        <option value="15">15 Minutes</option>              
                                        <option value="30">30 Minutes</option>              
                                        <option value="45">45 Minutes</option>
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