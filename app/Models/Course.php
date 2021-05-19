<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(Schools::class, 'schools_id','id');
    }

    public function exams()
    {
        return $this->belongsTo(Examinations::class, 'examinations_id','id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }
}
