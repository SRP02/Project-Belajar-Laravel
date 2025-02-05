<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentAdminController extends Controller
{
    public function index()
    {
        // Return view for Student Admin page
        return view('admin.department.department-admin', [
            'title' => "Student Admin",
            'departments' => Department::all()
        ]);
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
    
        Department::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
    
        return redirect()->route('admin.department.index')->with('success', 'Department berhasil ditambahkan.');
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
    
        $department->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
    
        return redirect()->route('admin.department.index')->with('success', 'Departemen berhasil diperbarui.');
    }
    

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.department.index')->with('success', 'Department deleted successfully.');
    }
}
