<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('superadmin.product', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'spesification' => 'nullable',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|max:1024', // max 1MB
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('product_images', 'public');
            $validatedData['picture'] = $path;
        }

        Product::create($validatedData);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        return response()->json($product);
    }

    public function update(Request $request, $product_id)
        {
            $product = Product::findOrFail($product_id);

            $validatedData = $request->validate([
                'product_name' => 'required|max:255',
                'spesification' => 'nullable',
                'price' => 'required|numeric',
                'picture' => 'nullable|image|max:1024',
            ]);

            if ($request->hasFile('picture')) {
                $path = $request->file('picture')->store('product_images', 'public');
                $validatedData['picture'] = $path;
            }

            $product->update($validatedData);

            return redirect()->route('product')->with('success', 'Product updated successfully!');
        }

    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }

    public function showPortfolio()
    {
        $products = Product::all();
        return view('portfolio', compact('products'));
    }
}