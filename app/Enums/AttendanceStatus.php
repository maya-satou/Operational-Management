<?php

namespace App\Enums;

enum Status: int
{
    case CLOCKED_IN = 0;      
    case CLOCKED_OUT = 1;    
    case NOT_CLOCKED_IN = 2;  
    case NOT_CLOCKED_OUT = 3; 

    public function laravel():string
    {
        return match($this){
            Status::CLOCKED_IN => '出勤中',
            Status::CLOCKED_OUT => '退勤済み',
            Status::NOT_CLOCKED_IN => '未出勤',
            Status::NOT_CLOCKED_OUT => '未退勤',
        };
    }
}
