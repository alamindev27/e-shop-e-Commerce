<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'product_quantity',
        'description',
        'stock',
        'sku',
        'long_description',
        'brand',
        'weight',
        'dimension',
        'material',
        'others_info',
        'slug',
    ];

    public function relationtocategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function relationtouser()
    {
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }
}
