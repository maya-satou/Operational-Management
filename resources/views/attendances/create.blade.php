@extends('layouts.app')

@section('content')
<h1 class="mb-4">新規勤怠作成</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="d-flex justify-content-center">
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


    <!-- 出勤・退勤ボタン -->
    <form action="{{ route('attendances.clockIn') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">出勤</button>
        </form>
        <form action="{{ route('attendances.clockOut') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-secondary">退勤</button>
        </form>
    </div>

   
    <!-- 登録ボタン -->
    <button type="submit" class="btn btn-primary mt-3">登録</button>
</form>
    </div>

</div>

@endsection
