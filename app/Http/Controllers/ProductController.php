<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Menampilkan produk milik user yang sedang login
        $products = Product::where('user_id', Auth::id())->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name'  => 'required|string|max:255',
            'qty'   => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Insert ke database
        Product::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'qty'     => $request->qty,
            'price'   => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Data produk berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi Input
        $request->validate([
            'name'  => 'required|string|max:255',
            'qty'   => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Update data
        $product = Product::findOrFail($id);
        $product->update([
            'name'  => $request->name,
            'qty'   => $request->qty,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil dihapus!');
    }
}