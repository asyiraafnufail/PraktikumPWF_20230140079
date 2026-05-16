<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductApiController extends Controller
{
    /**
     * GET: Menampilkan semua produk (Tugas Praktikum)
     */
    public function index()
    {
        try {
            $products = Product::with('category')->get();
            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => $products
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    /**
     * POST: Menambah data produk (Dari Modul)
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $validated = $request->validated();
            
            // Menyisipkan ID user yang sedang login (dari token)
            $validated['user_id'] = Auth::id();

            $product = Product::create($validated);

            Log::info('Menambah data produk', [
                'list' => $product
            ]);

            return response()->json([
                'message' => 'Produk berhasil ditambahkan!!',
                'data' => $product,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah product', [
                'message' => $e->getMessage(),
            ]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    /**
     * GET: Menampilkan 1 produk berdasarkan ID (Dari Modul)
     */
    public function show(int $id)
    {
        try {
            $product = Product::with('category')->find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $product
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil detail produk', [
                'message' => $e->getMessage(),
            ]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    /**
     * PUT/PATCH: Mengubah data produk (Tugas Praktikum)
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json(['message' => 'Product tidak ditemukan'], 404);
            }

            // Sesuaikan validasi dengan kolom yang ada di database kamu
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'category_id' => 'required|exists:categories,id',
            ]);

            $product->update($validated);

            return response()->json([
                'message' => 'Produk berhasil diubah!',
                'data' => $product
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengubah produk', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    /**
     * DELETE: Menghapus produk (Tugas Praktikum)
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json(['message' => 'Product tidak ditemukan'], 404);
            }

            $product->delete();

            return response()->json([
                'message' => 'Produk berhasil dihapus!'
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus produk', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }
}