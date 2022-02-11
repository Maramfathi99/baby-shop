<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'details',
        'image',
        'category_id',
        'regular_price',
        'sale_price',
        'active',
        'quantity'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
