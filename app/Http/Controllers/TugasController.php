<?php

namespace App\Http\Controllers;

use App\Models\materi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        
        if(request('materi_id')){
            $search=  $tugas = DB::table('tugass');
            $materi_id = request('materi_id');
            $search->where('materi_id' , 'Like' , '%' . request('materi_id') . '%');
            $tugas = $search->get();
            return view('tugas.index',compact('tugas','materi_id'));
        }

        
            $search=  $tugas = DB::table('tugass');
            $materi_id = session('materi_id');
            $search->where('materi_id' , 'Like' , '%' . request('materi_id') . '%');
            $tugas = $search->get();
            return view('tugas.index',compact('tugas','materi_id'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $materi = materi::all();
        $materi_id = new \stdClass();
        $materi_id = $request->get('materi_id');
        return view('tugas.create', [
            'materi' => $materi,
            'materi_id' => $materi_id
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
        $tugas = Tugas::all();
        $materi_id = new \stdClass();
        $materi_id = $request->get('materi_id');
        $validatedData = $request->validate([
            'materi_id'=>'required',
            'pdf' => 'nullable|mimes:pdf|max:2048'
            
        ]);

        if($request->file('pdf')){
            $validatedData['pdf'] = $request->file('pdf')->store('tugas-doc');
        }

        Tugas::create($validatedData, ['materi_id' => $validatedData['materi_id']]);

        // return redirect()->route('dashboard.materi.index', compact('course_id'));
        
        return redirect('/member/tugas')->with('materi_id' , $materi_id)->with('success', 'Tugas berhasil diupload');
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
    public function edit(Request $request, $id)
    {
        $tugas = Tugas::with('materi')->where('id', $id)->first();
        $materi_id = new \stdClass();
        $materi_id = $request->get('materi_id');
        return view('tugas.edit', compact('tugas', 'materi_id'));
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
        
        $tugas = Tugas::all();
        $materi_id = new \stdClass();
        $materi_id = $request->get('materi_id');
        $request->validate([
            'subject' => 'required',
            'materi_id'=>'required',
            'link' => 'nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:2048'
        ]);

        $tugas = Tugas::where('id', $id)->first();
        $tugas->subject = $request->get('subject');
        $tugas->link = $request->get('link');

        if($request->file('pdf')){
            if($request->oldpdf){
                Storage::delete($request->oldpdf);
            }
            $tugas->pdf = $request->file('pdf')->store('tugas-doc');
        }

        $tugas->save();

        return redirect('/member/tugas')->with('materi_id' , $materi_id)->with('success', 'Tugas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $materi_id = new \stdClass();
        $materi_id = $request->get('materi_id');
        $tugas = Tugas::where('id', $id)->first();
        if($tugas->pdf){
            Storage::delete($tugas->pdf);
        }
        $tugas->delete();
        return redirect('/member/tugas')->with('materi_id' , $materi_id)->with('success', 'Tugas telah dihapus');
    }
}
