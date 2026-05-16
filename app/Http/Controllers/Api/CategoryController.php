<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    // GET: Menampilkan semua kategori
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json([
                'message' => 'Categories retrieved successfully',
                'data' => $categories
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    // POST: Menambah kategori baru (Butuh Token)
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $category = Category::create($validated);

            return response()->json([
                'message' => 'Kategori berhasil ditambahkan!',
                'data' => $category
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    // GET: Menampilkan 1 kategori berdasarkan ID
    public function show(string $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Category retrieved successfully',
            'data' => $category
        ], 200);
    }

    // PUT: Mengubah kategori (Butuh Token)
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::find($id);
            
            if (!$category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $category->update($validated);

            return response()->json([
                'message' => 'Kategori berhasil diubah!',
                'data' => $category
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengubah kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }

    // DELETE: Menghapus kategori (Butuh Token)
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            
            if (!$category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $category->delete();

            return response()->json([
                'message' => 'Kategori berhasil dihapus!'
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan server'], 500);
        }
    }
}