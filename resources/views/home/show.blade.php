@extends('layouts.app')
@section('content')

    @if (Auth::check())
    @else
        <div class="container">
    @endif

    <h1>First Aid Courses Available</h1>
    <hr>

    @foreach($courses as $course)
        @if($course->isActive == 1)

            <div class="card w-100 mt-2 card-login">

                <div class="card-body">
                    <img src="{{ $course->image_path }}" alt="Course Icon">
                    <h5 class="card-title">{{ $course->course_name }}</h5>
                    <h6 class="card-title">${{ $course->price }} inc GST</h6>
                    <p class="card-text">{{ $course->course_desc_long }}</p>
                    <br><br>
                    <p class="card-text">Duration: &nbsp{{ $course->duration }}
                        @if($course->duration > 1)
                            days
                        @else
                            day
                        @endif</p>
                    <p class="card-text">
                        Starts at: &nbsp{{ date('G:i', strtotime($course->start_time)) }}
                    </p>
                    <p class="card-text">
                        Ends at: &nbsp{{ date('G:i', strtotime($course->end_time)) }}</p>

                    <a class="btn btn-book" href="/bookings/create">Book now</a>
                </div>
            </div>

        @endif
    @endforeach


@endsection
