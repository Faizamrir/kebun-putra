<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
    public function store(StoreproductRequest $request)
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
        }else{
            $data = [
                'name' => $request->get('name'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'img' => $request->get('img')
            ];

            product::create($data);
        }
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
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}