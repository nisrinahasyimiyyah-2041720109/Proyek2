<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::all();
        // return view('dashboard.course.index', ['category' => $category]);

        $course = Course::with('category')->paginate(6);
        // $course = Course::all();
        return view('dashboard.course.index', compact('course'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.course.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $id = $request->get('id');
        $validatedData = $request->validate([
            'title' => 'required|unique:courses',
            'deskripsi' => 'required',
            'category_id' => 'required',
            'requirment' => 'required',
            'outcome' => 'required',
            'harga' => 'required|numeric',
            'photo' => 'image|file|max:2048'
            
        ]);

        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('course-img');
        }
        
        Course::create($validatedData);
        
        return redirect('/admin/course')->with('successAdd', 'Course baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('category')->where('id', $id)->first();
        return view('dashboard.course.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::with('category')->where('id', $id)->first();
        $category = Category::all();
        return view('dashboard.course.edit', compact('course', 'category'));
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
            'title' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required',
            'requirment' => 'required',
            'outcome' => 'required',
            'harga' => 'required|numeric',
            'photo' => 'image|file|max:2048'
        ]);

        $course = Course::where('id', $id)->first();
        $course->title = $request->get('title');
        $course->deskripsi = $request->get('deskripsi');
        $course->category_id = $request->get('category_id');
        $course->requirment = $request->get('requirment');
        $course->outcome = $request->get('outcome');
        $course->harga = $request->get('harga');


        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $course->photo = $request->file('photo')->store('course-img');
        }
        
        $course->save();

        return redirect('/admin/course')->with('success', 'Course berhasil diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', $id)->first();
        if($course->photo){
            Storage::delete($course->photo);
        }
        $course->delete();
        return redirect('/admin/course')->with('success', 'Course telah dihapus');
    }
}
