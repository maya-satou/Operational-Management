<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class departmentController extends Controller
{
    //部署一覧表示
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',compact('departments'));
    }
    //部署登録
    public function create()
    {
        $employees = Employee::all();
        return view('departments.create',compact('employees'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:12',
          
        ]);

        $departments = Department::create($validatedData);
        return redirect()->route('departments.index',compact('departments'));
    }

    //部署の編集
    public function  edit(Department $department)
    {
        return view('departments.edit', compact('department'));

    }

    //部署の更新
    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:12',
        ]);
      
         // 所属部署名の更新
         $department->update([
            'name' => $validatedData['name'],
             
        ]);

        
     }

    
}
