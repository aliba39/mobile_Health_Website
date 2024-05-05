@extends('layouts.app')
@section('content')

    <h2>Create a new course</h2>
    <hr>

    <form method="POST" action="/courses" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <div class="row">
            <div class="form-group col-md-12">
                <label for="course_name">Course Name*</label>
                <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                       name="course_name" id="course_name" value="{{ @old('course_name') }}" required>
            </div>

            <div class="form-group col-md-12">
                <label for="course_desc_short">Description - Short*</label>
                <textarea class="form-control @error('course_desc_short') is-invalid @enderror"
                          id="course_desc_short" name="course_desc_short" value="{{ @old('course_desc_short') }}"
                          rows="4" required></textarea>

            </div>

            <div class="form-group col-md-12">
                <label for="course_desc_long">Description - Long*</label>
                <textarea class="form-control @error('course_desc_long') is-invalid @enderror"
                          id="course_desc_long" name="course_desc_long" value="{{ @old('course_desc_long') }}"
                          rows="4" required></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="price">Price*</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" value="{{ @old('price') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="duration">Duration in days*</label>
                <input type="number" class="form-control @error('duration') is-invalid @enderror"
                       id="duration" name="duration" value="{{ @old('duration') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="start_time">Start time* (format as 9:00)</label>
                <input type="text" class="form-control @error('start_time') is-invalid @enderror"
                       id="start_time" name="start_time" value="{{ @old('start_time') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="end_time">End time* (format as 4:30)</label>
                <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                       id="end_time" name="end_time" value="{{ @old('end_time') }}" required>
            </div>

            <div class="custom-file field form-group col-md-6 ">
                <label for="image">Image*</label>
                <div class="control">
                    <input type="file" name="image"
                           class="custom-file-input form-control input @error('image') is-invalid @enderror"
                           id="chooseFile" required>
                </div>
            </div>
        </div>

        <div class="form-button mt-3">
            <input class="btn btn-primary" type="submit" value="Save">
            <a class="btn btn-warning" href="/courses/">Cancel</a>
        </div>
    </form>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>There were some problems with your input.</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

