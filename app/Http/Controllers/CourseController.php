<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::with('category')->get();

        if(request('search')){
            $course->where('title', 'like' , '%' . request('search') . '%')
                     ->orWhere('deskripsi', 'like' , '%' . request('search') . '%');
        }

        return view('course', compact('course'));
    }

    public function show($id){
        return view('courseDetail',[
           "title"=>"course",
           'course' => Course::find($id)
       ]);
   }
}
