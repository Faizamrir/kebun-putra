<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Http\Requests\StorekeranjangRequest;
use App\Http\Requests\UpdatekeranjangRequest;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorekeranjangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekeranjangRequest $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keranjang $keranjang)
    {
        //
    }

    
<<<<<<< Updated upstream
}
=======
    public function checkout(Request $request){
        $pesanan = pembelian::create([
            'id_user' => Auth::user()->id,
            'tgl_pembelian' => Carbon::now(),
            'total' => $request->total,
        ]);
        foreach($request->items as $item){
        $detail = detail_pembelian::create([
            'no_pembelian' => $pesanan->id,
            'no_produk' => $item['no_produk'],
            'jumlah' => $item['jumlah'],
        ]);
        }
        
        $keranjangs = keranjang::where('id_user', Auth::user()->id)->delete();
        return response()->json(['payment_url' => route('payment', ['id' => $pesanan->id])]);
    }

    public function payment(Request $request){
        return view('payment', compact('request'));
    }

    public function upload(Request $request){
        $file = $request->file('bukti');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('storage/images/', $filename);
        $pesanan = pembelian::where('id', $request->id)->update([
            'bukti_pembayaran' => $filename,
            'status_pembayaran' => 1,
            'tgl_pembayaran' => Carbon::now()
        ]);
        return redirect()->route('dashboard');
    }
}
>>>>>>> Stashed changes
