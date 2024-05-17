<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Http\Requests\StorepembelianRequest;
use App\Http\Requests\UpdatepembelianRequest;
use Carbon\Carbon;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = pembelian::with('user', 'detail_pembelian.product')->get();
        return view('transaksi-admin', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepembelianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembelianRequest $request, pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembelian $pembelian)
    {
        //
    }

    public function approve($id)
    {
        $pembelian = pembelian::find($id);
        $pembelian->update([
            'status_pembayaran' => 1,
            'tgl_pembayaran' => Carbon::now()
        ]);
        return redirect()->route('transaksi-admin');
    }
}
