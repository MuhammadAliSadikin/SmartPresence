<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['student_id', 'attendance_date', 'status'];

    // Absensi milik seorang student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
