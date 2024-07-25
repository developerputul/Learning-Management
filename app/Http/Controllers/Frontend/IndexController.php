<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseLecture;
use App\Models\Course_goal;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function CourseDetails($id,$slug){

        $course = Course::find($id);
        $goals = Course_goal::where('course_id',$id)->orderBy('id','DESC')->get();

        $ins_id = $course->instructor_id;
        $instructorCourses = Course::where('instructor_id',$ins_id)->orderBy('id','DESC')->get();
        $categories = Category::latest()->get();

        $cat_id = $course->category_id;
        $relatedCourse = Course::where('category_id',$cat_id)->where('id','!=',$id)
        ->orderBy('id','DESC')->get();

        $relatedCourse = Course::where('category_id',$cat_id)->where('id','!=',$id)
        ->orderBy('id','DESC')->limit(3)->get();
        
        return view('frontend.course.course_details',compact('course','goals','instructorCourses','categories','relatedCourse'));

    } /// End Method
}
