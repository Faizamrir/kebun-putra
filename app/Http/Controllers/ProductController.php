<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('dashboard-admin', compact('products'));
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
    public function store(StoreproductRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'img' => 'required|file|size:10000'
        ]);
        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }else{
            $data = [
                'nama' => $request->get('nama'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'img' => $request->file('img')->getClientOriginalName()
            ];
            $request->file('img')->storeAs('images', $data['img'], 'public');
        }
        product::create($data);
        return redirect()->route('dashboard-admin');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $product = product::all();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'img' => 'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $data = [
                'name' => $request->get('name'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'img' => $request->get('img')
            ];
        }
        product::where('id', $request->get('id'))->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        if(Auth::user()->is_admin){
            product::where('id', $product->id)->delete();
        }
    }
}
