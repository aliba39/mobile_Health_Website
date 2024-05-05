@extends('layouts.app')
@section('content')

    @if (Auth::check())
    @else
        <div class="container">
    @endif

    {{--Terms start here--}}
    <h1>Terms and Conditions</h1>
    <hr>

    <div id="contract">
        <p>Below details information about our first aid courses, payment options, what
            to bring to your course and how to claim New Zealand Qualifications Authority (NZQA) unit
            standards. </p>

        <h5>Course rules and regulations</h5>
        <ul>
            <li>Please turn off mobile phones during the courses</li>
            <li>Courses start promptly. Please be at the training venue at least 10 minutes before the
                start-time
            </li>
            <li>Courses involve demonstrations and scenario involvement, which may involve touching
                others
            </li>
            <li>We recommend students wear comfortable clothing to allow easy movement for practical
                demonstrations
            </li>
            <li>On request we are happy to deliver courses in Te Reo Maori and Filipino.
            </li>
            <li>Only enrolled participants are permitted on the course</li>
            <li>Bring a pen and paper for note taking</li>
            <li>Hot drinks are available and a light morning tea and light lunch is provided</li>
            <li>Course workbooks, First Aid manuals and a certificate are provided</li>
            <li>Students are asked to be respectful to other course participants. Students that are
                not participating positively during the course may be asked to leave.
            <li>Attendance is compulsory for all sessions in order for a certificate and/or unit
                standards to be issued
            </li>
            <li>Smoking will be permitted outside in the destinated area only.</li>
            <li><em>Please ask if further information is needed</em></li>
        </ul>

        <h5>Payment</h5>
        <ul>
            <li>Course fees will paid at at the time of booking, unless agreed by Mobile Health.</li>
        </ul>

        <h5>Course Location</h5>
        <ul>
            <li>Mobile Health are happy to hold courses on company site locations. Please contact us
                to discuss your requirements.
            </li>
        </ul>

        <h5>Course cancellation and refund policy</h5>
        <ul>
            <li>Mobile Health is happy to rebook your course at no extra cost provided you make
                contact
                any time prior to the course start date/time.
            </li>
            <li>
                Mobile Health is happy to cancel your booking and provide a full refund with at
                least 24 hours notice before the course commences.
            </li>
            <li>
                Refunds are not available for any cancellation made within 24 hours of the course start.
            </li>
            <li>For non-attendance, refunds will not be given for non-attendance. You must contact us
                within 48 hours of the course.
            </li>
        </ul>

        <h5>Confidentiality and privacy</h5>
        <ul>
            <li>Mobile Health adheres to, and abides by the Privacy Act 2020. Confidentiality,
                privacy and respect are maintained at all times during courses.
            </li>
        </ul>

        <h5>Health, safety and wellbeing</h5>
        <ul>
            <li>Mobile Health prioritises the health, safety and well-being of staff and
                course participants. Please advise your instructor of any health, safety or well-being
                problems
                you have.
            </li>
            <li>
                We expect all course participants to abide by our Health and Safety policies.
            </li>
        </ul>

        <h5>New Zealand Qualifications Authority (NZQA) accreditations</h5>
        <ul>
            <li>Mobile Health is accredited by NZQA under the Education Act 1989 and its subsequent
                amendments to provide education and training.
            </li>
            <li>All participants who provide a NZQA Record of Learning document/number will receive
                NZQA credits for their courses by completing the documents provided
                by Mobile Health. Participants should also provide a form of ID such as passport
                and birth certificate to be sighted by the instructor.
            </li>
        </ul>
    </div>
</div>

{{--Terms end here--}}

@endsection

