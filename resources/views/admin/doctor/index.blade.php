@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    List Doctor
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive-sm">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th class="nosort">Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Specialist</th>
                                    <th>Service</th>
                                    <th>Clinic Name</th>
                                    <th>Actions</th>
                                    <th class="nosort">&nbsp;</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has('msg'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('msg') }}
                                    </div>
                                @endif
                                @forelse ($users as $user)
                                    
                                    <tr>
                                        <td><img src="\img\user1.png" class="table-user-thumb" alt=""></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->doctorDetails->doc_specialist}}</td>
                                        <td>{{ $user->doctorDetails->doc_service}}</td>
                                        <td>{{ $user->doctorDetails->cli_name }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <form action=""  method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success mb-1" style="float: right">
                                                        <i class="fas fa-check"> Approve</i>
                                                    </button>
                                                </form>

                                                <form action=""  method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn" style="float: :left">
                                                        <i class="fas fa-check" style="display: inline"> View document</i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h5>You have no doctor.</h5>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection