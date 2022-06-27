<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class CourseMemberController extends Controller
{
    public function index()
    {
        return view('courseMember',[
            'transaksi'=> Transaksi::orderBy('progres','asc')->paginate(3)
        ]);
    }

    public function transaksi()
    {
        return view('transaksi',[
            'transaksi'=> Transaksi::orderBy('id','desc')->paginate(3)
        ]);
    }
}
