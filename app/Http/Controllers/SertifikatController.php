<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use PDF;

class SertifikatController extends Controller
{
    public function __invoke(Request $request){
        $transaksi = Transaksi::all()->where('id', $request->id);
        $pdf = PDF::loadview('sertifikat', compact('transaksi'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();
    }
}
