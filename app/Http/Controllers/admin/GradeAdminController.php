<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeAdminController extends Controller
{
    public function index()
    {
        $grades = Grade::with('students')->get();

        return view('admin.grade.grade-admin', [
            'title' => "Grade Admin",
            'grades' => $grades
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        $students = Student::all(); // Get all students
        return view('admin.grade.create', 
        compact('departments'),
        [
            'title' => 'Create Grade',
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Grade::create($request->all());
        return redirect()->route('admin.grade.index')->with('success', 'Grade created successfully.');
    }


    public function edit(Grade $grade)
    {
        $departments = Department::all();
        return view('admin.grade.edit', compact('grade', 'departments'));
    }


    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $grade->update($request->all());
        return redirect()->route('admin.grade.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grade.index')->with('success', 'Grade deleted successfully.');
    }
}

