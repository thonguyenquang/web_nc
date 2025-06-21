<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Nếu bảng categories có cột 'name'
        'description',
    ];

    // Một category có nhiều product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
