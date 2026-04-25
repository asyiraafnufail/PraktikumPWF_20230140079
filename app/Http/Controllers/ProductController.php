<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin melihat produk yang dia buat sendiri
            $products = Product::where('user_id', $user->id)->get();
        } else {
            // User biasa hanya melihat produk yang dibuat oleh admin
            $products = Product::whereHas('user', function ($query) {
                $query->where('role', 'admin');
            })->get();
        }

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {

        // Insert ke database
        Product::create([
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'qty'         => $request->qty,
            'price'       => $request->price,
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
        Gate::authorize('update', $product);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {

        // Update data
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        $product->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'qty'         => $request->qty,
            'price'       => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil dihapus!');
    }

    public function export()
    {
        return response()->streamDownload(function () {
            echo "ID,Name,Qty,Price\n";
            foreach (Product::all() as $product) {
                echo "{$product->id},{$product->name},{$product->qty},{$product->price}\n";
            }
        }, 'products.csv');
    }
}