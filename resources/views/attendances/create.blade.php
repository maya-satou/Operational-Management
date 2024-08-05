@extends('layouts.app')

@section('content')

<h1>新規勤怠作成</h1>

<form method="POST" action="{{ route('attendances.store') }}">
　@csrf
　<div>
            <label>社員</label>
            <select name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>出勤時刻</label>
            <input type="datetime-local" name="clock_in" required>
        </div>
        <div>
            <label>退勤時刻</label>
            <input type="datetime-local" name="clock_out">
        </div>
        <button type="submit">保存</button>
    </form>
@endsection