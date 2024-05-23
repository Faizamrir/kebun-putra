<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelian;
use App\Models\keranjang;
use App\Http\Requests\StorekeranjangRequest;
use App\Http\Requests\UpdatekeranjangRequest;
use App\Models\pembelian;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function addCart(Request $keranjang){
        $cart = keranjang::create([
            'id_user' => Auth::user()->id,
            'no_produk' => $keranjang->no_produk,
            'jumlah' => 1
        ]);
        return redirect()->route('dashboard');
    }

    public function removeItem(Request $request){
        $cart = keranjang::where('id_user', Auth::user()->id)->where('id', $request->id)->delete();
        return response()->json(['success' => true, 'message' => 'Product removed from cart']);
    }

    public function updateItem(Request $request){
        $cart = keranjang::where('id_user', Auth::user()->id)->where('id', $request->id)->update([
            'jumlah' => $request->jumlah
        ]);
        return response()->json(['success' => true, 'message' => 'Cart updated']);
    }
    
    public function checkout(Request $request){
        $pesanan = pembelian::create([
            'id_user' => Auth::user()->id,
            'tgl_pembelian' => Carbon::now(),
            'total' => $request->total,
        ]);
        foreach($request->items as $item){
        detail_pembelian::create([
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