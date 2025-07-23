<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $products = Product::all();
        $products->each(function ($product) {
            $product->image = asset('storage/' . $product->image);
        });
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }



        $fields =  $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,gif,bmp,webp,avif'
        ]);
        $product = Product::create($fields);
        if ($product) {
            $uploadedFile = $request->file('image');
            $path = Storage::disk('public')->putFile('products', $uploadedFile);
            $product->image = $path;
            $product->save();
        }
        return $product;
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->image = asset('storage/' . $product->image);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if ($request->user()) {
            $fields =  $request->validate([
                'name' => 'required',
                'cost' => 'required',
                'description' => 'required',
                'image' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        // Walidacja, czy image to plik
                        if ($request->hasFile('image')) {
                            if (!$request->file('image')->isValid()) {
                                $fail('Uploaded image is not valid.');
                            }
                            // Sprawdź, czy plik jest jednym z dozwolonych formatów
                            $allowedTypes = ['jpeg', 'png', 'gif', 'bmp', 'webp', 'avif'];
                            $fileExtension = $request->file('image')->getClientOriginalExtension();
                            if (!in_array($fileExtension, $allowedTypes)) {
                                $fail('Invalid image type.');
                            }
                        }
                        // Walidacja, czy image to ścieżka (string)
                        elseif (!is_string($value)) {
                            $fail('Image must be a valid image path or an uploaded file.');
                        }
                    }
                ]
            ]);
            $product->update($fields);
            if ($request->hasFile('image')) {
                $uploadedFile = $request->file('image');
                $path = Storage::disk('public')->putFile('products', $uploadedFile);
                $product->image = $path;
            }
            $product->save();
            return $product;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {

        if ($request->user()) {
            $delected =  $product->delete();
            if ($delected) {
                return "Deleted";
            }
        }
    }
}
