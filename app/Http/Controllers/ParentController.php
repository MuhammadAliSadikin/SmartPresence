<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    // Menampilkan dashboard Orang Tua dengan data absensi anak
    public function viewChildAttendance()
    {
        // Ambil data anak berdasarkan relasi children yang ada pada user yang sedang login
        $children = auth()->user()->children()->with('attendances')->get();
        return view('orangtua.dashboard', compact('children'));
    }
}
