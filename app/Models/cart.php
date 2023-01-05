<?php

namespace App\Models;

use App\Models\User;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'quantity',
        'product_id',
        'product_title',
        'email',
        'address',
        'phone',
        'price',
        'user_id',
        'image',
    ];


    public function user()
    {
        return $this->belongsto(User::class);
    }
}
