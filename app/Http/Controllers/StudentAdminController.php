<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    public function index()
    {
        // Return view for Student Admin page
        return view('admin.students-admin', [
            'title' => "Student Admin",
            'students' => Student::all()
        ]);
    }
}
