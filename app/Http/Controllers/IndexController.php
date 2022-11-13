<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index()
    {
        $transaksi = Transaksi::where('user_id', Auth::id())->first();
        //$coursesname = Course::all();
        $category = Category::all();
        //$transaksi = Transaksi::with('course')->get();

        return view('index', [
            'category' => $category,
            'transaksi' => $transaksi,
            'course' => $transaksi->course,
        ]);

        //return view('index', compact('category', 'usercourses', 'transaksi'));

    }

}
