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
        'image',
        'price',
        'subject_id',
        'grade_id'
    ];

    public function Grade() {
        return $this->belongsTo(Grade::class);
    }

    public function Subject() {
        return $this->belongsTo(Subject::class);
    }
}
