@extends('layouts.app')
@section('content')

    <h2>Course Dates</h2>
    <hr>

    <p>
        <a class="btn btn-outline-primary mx-1 "
           href="/coursedates/create">Create new date</a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Scheduled Date</th>
                <th scope="col">Attendee Max</th>
                <th scope="col">Venue</th>
                <th scope="col">Active Record</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coursedates as $coursedate)
                <tr>
                    <th scope="row">{{$coursedate->id}}</th>
                    <th>{{$coursedate->course->course_name}}</th>
                    <td>{{$coursedate->scheduled_date->format('d-m-Y')}}</td>
                    <td>{{$coursedate->max_attendee}}</td>
                    <td>{{$coursedate->venue}}</td>
                    <td>@if($coursedate->isActive == 0)
                            Inactive
                        @endif</td>
                    <td>
                        <form action="/coursedates/{{$coursedate->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            @auth
                                <a class="btn btn-outline-primary mx-1 "
                                   href="/coursedates/{{$coursedate->id}}">Show</a>
                                <a class="btn btn-outline-success mx-1"
                                   href="/coursedates/{{$coursedate->id}}/edit">Edit</a>
                            @endauth
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

