<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use Carbon\Carbon;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id', 
        'clock_in', 
        'clock_out',
        'status'=> Status::class,
        'date',

        
    ];
    //Employeeのリレーション
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    //出勤処理
    public function clockIn()
    {
        $this->clock_in = now();
        $this->status = '出勤中';
        $this->save();
    }

    //退勤処理
    public function clockOut()
    {
        $this->clock_out = now();
        $this->status = '退勤済み';
        $this->save();
    }

    public function getWorkTimeAttribute()
    {
       
        // 労働時間計算ロジック
        $t = new Carbon($this->clock_in);
        return $t ->diffInHours(new Carbon($this->clock_out));
    }

    public function getOverTimeAttribute()
    {
        // 時間外労働時間計算ロジック
        $standardWorkHours = 8; // 設定値
        return max(0, $this->work_time - $standardWorkHours);
    }
}
