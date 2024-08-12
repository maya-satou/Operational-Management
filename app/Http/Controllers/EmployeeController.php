<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
public function index()
{
    //一覧表示
    $employees = Employee::all();
    return view('employees.index', compact('employees'));

}

public function create()
{
    
    return view('employees.create');

}

public function store(Request $request)
{
    
    $vallidatedData = $request->vallidate([
        'name' => 'required',
        'department' => 'required',
        'team' => 'required',

    ]);

    Employee::create($validatedData);
    return redirect()->route('employees.index')->with('success', 'Employee ceated successfully'); 

}
