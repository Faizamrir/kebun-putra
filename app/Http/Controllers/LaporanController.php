<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;


Class LaporanController extends Controller {

    public function index() {
        return view('laporan');
    }

    public function cetakpdf(Request $request) {
        $datestring = $request->get('date');
        $date = Carbon::createFromFormat('Y-m', $datestring);
        $data = pembelian::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->with('user')->get();
        $totals = pembelian::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->sum('total');
        if($data->count() == 0) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        }else{
            $laporan = PDF::loadView('laporan.penjualan', compact('data', 'date', 'totals'));
            return $laporan->stream();
        }
    }
}

?>