<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function syllabi()
    {
        return $this->hasOne(Syllabus::class);
    }
}
