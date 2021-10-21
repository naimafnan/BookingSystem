@extends('admin.layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 .col-sm-8 mb-3"> 
            <div class="card" >
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Time Slot</h6>
                    {{-- <div class="row"> --}}
                        <div class="col-xl-6 mb-3">
                            <form action="" method="GET" role="search">
                                {{csrf_field()}}
                                <select class="form-control mb-3" name="TimeSlots" id="TimeSlots">
                                    <option value="">Time Slots</option>
                                    <option value="15">15 Minutes</option>              
                                    <option value="30">30 Minutes</option>              
                                    <option value="45">45 Minutes</option>              
                                    
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection