<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\User_Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('backend.course', compact('courses', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses-createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $request->validate([
            'title' => 'required',
            'overview' => 'required',
            'image' => 'required'
        ]);
        $course->title = $request->title;
        $course->overview = $request->overview;
        $course->price = $request->price;
        $course->instructor_id = Auth::user()->id;
        $image = $request->file('image');
        $filename = $image->hashName();
        // save in storage
        $image->storeAs('images/courses-cover', $filename);
        $course->cover_url = $filename;
        // save in database
        $course->save();
        return to_route('dashboard.courses')->with('success', $course->title . ' is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $lessons = Lesson::where('course_id', $id)->get();

        return view('backend.course-detail', compact('course', 'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $lessons = Lesson::where('course_id', $course->id)->get();
        foreach ($lessons as $lesson) {
            $lesson->delete();
            Storage::delete('/video/lessons_video' . $lesson->link);
        }
        Storage::delete('/images/courses-cover/' . $course->cover_url);
        $course->delete();
        return to_route('dashboard.courses');
    }
    public function removeUserFromCourse($course_id, $user_id)
    {
        $user_course = User_Course::where('course_id', $course_id)->where('user_id', $user_id)->first();
        $user_course->delete();
        return back()->with('success', 'User was removed successfully');
    }
}
