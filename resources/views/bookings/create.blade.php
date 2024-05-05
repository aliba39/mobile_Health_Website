@extends('layouts.app')
@section('content')
    {{--<link rel="stylesheet" href="css/global.css">--}}

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }} </p><a href="#" class="close" data-dismiss="alert"
                                                    aria-label="close">Close</a>
        </div>
    @endif
    @if (Auth::check())
    @else
        <div class="container">
    @endif

    <h1>Book a course</h1>
    <hr>

    <div class="row col-md-12">
        <p>Please complete the form below and make a payment to secure your place on a course.</p>
    </div>

    <form method="POST" action="/bookings" id="stripe">
        @csrf
        <div class="row">
            <div class="form-group col-md-12 mt-2">
                <h4>Course Details</h4>
            </div>

            <div class="form-group col-md-12">
                <label for="course_id">Course</label>
                <select id="course_id" name="course_id" class="form-control"
                        @error('course_id') is-invalid @enderror required onchange="this.form.submit()">
                    @foreach ($courses as $course)
                        <option
                            {{ $course->id == $old_id ? 'selected' : '' }}  value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group ol-md-6">
                <label for="coursedate_id" class="form-control-label">Select course date*</label>
                <select name="coursedate_id" id="coursedate_id"
                        class="form-control @error('coursedate_id') is-invalid @enderror"
                        required>
                    @foreach ($coursedates as $coursedate)
                        <option value="{{$coursedate->id}}">
                            {{$coursedate->scheduled_date->format('l d-M-Y')}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="course_id">Course Total</label>
                <select name="course_total" id="course_total"
                        class="form-control @error('course_total') is-invalid @enderror"
                        required>
                    @foreach ($courseprice as $courseprices)
                        <option value="{{$courseprices->price}}">
                            {{$courseprices->price}} NZD
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12 mt-2">
                <h4>Attendee Details</h4>
            </div>

            <div class="form-group col-md-6">
                <label for="first_name">First Name*</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                       name="first_name" id="first_name" value="{{ @old('first_name') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="last_name">Last Name*</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                       id="last_name" name="last_name" value="{{ @old('last_name') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ @old('email') }}"
                       required/>
            </div>

            <div class="form-group col-md-6">
                <label for="phone">Mobile phone number*</label>
                <input class="form-control" type="text" name="phone" value="{{ @old('phone') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="dob" class="form-control-label">Date of birth*</label>
                <input class="form-control"
                       type="date" id="dob" name="dob"
                       min="1920-01-01" max="2021-01-01"
                       pattern="\d{4}-\d{2}-\d{2}"
                       value="{{ @old('dob') }}"
                       required>
            </div>

            <div class="form-group col-md-6">
                <label for="gender" class="form-control-label">Gender*</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                       name="company_name" id="company_name" value="{{ @old('company_name') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="street">Street</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror"
                       name="street" id="street" value="{{ @old('street') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="suburb">Suburb</label>
                <input type="text" class="form-control @error('suburb') is-invalid @enderror"
                       name="suburb" id="suburb" value="{{ @old('suburb') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror"
                       name="city" id="city" value="{{ @old('city') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="postcode">Postcode</label>
                <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                       name="postcode" id="postcode" value="{{ @old('postcode') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="country">Country</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror"
                       name="country" id="country" value="{{ @old('country') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-2">
                <h4>Payment Details</h4>
            </div>
            <div class="form-group col-md-12">
                <label for="card-holder-name">Name On Card</label>
                <input id="card-holder-name" type="text" class="form-control
                       @error('card-holder-name') is-invalid @enderror"
                       name="card-holder-name" id="card-holder-name" value="" placeholder="Cardholder name"
                       required>
                <label for="card-element">Card details</label>
                <div class="form-control" id="card-element" name="card-element" required></div>
                <input name="pmethod" type="hidden" id="pmethod" value="" required/>
            </div>

            <div class="form-group col-md-12 mt-4 terms">
                <input type="checkbox" id="is_terms_agreed" name="is_terms_agreed" value="1" required>
                <label for="is_terms_agreed" class="ptext">&nbspI have read and agree to the
                    <a href="/terms" target="_blank"
                       value="{{ @old('is_terms_agreed') }}"><span
                            class="is_terms_agreed">Terms and Conditions</span></a></label><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-2">
                @if (Auth::check())
                    <input class="btn btn-primary" type="submit" value="Submit Booking"/>
                    <a class="btn btn-outline-dark" href="/bookings">Cancel</a>
                @else
                    <input class="btn btn-book" type="submit" value="Submit Booking"/>
                    <a class="btn btn-outline-dark" href="/">Cancel</a>
                @endif
            </div>
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
