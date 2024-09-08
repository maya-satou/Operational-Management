<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee; // Employee モデルのインポートが必要
use App\Models\SkillRank;
use App\Models\Project;
use App\Models\EmployeeProject;

class EmployeeController extends Controller
{
    
    public function create()
    {
        $employees = Employee::get();
        $departments = Department::get();
        $skill_ranks = SkillRank::get();
        return view('employees.create',compact('employees','departments', 'skill_ranks'));
 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'skill_rank_id' => 'required|exists:skill_ranks,id',
            'email' => 'required|string|max:255|unique:employees',
            'password' => 'required|string|confirmed|min:8',
            'hire_date' => 'required|date',
            //'is_administrator' =>$request->(is_admin),
        ]);
        
        Employee::create([
            'name' => $request->name,
            'department_id' => $request->department_id, // 確認
            'skill_rank_id' => $request->skill_rank_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hire_date' => $request->hire_date,
            'is_administrator' =>$request->is_admin,
        ]);
        return redirect()->route('employees.index');
    }

    public function index()
    {
        $employees = Employee::all();
        
        return view('employees.index', compact('employees'));
    }

    public function edit(Request $request,$id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $skill_ranks = SkillRank::all();

        return view('employees.edit', compact('employee', 'departments', 'skill_ranks'));


    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id', 
            'skill_rank_id' => 'required|exists:skill_ranks,id', 
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update([
            'department_id' => $request->department_id,
            'skill_rank_id' => $request->skill_rank_id,
        ]);

    return redirect()->route('employees.index');


    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }






}
