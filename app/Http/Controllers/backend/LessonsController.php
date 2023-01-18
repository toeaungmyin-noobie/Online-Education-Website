<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course = Course::find($id);
        return view('backend.lesson-createform', compact('id', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->course_id = $course_id;
        $video = $request->file('video');
        if (isset($video)) {
            $fileName = $video->hashName();
            $video->storeAs('video/lessons_video', $fileName);
            $lesson->link = $fileName;
        }
        $lesson->save();
        return to_route('dashboard.courses.show', ['id' => $course_id])->with('success', 'lesson has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('backend.course-detail', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $lesson_id)
    {
        $course = Course::find($course_id);
        $lesson = Lesson::find($lesson_id);
        return view('backend.lesson-editform', compact('course', 'lesson'));
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
        $request->validate([
            'title' => 'required'
        ]);
        $lesson =  Lesson::find($id);
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $video = $request->file('video');
        if (isset($video)) {
            $fileName = $video->hashName();
            Storage::delete('/video/lessons_video/' . $lesson->link);
            $video->storeAs('video/lessons_video', $fileName);
            $lesson->link = $fileName;
        }
        $lesson->save();
        return to_route('dashboard.courses.show', ['id' => $lesson->course->id])->with('success', 'lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $lesson_name = $lesson->title;
        Storage::delete('/video/lessons_video/' . $lesson->link);
        $lesson->delete();
        return back()->with('delete-success', $lesson_name . ' has been deleted successfully');
    }
}
