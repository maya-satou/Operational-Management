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
        // すべてのスキルランクと関連する従業員を取得
        $employees = Employee::get();
        return view('skill_ranks.index', compact('skill_ranks','employees'));
    }

    public function create()
    {
        
        return view('skill_ranks.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
          
        ]);

        // $employee = Employee::findOrFail($request->employee_id);
        // $employee->update($validatedData);
        SkillRank::create([
            'name' => $request->name,
        ]);
        return redirect()->route('skill_ranks.index');
    }

    public function  edit(SkillRank $skill_rank)
    {
     // すべての従業員を取得
    $employees = Employee::get();
    
    
    // ビューに skill_ranks を渡す
        return view('skill_ranks.edit', ['skill_rank' => $skill_rank]);
     

    }

       public function update(Request $request, SkillRank $skill_rank)
    {
      
        $validatedData = $request->validate([
                     'name' => 'required',
        ]);

       
        // スキルランクの更新
        $skill_rank->update([
       'name' => $validatedData['name'],
        ]);

        return redirect()->route('skill_ranks.index',compact('skill_rank'));

     
    
    }
    

    public function destroy(SkillRank $skill_rank)
    {
        $skill_rank->delete();

        return redirect()->route('skill_ranks.index');
    }

    

    


}



    
    
    




