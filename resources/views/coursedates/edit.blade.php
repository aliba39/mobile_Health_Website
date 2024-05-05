@extends('layouts.app')
@section('content')

    <h2>Edit course dates</h2>
    <hr>

    <div class="form-content">
        <form method="POST" action="/coursedates/{{$coursedate->id}}">
            @method('PUT')
            @csrf

            <div class="form-group col-md-6">
                <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                       name="id" value="{{$coursedate->id}}" readonly>
            </div>

            <div class="form-group col-md-6">
                <label for="course_id">Course ID</label>
                <select id="course_id" name="course_id" class="form-control
                                @error('course_id') is-invalid @enderror ">
                    @foreach ($courses as $course)
                        <option
                            value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="scheduled_date">Course Date*</label>
                <input type="date" class="form-control @error('scheduled_date') is-invalid @enderror"
                       id="scheduled_date" name="scheduled_date" min="{{$date}}"
                       value="{{$coursedate->scheduled_date}}">
            </div>

            <div class="form-group col-md-6">
                <label for="max_attendee">Attendee Maximum</label>
                <input type="number" class="form-control @error('max_attendee') is-invalid @enderror"
                       id="max_attendee" name="max_attendee" value="{{$coursedate->max_attendee}}">
            </div>

            <div class="form-group col-md-12">
                <label for="venue">Venue*</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue"
                       name="venue" value="{{$coursedate->venue}}">
            </div>

            <div class="form-group col-md-6">
                <label for="isActive">Active Record* (0=No, 1=Yes)</label>
                <input type="text" class="form-control @error('isActive') is-invalid @enderror"
                       id="isActive" name="isActive" value="{{$coursedate->isActive}}">
            </div>

            <div class="form-button mt-3">
                <input class="btn btn-primary" type="submit" value="Save">
                <a class="btn btn-warning mx-1" href="/coursedates">Cancel</a>
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
