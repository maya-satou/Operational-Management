<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    //勤怠一覧表示
    public function index()
    {
        $attendanses = Attendance::with('employee')->get();
         return view('attendances.index', compact('attendances'));

    }
    
    //勤怠登録
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'clock_in' => 'required|date',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index');
    }


    //勤怠編集
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        // attendances テーブルからデータを取得
          $attendances = Attendance::all();

        // attendances 変数をビューに渡す
          return view('attendances.index', compact('attendances'));
    }


    //勤怠更新
    public function update(Request $request, $id)
    {
        $request->valodate([
            'employee_id' => 'required|exist:employees,id',
            'clock_in' => 'required|date',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index');
    }

    //勤怠削除
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index');

    }

    
    
}
