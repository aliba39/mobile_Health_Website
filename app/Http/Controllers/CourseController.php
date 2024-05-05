<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
            'course_name' => 'required',
            'course_desc_long' => 'required',
            'course_desc_short' => 'required',
            'price' => 'required | min:0',
            'duration' => 'required | integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/icons/'), $imageName);

        $course = new course();
        $course->course_name = request('course_name');
        $course->course_desc_long = request('course_desc_long');
        $course->course_desc_short = request('course_desc_short');
        $course->duration = request('duration');
        $course->start_time = request('start_time');
        $course->end_time = request('end_time');
        $course->price = request('price');
        $course->isActive = true;
        $course->image =  request('image');
        $course->image_path =  "/images/icons/" . $imageName;
        $course->save();

        return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show',['courses'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit',['courses'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate([
            'course_name' => 'required',
            'course_desc_long' => 'required',
            'course_desc_short' => 'required',
            'duration' => 'required | integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required',
            'isActive' => 'required',
        ]);

        if(isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/icons/'), $imageName);
            $course->image =  request('image');
            $course->image_path =  "/images/icons/" . $imageName;
        }

        $course->course_name = request('course_name');
        $course->course_desc_long = request('course_desc_long');
        $course->course_desc_short = request('course_desc_short');
        $course->duration =  request('duration');
        $course->start_time =  request('start_time');
        $course->end_time =  request('end_time');
        $course->price =  request('price');
        $course->isActive =  request('isActive');
        $course->save();

        return redirect('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (! Gate::allows('isAdmin', $course)) {
            abort(403);
        }
        $course->delete();
        return redirect('courses');
    }
}
