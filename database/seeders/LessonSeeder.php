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
            $lesson->course_id = 1;
            $lesson->description = 'React is most popular framework in the world';
            $lesson->link = '7mgW399qFPEuH2RqINZcadrtgATC0jBGOogXEiPH.mp4';
            $lesson->save();
        }
        for ($i = 1; $i <= 3; $i++) {
            $lesson = new Lesson();
            $lesson->title = 'Node Lessons ' . $i;
            $lesson->course_id = 2;
            $lesson->description = 'React is most popular framework in the world';
            $lesson->link = '7mgW399qFPEuH2RqINZcadrtgATC0jBGOogXEiPH.mp4';
            $lesson->save();
        }
    }
}
