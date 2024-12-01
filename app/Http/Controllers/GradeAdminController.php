<?php
namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeAdminController extends Controller
{
    public function index()
    {
        $grades = Grade::with('students')->get();

        return view('admin.grade-admin', [
            'title' => "Grade Admin",
            'grades' => $grades
        ]);
    }
}

