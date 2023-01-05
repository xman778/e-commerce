<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'product_image',
        'category_id',
    ];
    public function category()
    {
        
        return $this->belongsTo(category::class);
        
    }
}
