@extends('layouts.app')
@section('content')

    @if (Auth::check())
    @else
        <div class="container">@endif

    <div class="row">
        <div class="col-md-12">
            <div class="card w-100 mt-2 card-login">

                <div class="card-body">
                    @if($courses->isActive == 0)
                        <div class="alert alert-danger" role="alert">Inactive Record</div>
                    @endif
                    <img src="{{ $courses->image_path }}" alt="Course Icon">
                    <h5 class="card-title"> {{ $courses->course_name }}</h5>
                    <h6 class="card-title">$ {{ $courses->price }} inc GST</h6>
                    <p class="card-text"> {{ $courses->course_desc_long }}</p>
                    <br><br>
                    <p class="card-text">Duration: &nbsp {{ $courses->duration }}
                        @if($courses->duration > 1)
                            days
                        @else
                            day
                        @endif</p>
                    <p class="card-text">
                        Starts at: &nbsp {{ date('G:i', strtotime($courses->start_time)) }}
                    </p>
                    <p class="card-text">
                        Ends at: &nbsp {{ date('G:i', strtotime($courses->end_time)) }}</p>

                    @if (Auth::check())
                        <a class="btn btn-primary" href="/courses/ {{ $courses->id }}/edit">Edit</a>
                        <a class="btn btn-warning mx-1" href="/courses/">Cancel</a>
                    @else
                        <a class="btn btn-book" href="/bookings/create">Book now</a>
                    @endif
                </div>

            </div>
        </div>
    </div>


@endsection

