<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // READ (Tampilkan Semua Data)
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // CREATE (Simpan Data Baru)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    // READ (Tampilkan Satu Data Spesifik)
    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    // UPDATE (Perbarui Data)
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|integer',
        ]);

        $product->update($validated);
        return response()->json($product, 200);
    }

    // DELETE (Hapus Data)
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}

