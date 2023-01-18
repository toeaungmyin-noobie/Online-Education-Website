<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $courses = Course::orderBy('created_at', 'DESC')->take(6)->get();
        $courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });

        return view('frontend.home', compact('courses', 'user'));
    }
    public function browseCourses()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        $user = User::all();
        $courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });
        // dd($courses[1]->user->find($courses[1]->instructor_id)->name);
        return view('frontend.browse-courses', compact('courses', 'user'));
    }
    public function show($id)
    {
        $course = Course::find($id);
        $active_lesson = $course->lesson[0]->id;
        if (isset($course->lesson)) {
            return view('frontend.course-detail', compact('course', 'active_lesson'));
        } else {
            return to_route('frontend.home');
        }
    }
    public function lesson_show($id, $active_lesson)
    {
        $course = Course::find($id);
        if (isset($course->lesson)) {
            return view('frontend.course-detail', compact('course', 'active_lesson'));
        } else {
            return to_route('frontend.home');
        }
    }
    public function course_entroll($id)
    {
        $this->middleware('auth');
        $course = Course::find($id);
        $user = Auth::user();
        if (!$course->user->contains($user)) {
            $course->user()->attach([$user->id]);
        }
        $active_lesson = $course->lesson[0]->id;
        if (isset($course->lesson)) {
            return to_route('frontend.course-detail', ['id' => $id]);
        } else {
            return to_route('frontend.home');
        }
    }
    public function free_course()
    {
        $courses = Course::where('price', 0)->get();
        $user = User::all();
        $courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });
        return view('frontend.browse-courses', compact('courses', 'user'));
    }
}
