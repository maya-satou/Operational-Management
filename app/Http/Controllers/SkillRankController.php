<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\SkillRank;



class SkillRankController extends Controller
{
    public function index()
    {
        $skill_ranks = SkillRank::all();
        return view('skill_ranks.index',compact('skill_ranks'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('skill_ranks.create',compact('employees'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
          
        ]);

        $skill_ranks = SkillRank::create($validatedData);
        return redirect()->route('skill_ranks.index',compact('skill_ranks'));
    }

    public function  edit(SkillRank $Skill_rank)
    {
        return view('skill_ranks.edit', compact('skill_rank'));

    }

    
    public function update(Request $request, SkillRank $project)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'employees' => 'array',
        ]);

        $Skill_ranks= SkillRank::findOrFail($skill_rank);
        $project->update($validatedData);

        return redirect()->route('skill_ranks.index',compact('skill_ranks'));

        // 従業員の割り当てを更新
    $project->employees()->sync($request->input('employees', []));

    return redirect()->route('skill_ranks.index');
    }

    public function destroy(SkillRank $skill_rank)
    {
        $skill_rank->delete();

        return redirect()->route('skill_ranks.index');
    }

    

    


}



    
    
    




