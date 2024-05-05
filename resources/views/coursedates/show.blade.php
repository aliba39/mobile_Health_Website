@extends('layouts.app')
@section('content')

    <h2>Course dates</h2>
    <hr>

    @if($coursedate->isActive == 0)
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
                <td scope="row">{{$coursedate->id}}</td>
            </tr>
            <tr>
                <th scope="col">Course Name</th>
                <td scope="row">{{$coursedate->course->course_name}}</td>
            </tr>
            <tr>
                <th scope="col">Course Date</th>
                <td scope="row">{{$coursedate->scheduled_date->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <th scope="col">Attendee Maximum</th>
                <td scope="row">{{$coursedate->max_attendee}}</td>
            </tr>
            <tr>
                <th scope="col">Venue</th>
                <td scope="row">{{$coursedate->venue}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    @auth
        <a class="btn btn-primary" href="/coursedates/{{$coursedate->id}}/edit">Edit</a>
    @endauth
    <a class="btn btn-warning mx-1" href="/coursedates/">Cancel</a>


@endsection
