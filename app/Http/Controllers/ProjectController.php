<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; 
use App\Models\Employee; 


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index');
    }

    public function create()
    {
        $employees = Employee::all();
        return view('projects.create',compact('employees'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
          
        ]);

        $project = Project::create($validatedData);
        return redirect()->route('projects.index');
    }

    public function  edit(Project $project)
    {
        return view('projects.edit', compact('project'));

    }

    
    public function update(Request $request, project $project)
    {
            $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'employees' => 'array',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('projects.index');

        // 従業員の割り当てを更新
    $project->employees()->sync($request->input('employees', []));

    return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }

    

    


}



    
    
    



