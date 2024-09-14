<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\EmployeeProject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class EmployeeProjectController extends Controller
{

    public function create()
    {
        $employees = Employee::get();
        $projects = Project::get();
        return view('employee_projects.create',compact('employees','projects'));
 
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'project_id' => 'required|exists:projects,id',
            'period' => [ 'required',
             Rule::unique('employee_projects')
            ->where(function ($query) use ($request) { return $query->where('project_id', $request->project_id) ->where('employee_id', $request->employee_id); }), ],
            'cost' => 'required|digits_between:1,8',
            
        ]);
        
        EmployeeProject::create([
            'employee_id' => $request->employee_id,
            'project_id'=> $request->project_id,
            'period' => $request->period,
             'cost' => $request->cost,
        ]);
      
        return redirect()->route('employee_projects.index');
    }

    public function index()
    {
        $employee_projects = EmployeeProject::all();
        
        return view('employee_projects.index', compact('employee_projects'));
    }

    public function edit(Request $request,$id)
    {
        $employeeProject = EmployeeProject::findOrFail($id);
        $employees = Employee::all();
        $projects = Project::all();
        return view('employee_projects.edit', compact('employeeProject', 'employees', 'projects'));


    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'period' => 'required|string|max:255',
        'cost' => 'required|numeric|digits_between:1,8',
        'project_id' => 'required|exists:projects,id',  // 案件名のバリデーションを追加

        ]);

        $employeeProject = EmployeeProject::findOrFail($id);
        $employeeProject->update([
        'period' => $request->period,
        'cost' => $request->cost,
        'project_id' => $request->project_id,  // 案件名を更新
    ]);

    return redirect()->route('employee_projects.index');


    }
    
    

}
