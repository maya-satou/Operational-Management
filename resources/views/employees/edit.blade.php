@extends('layouts.app')

@section('content')


h1 class="mb-4">社員情報編集</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('employees.update', $employee->id) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- 社員選択 -->
       <div class="mb-3">
        <label for="employee_id" class="form-label">社員</label>
        <input type="text" name="employee_id" id="employee_id" class="form-control" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                    {{ $employee->name }}
                </option>
            @endforeach 
        
        </div>

       <!-- 所属部署 -->
        <div class="mb-3">
          <label for="department" class="form-label">所属部署</label>
          <input type="datetime-local" name="clock_in" id="clock_in" class="form-control" value="{{ \Carbon\Carbon::parse($attendance->clock_in)->format('Y-m-d\TH:i') }}" required>
        </div>
        <!--退勤時刻-->
        <div class="mb-3">
          <label for="clock_in" class="form-label">退勤時刻</label>
          <input type="datetime-local" name="clock_in" id="clock_in" class="form-control" value="{{ \Carbon\Carbon::parse($attendance->clock_in)->format('Y-m-d\TH:i') }}" required>
        </div>


       <button type="submit" class="btn btn-primary">更新</button>
    </form>
    <form method="POST" action="{{ route('attendances.destroy', $attendance) }}" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
    </div>
</div>

@endsection
