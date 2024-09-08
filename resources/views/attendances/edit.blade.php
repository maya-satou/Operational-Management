@extends('layouts.app')

@section('content')

<h1 class="mb-4">勤怠編集</h1>
<div>
    <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            

            <!-- 出勤時刻 -->
            <div class="mb-3">
                <label for="clock_in" class="form-label">出勤時刻</label>
                <input type="datetime-local" name="clock_in" id="clock_in" class="form-control" value="{{ \Carbon\Carbon::parse($attendance->clock_in)->format('Y-m-d H:i') }}" required>
            </div>

            <!-- 退勤時刻 -->
            <div class="mb-3">
                <label for="clock_out" class="form-label">退勤時刻</label>
                <input type="datetime-local" name="clock_out" id="clock_out" class="form-control" value="{{ \Carbon\Carbon::parse($attendance->clock_out)->format('Y-m-d H:i') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>

        
    </div>
</div>

@endsection
