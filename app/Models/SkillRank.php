<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillRank extends Model
{
    protected $fillable = [
        'skill_rank', 
        'name', 
        
    ];

    // 複数の従業員を持つリレーションを定義
    public function employees()
    {
        return $this->hasMany(Employee::class, 'skill_rank_id');
    }
}


