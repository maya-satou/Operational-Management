@extends('layouts.app')

@section('content')

 <h1 class="mb-4">勤怠編集</h1>

 <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="employee_id" class="form-label">社員</label>
        <select name="employee_id" id="employee_id" class="form-select" required>
            @foreach($employees as $employee)
              <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : ''}}>{{ $employee->name }}</option>
            @endforeach 
        </select>
    </div>
    <div class="mb-3">
        <label for="clock_in" class="form-label">出勤時刻</label>
        <input class="datetime-local" name="clock_in" id="clock_in" class="form-control" value="{{ $attendance->clock_in }}" required>

    </div>
    <button type="submit" class="btn btn-primary">保存</button>

 </form>
 @endsection