<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Materi;
use Illuminate\Support\Facades\DB;


class DashboardMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(request('course_id')){
            $search=  $materi = DB::table('materis');
            $course_id = request('course_id');
            $search->where('course_id' , 'Like' , '%' . request('course_id') . '%');
            $materi = $search->get();
            return view('dashboard.materi.index',compact('materi','course_id'));
        }

        
            $search=  $materi = DB::table('materis');
            $course_id = session('course_id');
            $search->where('course_id' , 'Like' , '%' . request('course_id') . '%');
            $materi = $search->get();
            return view('dashboard.materi.index',compact('materi','course_id'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course = course::all();
        $course_id = new \stdClass();
        $course_id = $request->get('course_id');
        return view('dashboard.materi.create', [
            'course' => $course,
            'course_id' => $course_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materi = Materi::all();
        $course_id = new \stdClass();
        $course_id = $request->get('course_id');
        $validatedData = $request->validate([
            'subject' => 'required|unique:materis',
            'course_id'=>'required',
            'link' => 'nullable|url',
            'pdf' => 'mimes:pdf|max:2048'
            
        ]);

        if($request->file('pdf')){
            $validatedData['pdf'] = $request->file('pdf')->store('course-doc');
        }

        Materi::create($validatedData, ['course_id' => $validatedData['course_id']]);

        // return redirect()->route('dashboard.materi.index', compact('course_id'));
        
        return redirect('/admin/materi')->with('course_id' , $course_id)->with('success', 'Materi baru telah ditambahkan');
        // return view('dashboard.materi.index', [
        //              'materi' => $materi,
        //              'course_id' => $course_id
        //              ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    // public function indexMateri($id)
    // {
        
    //     $materi = Materi::with('course')->where('course_id', $id)->first();
    //     $course_id = new \stdClass();
    //     $course_id = $id;
    //     return view('dashboard.materi.index', [
    //         'materi' => $materi,
    //         'course_id' => $course_id
    //     ]);
    // }
}
