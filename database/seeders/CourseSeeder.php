<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $course = new Course();
        $course->title = 'React';
        $course->overview = 'React is most popular JavaScript framework';
        $course->cover_url = 'zh8fBIY499jBUoHUx0BQ7cb9eTpAVNF2Iqiweu9b.png';
        $course->price = "10000";
        $course->instructor_id = "1";
        $course->save();
        $course->user()->attach([1]);
    }
}
