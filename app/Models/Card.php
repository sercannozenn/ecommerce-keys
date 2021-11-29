<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['session_id', 'user_id', 'product_id', 'amount'];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    public function getPriceAmountAttribute()
    {
        return number_format($this->product->price * $this->amount, 2);
    }
}
