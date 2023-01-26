<?php

namespace Database\Seeders;

use App\Models\lesson_vd_links;
use App\Models\Lesson;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            $lesson = new Lesson();
            $lesson->title = 'React Lessons ' . $i;
            $lesson->course_id = 7;
            $lesson->description = 'React is a JavaScript library for building user interfaces.';
            $lesson->link = 'xPcBFdLcQtdVo3FI1MLivesCZDbosK6Nej97h0km.mp4';
            $lesson->save();
        }
        for ($i = 1; $i <= 6; $i++) {
            $lesson = new Lesson();
            $lesson->title = 'Laravel Lessons ' . $i;
            $lesson->course_id = 6;
            $lesson->description = 'There are a variety of tools and frameworks available to you when building a web application. However, we believe Laravel is the best choice for building modern, full-stack web applications.';
            $lesson->link = '2 Laravel Routing.mp4';
            $lesson->save();
        }
    }
}
