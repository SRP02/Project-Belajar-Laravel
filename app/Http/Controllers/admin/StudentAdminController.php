<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }
    
        // Search by grade (assuming there's a relationship with Grade model)
        if ($request->filled('search_grade')) {
            $query->whereHas('grade', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_grade . '%');
            });
        }
    
        // Search by email
        if ($request->filled('search_email')) {
            $query->where('email', 'like', '%' . $request->search_email . '%');
        }
    
        // Search by address
        if ($request->filled('search_address')) {
            $query->where('address', 'like', '%' . $request->search_address . '%');
        }

        $students = $query->paginate(25);
        // Return view for Student Admin page
        return view('admin.student.students-admin', [
            'title' => "Student Admin",
            'students' => $students
        ]);
    }

    public function edit(Student $student)
    {
        $grades = Grade::all();
        $departments = Department::all();
        return view('admin.student.edit', compact('student', 'grades', 'departments'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'grade_id' => 'required|exists:grades,id',
            'department_id' => 'required|exists:departments,id',
            'address' => 'required|string',
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully');
    }
    public function create()
{
    // Mengambil data grades dan departments dari database
    $grades = Grade::all();
    $departments = Department::all();

    return view('admin.student.create', compact('grades', 'departments'),['title' => 'Add Student']);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'grade_id' => 'required|exists:grades,id',
        'address' => 'nullable|string',
    ]);

    $grade = Grade::findOrFail($validated['grade_id']);
    $departmentId = $grade->department_id;

    Student::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'grade_id' => $validated['grade_id'],
        'department_id' => $departmentId,
        'address' => $validated['address'],
    ]);

    return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil ditambahkan.');
}



    

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully');
    }
}
