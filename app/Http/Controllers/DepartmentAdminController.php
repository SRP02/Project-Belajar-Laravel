<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentAdminController extends Controller
{
    public function index()
    {
        $departments = Department::with('grades', 'students')->get();
        // Return view for Student Admin page
        return view('admin.department-admin', [
            'title' => "Student Admin",
            'departments' => $departments
        ]);
    }
}
