@extends('layouts.app')
@section('content')

    <h2>Booking details</h2>

    @if($booking->isActive == 0)
        <div class="alert alert-danger" role="alert">Inactive Record</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Field</th>
                <th scope="col">Entry</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="col">ID</th>
                <th scope="row">{{$booking->id}}</th>
            </tr>
            <tr>
                <th scope="col">Firstname</th>
                <td scope="row">{{$booking->first_name}}</td>
            </tr>
            <tr>
                <th scope="col">Lastname</th>
                <td scope="row">{{$booking->last_name}}</td>
            </tr>
            <tr>
                <th scope="col">Email</th>
                <td scope="row">{{$booking->email}}</td>
            </tr>
            <tr>
                <th scope="col">Date of birth</th>
                <td scope="row">{{$booking->dob->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <th scope="col">Gender</th>
                <td scope="row">{{$booking->gender}}</td>
            </tr>
            <tr>
                <th scope="col">Phone Number</th>
                <td scope="row">{{$booking->phone}}</td>
            </tr>
            <tr>
                <th scope="col">Company Name</th>
                <td scope="row">{{$booking->company_name}}</td>
            </tr>
            <tr>
                <th scope="col">Street</th>
                <td scope="row">{{$booking->street}}</td>
            </tr>
            <tr>
                <th scope="col">Suburb</th>
                <td scope="row">{{$booking->suburb}}</td>
            </tr>
            <tr>
                <th scope="col">City</th>
                <td scope="row">{{$booking->city}}</td>
            </tr>
            <tr>
                <th scope="col">Postcode</th>
                <td scope="row">{{$booking->postcode}}</td>
            </tr>
            <tr>
                <th scope="col">Country</th>
                <td scope="row">{{$booking->country}}</td>
            </tr>
            <tr>
                <th scope="col">T&C Agreed</th>
                <td scope="row">
                    @if($booking->is_terms_agreed <= 0)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="col">Course Name</th>
                <td scope="row">{{$booking->coursedate->course->course_name}}</td>
            </tr>
            <tr>
                <th scope="col">Course Date</th>
                <td scope="row">@php echo ($booking->coursedate->scheduled_date)->format('d-m-Y') @endphp</td>
            </tr>
            <tr>
                <th scope="col">Course Total</th>
                <td scope="row">${{$booking->course_total}}</td>
            </tr>

            </tbody>
        </table>
    </div>
    @auth
        <a class="btn btn-primary" href="/bookings/{{$booking->id}}/edit">Edit</a>
    @endauth
    <a class="btn btn-warning mx-1" href="/bookings/">Cancel</a>


@endsection
