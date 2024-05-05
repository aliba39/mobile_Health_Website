@extends('layouts.app')
@section('content')

    <h2>View Courses</h2>
    <hr>

    <a class="btn btn-outline-primary mx-1"
       href="/courses/create">Create new course</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Description - Short</th>
                <th scope="col">Description - Long</th>
                <th scope="col">Price</th>
                <th scope="col">Duration</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Active Record</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <th>{{ $course->course_name }}</th>
                    <td>{{ $course->course_desc_short }}</td>
                    <td>{{ $course->course_desc_long }}</td>
                    <td>${{ $course->price }}</td>
                    <td>{{ $course->duration }}
                        @if($course->duration > 1)
                            days
                        @else
                            day
                        @endif
                    </td>
                    <td>{{ date('G:i', strtotime($course->start_time)) }}</td>
                    <td>{{ date('G:i', strtotime($course->end_time)) }}</td>
                    <td>@if($course->isActive == 0)
                            Inactive
                        @endif</td>
                    <td>
                        <form action="/courses/{{ $course->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            @auth
                                <a class="btn btn-outline-primary mx-1 "
                                   href="/courses/{{ $course->id }}">Show</a>
                                <a class="btn btn-outline-success mx-1"
                                   href="/courses/{{ $course->id }}/edit">Edit</a>
                            @endauth
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
