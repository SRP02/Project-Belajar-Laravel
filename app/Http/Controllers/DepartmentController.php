<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('grades', 'students')->get();

        // Kirim data ke view
        return view('Departement', [
            'title' => "Department",
            'departments' => $departments
        ]);
    }
}
