<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'slug', 'product_short_description','product_description','product_code',
        'quantity', 'price', 'is_active', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function featureImage()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'product_id')
            ->where('feature_image', 1);
    }
}
