@extends('layouts.app')
@section('content')

    <h2>View Bookings</h2>
    <hr>

    <p>
        <a class="btn btn-outline-primary mx-1 "
           href="/bookings/create">Create new booking</a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped" id="book-table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Company Name</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Date</th>
                <th scope="col">Course Total</th>
                <th scope="col">Active Record</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{$booking->id}}</th>
                    <td>{{$booking->first_name}} </td>
                    <td>{{$booking->last_name}}</td>
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->phone}}</td>
                    <td>{{$booking->company_name}}</td>
                    <td>{{$booking->coursedate->course->course_name}}</td>
                    <td>@php echo ($booking->coursedate->scheduled_date)->format('d-m-Y') @endphp</td>
                    <td>${{$booking->course_total}}</td>
                    <td>@if($booking->isActive == 0)
                            Inactive
                        @endif</td>
                    <td>
                        <form action="/bookings/{{$booking->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            @auth
                                <a class="btn btn-outline-primary mx-1 "
                                   href="/bookings/{{$booking->id}}">Show</a>
                                <a class="btn btn-outline-success mx-1"
                                   href="/bookings/{{$booking->id}}/edit">Edit</a>

                            @endauth
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
