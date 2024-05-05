<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Coursedate;
use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        $coursedates = Coursedate::all();
        $courses = Course::all();

        return view('bookings.index', ['bookings' => $bookings, 'courses' => $courses,'coursedates' => $coursedates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*$courses = Course::all();*/
        $courses = Course::where("isActive","=",1)->get();
        $coursedates = Coursedate::where("course_id","=",1)->get();
        $courseprice = Course::select('price')->where("id","=",1)->get();
        $old_id = 1;

        return view('bookings.create', ['courses' => $courses, 'coursedates' => $coursedates, 'courseprice' => $courseprice, 'old_id' => $old_id,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $courses = Course::where("isActive","=",1)->get();
       $courseprice = Course::select('price')->where("id","=",$request->course_id)->get();
       $coursedates = Coursedate::where("course_id", "=", $request->course_id)->get();
       $old_id = $request->get('course_id');

        //IF CHECKING IF THEY ONLY CHANGE THE COURSE
        if ($request->first_name == null) {
            return view('bookings.create',
             ['courses' => $courses,
             'coursedates' => $coursedates,
            'courseprice' => $courseprice,
            'old_id' => $old_id ]);
        }

        request()->validate([
            'course_id' => 'required',
            'coursedate_id' => 'required',
            'course_total' => 'required',
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'email' => 'required | email',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'company_name' => '',
            'street' => '',
            'suburb' => '',
            'city' => '',
            'postcode' => '',
            'country' => '',
            'is_terms_agreed' => 'required',
            'isActive' => '',
        ]);

        $booking = new booking();
        $booking->course_id = request('course_id');
        $booking->coursedate_id = request('coursedate_id');
        $booking->course_total = request('course_total');
        $booking->first_name = request('first_name');
        $booking->last_name = request('last_name');
        $booking->email = request('email');
        $booking->phone = request('phone');
        $booking->dob = request('dob');
        $booking->gender = request('gender');
        $booking->company_name = request('company_name');
        $booking->street = request('street');
        $booking->suburb = request('suburb');
        $booking->city = request('city');
        $booking->postcode = request('postcode');
        $booking->country = request('country');
        $booking->is_terms_agreed = request('is_terms_agreed');
        $booking->isActive = ('1');


        $stripe = new \Stripe\StripeClient(
      'sk_test_51JawcXEdQN6YZjuxiZyeug0fYd4GWKpmexqQ3Uw9BvL460IK5ktKUOtgpKeQF6elpZ1O1R998GAGjjH2djNep0cT00pG27q9iP');
        $stripe->charges->create([
          'amount' => $request->input('course_total')*100,
          'currency' => 'nzd',
          'source' => 'tok_amex',
        ]);

        $booking->save();
        Session::flash('success', 'Your booking is confirmed! Thank-you');
        return view('bookings.create',
         ['courses' => $courses,
         'coursedates' => $coursedates,
        'courseprice' => $courseprice,
        'old_id' => $old_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {

        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
      $course = Course::select('*')->where("id","=",$booking->course_id)->get();
      $coursedates = Coursedate::select('*')->where("id","=",$booking->coursedate_id)->get();

      return view('bookings.edit', ['booking' => $booking,'course'=>$course,'coursedates'=>$coursedates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate([
          'course_id' => 'required',
          'coursedate_id' => 'required',
          'course_total' => 'required',
          'first_name' => 'required | max:50',
          'last_name' => 'required | max:50',
          'email' => 'required | email',
          'phone' => 'required',
          'dob' => 'required',
          'gender' => 'required',
          'company_name' => '',
          'street' => '',
          'suburb' => '',
          'city' => '',
          'postcode' => '',
          'country' => '',
          'isActive' => '',
        ]);

        $booking->course_id = request('course_id');
        $booking->coursedate_id = request('coursedate_id');
        $booking->course_total = request('course_total');
        $booking->first_name = request('first_name');
        $booking->last_name = request('last_name');
        $booking->email = request('email');
        $booking->phone = request('phone');
        $booking->dob = request('dob');
        $booking->gender = request('gender');
        $booking->company_name = request('company_name');
        $booking->street = request('street');
        $booking->suburb = request('suburb');
        $booking->city = request('city');
        $booking->postcode = request('postcode');
        $booking->country = request('country');
        $booking->isActive = ('1');
        $booking->update();
        return redirect('bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
      if (! Gate::allows('isAdmin', $booking)) {
            abort(403);
        }
        $booking->delete();

        return redirect('bookings');
    }
}
