<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'clock_in' => 'required|date',
            'clock_out' => 'nullable|date|after:clock_in',
        ]);

        Attendance::create($validated);

        return redirect()->route('attendances.index');
    }

    public function  edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));


    }

    public function update(Request $request, $id)
    {
      
        $attendance = Attendance::findOrFail($id);
        
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'clock_in' => 'required|date',
            'clock_out' => 'nullable|date|after:clock_in',

        ]);

        $attendance->update($validated);

        return redirect()->route('attendances.index');


    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index');
    }

    


}



    
    
    

