@extends('layouts.app')

@section('content')
<h1 class="mb-4">新規勤怠作成</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->
    <form method="POST" action="{{ route('attendances.store') }}">
    @csrf
    
    <!-- 社員選択 -->
    <div class="mb-3">
        <label for="employee_id" class="form-label">氏名</label>
        <input type="text" name="employee_id" id="employee_id" class="form-select" required>
            {{--@foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>--}}
    </div>

    <!-- 出勤時刻 -->
    <div class="mb-3">
        <label for="clock_in" class="form-label">出勤時刻</label>
        <input type="datetime-local" name="clock_in" id="clock_in" class="form-control" required>
    </div>

    <!-- 退勤時刻 -->
    <div class="mb-3">
        <label for="clock_out" class="form-label">退勤時刻</label>
        <input type="datetime-local" name="clock_out" id="clock_out" class="form-control">
    </div>

    <!-- Email入力 -->
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>

    <!-- Password入力 -->
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>

    <!-- 登録ボタン -->
    <button type="submit" class="btn btn-primary mt-3">登録</button>
</form>
    </div>

</div>

@endsection
