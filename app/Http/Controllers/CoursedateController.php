<?php

namespace App\Http\Controllers;


use App\Models\Booking;
use App\Models\Course;
use App\Models\Coursedate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CoursedateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursedates = Coursedate::all();
        $courses = Course::all();

        return view('coursedates.index', ['courses' => $courses,'coursedates' => $coursedates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coursedates = Coursedate::where("isActive","=",1)->get();
        $courses = Course::where("isActive","=",1)->get();

        return view('coursedates.create', ['courses' => $courses,'coursedates' => $coursedates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'scheduled_date' => 'required',
            'max_attendee' => '',
            'venue' => 'required | max:255',
        ]);

        $coursedate = new coursedate();
        $coursedate->scheduled_date = request('scheduled_date');
        $coursedate->max_attendee = request('max_attendee');
        $coursedate->venue = request('venue');
        $coursedate->course_id = request('course_id');
        $coursedate->isActive = 1;

        $coursedate->save();

        return redirect('coursedates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coursedate  $coursedate
     * @return \Illuminate\Http\Response
     */
    public function show(Coursedate $coursedate)
    {
        return view(' coursedates.show',['coursedate'=>$coursedate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coursedate  $coursedate
     * @return \Illuminate\Http\Response
     */
    public function edit(Coursedate $coursedate)
    {
        $courses = Course::all();
        $date=date("Y-m-d");

        return view('coursedates.edit',['coursedate'=>$coursedate,'courses'=>$courses,'date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coursedate  $coursedate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coursedate $coursedate)
    {
        request()->validate([
            'scheduled_date' => 'required',
            'max_attendee' => '',
            'venue' => 'required | max:255',
            'isActive' => 'required',
        ]);

        $coursedate->update($request->all());

        return redirect('coursedates');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coursedate  $coursedate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coursedate $coursedate)
    {
        if (! Gate::allows('isAdmin', $coursedate)) {
            abort(403);
        }
        $coursedate->delete();
        return redirect('coursedates');
    }
}
