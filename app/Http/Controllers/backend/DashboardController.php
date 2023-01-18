<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $courses = Course::all();
        $title = collect($courses)->map(function ($course) {
            return $course->title;
        });

        return view('backend.index', compact('users', 'courses', 'title'));
    }
    public function data()
    {
        $courses = Course::all();
        $users = $courses->map(function ($course) {
            return $course->user->count();
        });
        return response()->json(['users' => $users, 'courses' => $courses]);
    }
}
