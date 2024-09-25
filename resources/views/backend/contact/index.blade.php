@extends('layouts.backend_master')
@section('title')
    Contact
@endsection
@section('content')
    <div class="row">
        <div class="m-auto col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3>Contact List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
