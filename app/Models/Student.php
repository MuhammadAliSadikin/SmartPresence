<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'class'];

    // Satu student memiliki banyak absensi
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // Student juga memiliki banyak parents melalui pivot table
    public function parents()
    {
        return $this->belongsToMany(User::class, 'parent_student', 'student_id', 'parent_id');
    }
}
