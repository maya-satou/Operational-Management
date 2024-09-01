@extends('layouts.app')

@section('content')
<div class="container">

        <h1>社員案件一覧</h1>

        <div class="text-end">
            <!--案件登録ボタン-->
          <a href="{{ route('employee_projects.create') }}" class="btn btn-primary">登録</a>

        
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>社員ID</th>
                    <th>案件ID</th>
                    <th>期間</th>
                    <th>単価</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee_projects as $employee_project)
                   
                    <tr>
                        <td>
                            
                            {{ $employee_project->employee_id }}
                        </td>
                        <td>{{ $employee_project->project_id }}</td>
                        <td>{{ $employee_project->period }}</td>
                        <td>{{ $employee_project->cost }}</td>
                        
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('employee_projects.edit',$employee_project->id) }}" class="btn btn-sm btn-primary">編集</a>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
@endsection