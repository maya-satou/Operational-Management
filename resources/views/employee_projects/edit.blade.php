@extends('layouts.app')

@section('content')

<h1 class="mb-4">社員案件編集</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('employee_projects.update', $employeeProject->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
    　　　　<label for="project_id">案件名</label>
    　　　　<select class="form-control" id="project_id" name="project_id">
        　　　　@foreach($projects as $project)
            　　<option value="{{ $project->id }}" {{ $employeeProject->project_id == $project->id ? 'selected' : '' }}>
                {{ $project->name }}
            　　　</option>
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

            
      </div>
     <button type="submit" class="btn btn-primary">更新</button>
    </form>
    
    </div>
</div>

@endsection

