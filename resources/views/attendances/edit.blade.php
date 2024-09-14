@extends('layouts.app')

@section('content')

<h1 class="text-center mb-4">勤怠編集</h1>
<div>
    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    <div class="col-md-6"><!--横幅を狭く固定-->

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 日付 -->
            <div class="mb-3">
                <label for="date" class="form-label">日付</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $attendance->date ? \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') : '') }}" required>
            </div>


            <!-- 出勤時刻 -->
            <div class="mb-3">
                <label for="clock_in" class="form-label">出勤時刻</label>
                <input type="time" name="clock_in" id="clock_in" class="form-control" value="{{ old('clock_in', $attendance->clock_in ? \Carbon\Carbon::parse($attendance->clock_in)->format('H:i') : '')  }}" required>
            </div>

            <!-- 退勤時刻 -->
            <div class="mb-3">
                <label for="clock_out" class="form-label">退勤時刻</label>
                <input type="time" name="clock_out" id="clock_out" class="form-control" value="{{ old('clock_out', $attendance->clock_out ? \Carbon\Carbon::parse($attendance->clock_out)->format('H:i') : '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>

        
    </div>
</div>

@endsection
