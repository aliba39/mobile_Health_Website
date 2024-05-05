@extends('layouts.app')
@section('content')

    <h2>Add New Dates</h2>
    <hr>

    <div class="form-content">
        <form method="POST" action="/coursedates">
            @csrf

            <div class="form-group col-md-12">
                <label for="course_id">Course*</label>
                <select id="course_id" name="course_id" class="form-control"
                        @error('course_id') is-invalid @enderror required onchange="this.form.submit()">
                    @foreach ($courses as $course)
                        <option
                            value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="scheduled_date">Scheduled Date*</label>
                <input type="date" class="form-control @error('scheduled_date') is-invalid @enderror"
                       id="scheduled_date" name="scheduled_date" value="{{ @old('scheduled_date') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="max_attendee">Maximum Attendees</label>
                <input type="text" class="form-control @error('max_attendee') is-invalid @enderror"
                       id="max_attendee" name="max_attendee" value="{{ @old('max_attendee') }}" required>
            </div>

            <div class="form-group col-md-12">
                <label for="venue">Venue*</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror"
                       id="venue" name="venue" value="{{ @old('venue') }}" required>
            </div>


            <div class="form-button mt-3">
                <input class="btn btn-primary" type="submit" value="Save">
                <a class="btn btn-warning" href="/coursedates">Cancel</a>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
