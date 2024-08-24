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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}


