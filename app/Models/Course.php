<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'grade_id',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }
}
