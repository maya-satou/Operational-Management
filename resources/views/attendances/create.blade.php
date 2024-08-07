

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">新規勤怠作成</h1>

    <form method="POST" action="{{ route('attendances.store') }}">
        @csrf
        <div class="mb-3">
            <label for="employee_id" class="form-label">社員</label>
            <select name="employee_id" id="employee_id" class="form-select" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="clock_in" class="form-label">出勤時刻</label>
            <input type="datetime-local" name="clock_in" id="clock_in" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="clock_out" class="form-label">退勤時刻</label>
            <input type="datetime-local" name="clock_out" id="clock_out" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
@endsection
