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
        return view('projects.index', compact('projects'));
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

        $projects = Project::create($validatedData);
        return redirect()->route('projects.index');
    }

    //部署の編集
    public function  edit(Project $project)
    {
        return view('projects.edit', compact('project'));

    }

    //案件名の更新
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required',
]);
      
         // 案件名の更新
         $project->update([
            'name' => $validatedData['name'],
             ]);

        // $projects= project::findOrFail($project);
        // $project->update($validatedData);

        return redirect()->route('projects.index',compact('project'));


            }

   
    

    


}



    
    
    



