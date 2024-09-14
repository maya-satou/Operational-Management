<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use App\Helpers\AttendanceStatusHelper;
use APP\Enums\Status;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
       $employee = Auth::user();
       $is_admin = $employee->is_administrator; // 管理者かどうかのフラグをセット

   
       if ($employee->is_administrator == 1) {
        // 管理者の場合は全従業員の勤怠情報を取得
        $attendances = Attendance::with('employee')

            //->whereYear('clock_in', Carbon::now()->year)
            //->whereDate('clock_in', Carbon::now())
            ->orderBy('clock_in', 'asc')
            ->get();
    } else {
        // 一般ユーザーの場合は自分の勤怠情報のみ取得
        $attendances = Attendance::where('employee_id', $employee->id)
            //->whereYear('clock_in', Carbon::now()->year)
            //->wheredate('clock_in', Carbon::now())
            ->orderBy('clock_in', 'asc')
            ->get();
    }

     // 総労働時間の計算を各勤怠データに追加
     foreach ($attendances as $attendance) {
        if ($attendance->clock_in && $attendance->clock_out) {
            $clockInTime = Carbon::parse($attendance->clock_in);
            $clockOutTime = Carbon::parse($attendance->clock_out);
            $attendance->total_time = $clockInTime->diffInHours($clockOutTime);  // 総労働時間を計算
        } else {
            $attendance->total_time = 0; // 退勤していない場合は総労働時間を0にする
        }
    }
    
       return view('attendances.index',compact('attendances','is_admin'));
    }

     //出勤ボタン処理
     public function clockIn(Request $request)
     {
        
        // 今日の出勤記録を取得
        $todayAttendance = Attendance::where('employee_id', auth()->id())
        ->whereDate('date', Carbon::today())
        ->whereNull('clock_out') // 退勤していないレコードが存在するかチェック
        ->first();

        if ($todayAttendance) {
            return redirect()->route('attendances.index')->with('message', 'すでに出勤しています');
        }

        // 出勤を記録
        $attendance = new Attendance();
        $attendance->employee_id = auth()->id();
        $attendance->clock_in = Carbon::now();
        //$attendance->date = Carbon::today()->toDateString(); // `date` フィールドを設定
        $now = Carbon::now();
        $attendance->date = $now->format('Y-m-d');
        $attendance->clock_in = $now->format('H:i:s');
        $attendance->save();

        return redirect()->route('attendances.index')->with('message', '出勤しました');;
     }


     // 退勤
     public function clockOut(Request $request)
    {
        $employee = Auth::user();
        
        // 今日の出勤記録を取得
        $todayAttendance = Attendance::where('employee_id', $employee->id)
                                    ->whereDate('clock_in', Carbon::today())
                                    ->first();

        if (!$todayAttendance || $todayAttendance->clock_out) {
            return redirect()->route('attendances.index')->with('message','まだ出勤していないか、既に退勤しています。' );
        }

        // 退勤時間を記録
        $todayAttendance->clock_out = Carbon::now();
        $todayAttendance->save();

        return redirect()->route('attendances.index')->with('message','退勤しました');

        // 所定労働時間（8時間として定義）
        $standardWorkHours = 8;

        // 出勤時間と退勤時間の差を計算
        $clockInTime = Carbon::parse($todayAttendance->clock_in);
        $clockOutTime = Carbon::parse($todayAttendance->clock_out);
        $totalWorkedHours = $clockInTime->diffInHours($clockOutTime);

        // 所定労働時間を超えた場合、時間外労働時間を計算
        $overTimeHours = max(0, $totalWorkedHours - $standardWorkHours);

        // セッションにメッセージとして所定労働時間と時間外労働時間を保存
        return redirect()->route('attendances.index')->with([
        'message' => '退勤しました',
        'standard_work_hours' => $standardWorkHours,
        'worked_hours' => $totalWorkedHours,
        'over_time_hours' => $overTimeHours
    ]);
    }

    public function store(Request $request)
    {
      
        // バリデーション
        $request->validate([
            'clock_in' => 'required|date',
            'clock_out'   => 'required|date|after:clock_in',
            // その他のバリデーションルール
        ]);

        // 勤怠モデルの作成と保存
        $attendance = new Attendance;
        $attendance->user_id = auth()->user()->id; // ログインユーザーIDを設定
        $attendance->clock_in = $request->clock_in;
        $attendance->clock_out = $request->clock_out;
        // その他の属性を設定

        $attendance->save();

        // 保存成功時の処理
        return redirect()->route('attendances.index')->with('success', '勤怠情報を登録しました。');
    }

    

    public function edit(Attendance $attendance)
    {
        return view('attendances.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        //dd($request->all());  // これでリクエストに含まれる全データを確認
        $request->validate([
            
            'clock_in' => 'required|date',
            'clock_out' => 'nullable|date',
        ]);

       
        $attendance ->date = $request->clock_in;
        $attendance->clock_in = Carbon::parse($request->clock_in)->format('Y-m-d H:i:s');
        $attendance->clock_out = Carbon::parse($request->clock_out)->format('Y-m-d H:i:s');
        $attendance->save();
        
        

        return redirect()->route('attendances.index')->with('success', '勤怠が更新されました');
    }
    
    

    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }
    
    

}