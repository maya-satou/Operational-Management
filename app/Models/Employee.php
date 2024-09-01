<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Modelをインポート
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//class Employee extends Authenticatable
class Employee extends Authenticatable// Modelを継承
{
use HasApiTokens, HasFactory, Notifiable;

protected $table = 'employees';

protected $fillable = [
    'name', 
    'email',
    'department_id',
    'hire_date', 
    'cost', 
    'skill_rank_id',
    'password',
    ];

    public function projects()
    {
        return $this->belongsToMany(project::class,'employee_project')
        ->withPivot('period','cost');
    }

    // スキルランクとのリレーションを定義
    public function skill_rank()
    {
        return $this->belongsTo(SkillRank::class, 'skill_rank_id');
    }

    //所属部署とのリレーション定義
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    //protected $casts = [
        //'email_verified_at' => 'datetime',
        //'password' => 'hashed',
        //'hire_date' => 'date',
       
    //];

    //public function getAuthIdentifierName()
    //{
        // 空のメソッドを定義することで、認証システムが識別子を要求しないようにする
    //return null;

    //}

    

}
