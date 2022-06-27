<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class CourseController extends Controller
{
    public function index()
    {

        if(request('search')){
            $course = Course::where('title', 'like' , '%' . request('search') . '%')
                     ->orWhere('deskripsi', 'like' , '%' . request('search') . '%')
                     ->paginate(7);
            return view('course', compact('course'));
        }

        $course = Course::paginate(7);
        return view('course', compact('course'));
    }

    public function show($id){
        return view('courseDetail',[
           "title"=>"course",
           'course' => Course::with('category')->with('materi')->find($id)
       ]);
   }
}
