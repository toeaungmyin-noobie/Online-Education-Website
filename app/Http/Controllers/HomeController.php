<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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
        $users = User::all();
        $courses = Course::all();

        $free_courses = $courses->where('price', '0');
        $popular_courses = $courses->take(6);

        // The quick brown fox (...)
        $free_courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });
        $popular_courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });
        return view('frontend.home', compact('free_courses', 'popular_courses', 'users'));
    }
    public function browseCourses()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        $users = User::all();
        $courses->map(function ($item, $key) {
            if ($item->price == '0') {
                return $item->price = 'free';
            } else {
                return $item->price = $item->price . " MMK";
            }
        });
        // dd($courses[1]->user->find($courses[1]->instructor_id)->name);
        return view('frontend.browse-courses', compact('courses', 'users'));
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
    public function course_entroll(Request $request)
    {
        $course = Course::find($request->id);
        $user = Auth::user();
        if (!$course->user->contains($user)) {
            $course->user()->attach([$user->id]);
        }
        return to_route('frontend.home');
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
    public function popular_course()
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
    public function profile()
    {
        return view('frontend.profile');
    }
    public function course_outline($id)
    {
        $course = Course::find($id);
        $active_lesson = $course->lesson[0]->id;
        return view('frontend.course-outline', compact('course', 'active_lesson'));
    }
}
