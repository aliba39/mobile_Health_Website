@extends('layouts.app')
@section('content')

    <h2>Edit a course</h2>
    <hr>

    <div class="form-content">
        <form method="POST" action="/courses/{{ $courses->id }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @method('PUT')
            @csrf

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="course_name">Course Name*</label>
                    <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                           id="course_name" name="course_name" value="{{ $courses->course_name }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="course_desc_short">Course Short Description*</label>
                    <textarea class="form-control @error('course_desc_short') is-invalid @enderror"
                              id="course_desc_short" name="course_desc_short" rows="4"
                              required>{!! $courses->course_desc_short !!}</textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="course_desc_long">Course Long Description*</label>
                    <textarea class="form-control @error('course_desc_long') is-invalid @enderror"
                              id="course_desc_long" name="course_desc_long" rows="4"
                              required>{!! $courses->course_desc_long !!}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="price">Price*</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                           name="price" value="{{ $courses->price }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="duration">Duration (in days)*</label>
                    <input type="text" class="form-control @error('duration') is-invalid @enderror"
                           id="duration" name="duration" value="{{ $courses->duration }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="start_time">Start time* (format as 9:00)</label>
                    <input type="text" class="form-control @error('start_time') is-invalid @enderror"
                           id="start_time" name="start_time" value="{{ $courses->start_time }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="end_time">End time* (format as 4:30)</label>
                    <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                           id="end_time" name="end_time" value="{{ $courses->end_time }}">
                </div>

                <div class="custom-file field form-group col-md-6 ">
                    <label for="image">New Image*</label>
                    <div class="control">
                        <input type="file" name="image" class="hidden custom-file-input form-control input @error('image') is-invalid @enderror" id="chooseFile">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="isActive">Active Record* (0=No, 1=Yes)</label>
                    <input type="text" class="form-control @error('isActive') is-invalid @enderror"
                           id="isActive" name="isActive" value="{{ $courses->isActive }}">
                </div>

            </div>
            <div class="form-button mt-3">
                @can('isAdmin')
                    <input class="btn btn-primary" type="submit" value="Save">
                @endcan
                <a class="btn btn-warning mx-1" href="/courses">Cancel</a>
            </div>
        </form>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>There were some problems with your input.</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{  $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
