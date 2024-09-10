@extends('layouts.app')

@section('content')

<h1 class="text-center mb-4">社員案件登録</h1>

<div>
    <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
<div class="d-flex justify-content-center">
    <div class="col-md-6"><!--横幅を狭く固定-->
        <form method="POST" action="{{ route('employee_projects.store') }}">
            @csrf

            <!-- 社員選択-->
            <div class="mb-3">
                <label for="employee_id" class="form-label">社員</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                    @foreach($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>  
            </div>
            
           <!-- 案件選択-->
           <div class="mb-3">
                <label for="project_id" class="form-label">案件</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>  
            </div>
            <!--期間入力-->
            <div class="mb-3">
                <label for="period" class="form-label">期間</label>
                <input type="month" name="period" id="name" class="form-select" required>
            </div>
            <!-- 単価入力 -->
            <div class="mb-3">
                <label for="cost" class="form-label">単価</label>
                <input type="number" name="cost" id="name" class="form-select" required>
            </div>


            <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>

</div>

@endsection