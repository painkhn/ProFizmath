<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'course_id',
        'quantity'
    ];

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
