<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
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
        'image',
        'phone',
        'price',
        'User_id',
        'payment_statment',
        'delivery_statment',
    ];


    public function user()
    {
        return $this->belongsto(User::class);
    }
}
