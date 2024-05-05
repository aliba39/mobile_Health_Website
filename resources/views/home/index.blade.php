@extends('layouts.app')
@section('content')

@if (Auth::check())
</div>
</div>
@endif

<!-- Banner Starts Here -->
<div class="banner mt-2" alt="First Aid Course Image">
    <div class="container">
        <div class="caption">
            <h4>Mobile Health and Safety</h4>
            <hr>
            <p>The premier <strong>locally owned and operated</strong> provider of Workplace Health and
                Safety Services in the Queenstown Lakes and Central Otago region.
            </p>
            <p>
                <strong>Providing First Aid courses now.</strong>
                <br>Attend a course with us to get your First Aid qualifications.
            </p>
            <div class="btn btn-book-primary">
                <a href="/bookings/create">Book your First Aid Course now!</a>
            </div>
        </div>
    </div>
</div>

<div id="notification">
    <p>We can run courses at your workplace to meet your needs. Please call us on 03 111 2222 for more information.</p>
</div>
<!-- Banner Ends Here -->

<!-- Featured Starts Here -->
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <h2>First Aid Courses Available</h2>
            <hr>
        </div>

        <div class="row justify-content-md-around">
            @foreach($courses as $course)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                    {{--@if($course->isActive == 1)--}}
                    <div class="card card-body card-index">
                        <img src=" {{ $course->image_path }}"
                             alt="Course icon">
                        <h5> {{ $course->course_name }}</h5>
                        <h6>Duration: {{ $course->duration }}
                            @if($course->duration > 1)
                                days
                            @else
                                day
                            @endif
                        </h6>
                        <h6>$ {{ $course->price }} inc GST</h6>
                        <p> {{ $course->course_desc_short }}</p>
                        <p><a href="/courses/ {{ $course->id }}" class="readmore">Read more</a></p>

                        <a href="/bookings/create" class="btn btn-book">Book now</a>
                    </div>

                {{--@endif--}}
                </div>
            @endforeach
        </div>
    </div>

    {{--Reviews start here--}}
    <div class="row mt-2">
        <div class="col-md-12">
            <h3>Trusted local Queenstown and Central Otago company</h3>
            <hr>
            <p>We are trusted by many companies in the Queenstown Lakes and Central Otago region,
                including:</p>

            <p class="referencelogo justify-content-md-around">
                <img src="/images/index/skyline-queenstown-logo.png" alt="Skyline Queenstown Logo">
                <img src="/images/index/site-queenstown.jpg" alt="Site Trampaline Logo">
                <img src="/images/index/mitre10.svg" alt="Mitre 10 Logo">
                <img src="/images/index/rpslogo.jpg" alt="Remarkables Primary School Logo">
                <img src="/images/index/neatmeatlogo.jpeg" alt="Neat Meat Queenstown Logo">
                <img src="/images/index/bluekanu_logo.jpg" alt="Blue Kanu Queenstown Logo">
            </p>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <h3>Students enjoy our courses</h3>
            <hr>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="references">
                <p>CPR, burns, choking, heart attack. Enjoyed all the training. <span class="referee">-Nathanial</span>
                </p>
                <br>
                <p>How interactive and easy going it was. <span class="referee">-Karli</span></p>
                <br>
                <p>The delivery and content was very relevant to me. <span class="referee">-Amber</span></p>
                <br>
                <p>Examples were fun. <span class="referee">-Angela</span></p>
                <br>
                <p>I enjoyed the course today. I learned a lot. Actually to do CPR. <span class="referee">-Ervin</span>
                </p>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <img src="/images/index/studentslearning.jpg" alt="Students learning at the First Aid course"
                 class="course-image image-greyscale">
        </div>
    </div>

{{-- Reviews end here --}}

@endsection
