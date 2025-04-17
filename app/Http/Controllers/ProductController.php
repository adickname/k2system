<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields =  $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        $product = Product::create($fields);

        $uploadedFile = $request->file('image');
        $path = Storage::disk('local')->putFile('products', $uploadedFile);
        $product->image = $path;
        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields =  $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'cost' => 'required',
            'description' => 'required|image'
        ]);
        $product->update($fields);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return "Deleted";
    }
}
