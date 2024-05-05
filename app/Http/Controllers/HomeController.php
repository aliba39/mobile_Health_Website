<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use App\Models\Coursedate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
/*        dd($courses);*/
        return view('home.index', ['courses' => $courses]);
    }

    public function display()
    {
/*        */
        $courses = Course::all();
/*        dd($courses);*/
        return view('home.show', ['courses' => $courses]);
    }
}
