<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Employee モデルのインポートが必要

class EmployeeController extends Controller
{
    public function index()
    {
        // 一覧表示
        $employees = Employee::with('projects')->get();
        //dd($employees);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([ // `vallidate` を `validate` に修正
           
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'unit_price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
            'skill_rank' => 'nullable|string|max:255',
            
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function  edit(Employee $employee)
    {
        
        return view('employees.edit', compact('employee'));

    }

    public function update(Request $request,Employee $employee)
    {
      
        $employee = Attendance::findOrFail($id);
        
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id,' . $employee->id,
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'unit_price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
            'skill_rank' => 'nullable|string|max:255',
            'work_hours' => 'nullable|numeric',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }






}
