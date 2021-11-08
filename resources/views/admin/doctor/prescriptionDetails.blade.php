<div class="modal fade" id="exampleModal{{$appointment->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('prescription') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="app">
                    <input type="hidden" name="user_id" value="{{$appointment->user_id}}">
                    <input type="hidden" name="date" value="{{$appointment->date}}">
                    <input type="hidden" name="time" value="{{$appointment->time}}">
                    <div class="form-group">
                        {{-- <label>Feedback</label> --}}
                        <textarea name="prescription" class="form-control" placeholder="Feedback">{{ $appointment->prescription }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>