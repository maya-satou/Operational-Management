<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class departmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',compact('departments'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('departments.create',compact('employees'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
          
        ]);

        $departments = Department::create($validatedData);
        return redirect()->route('departments.index',compact('departments'));
    }

    public function  edit(Department $department)
    {
        return view('departments.edit', compact('departments'));

    }

    
    public function update(Request $request, Department $department)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'employees' => 'array',
        ]);

        $departments= Department::findOrFail($department);
        $department->update($validatedData);

        return redirect()->route('departments.index',compact('departments'));

        // 従業員の割り当てを更新
    $project->employees()->sync($request->input('employees', []));

    return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index');
    }
}
