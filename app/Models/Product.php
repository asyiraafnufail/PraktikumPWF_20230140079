<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mengizinkan field ini untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'user_id', 
        'category_id', 
        'name', 
        'qty', 
        'price'
    ];

    // Relasi ke User (opsional, untuk mempermudah pemanggilan data user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}