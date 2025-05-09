<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    // Menampilkan halaman dashboard untuk Admin dan Guru
    public function index()
    {
        $attendances = Attendance::with('student')->orderBy('attendance_date', 'desc')->get();
        $students = Student::all();
        return view('dashboard', compact('attendances', 'students'));
    }

    // Menyimpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'student_id'      => 'required|exists:students,id',
            'attendance_date' => 'required|date',
            'status'          => 'required|in:Hadir,Tidak Hadir',
        ]);

        // Menggunakan transaksi untuk menjamin integritas data jika diperlukan
        DB::transaction(function () use ($request) {
            Attendance::create($request->all());
        });

        return redirect()->route('dashboard')->with('success', 'Data absensi berhasil ditambahkan!');
    }
}
