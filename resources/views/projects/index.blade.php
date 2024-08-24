@extends('layouts.app')

@section('content')
<div class="container">

        <h1>案件一覧</h1>

        <div class="text-end">
            <!--案件登録ボタン-->
          <a href="{{ route('projects.create') }}" class="btn btn-primary">登録</a>

        
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>案件名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                   @foreach($project->employees as $employee)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->employee->name }}</td> <!-- Employeeの名前を表示する場合 -->
                        <td>{{ $project->name }}</td>
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('projects.edit',$project->id) }}" class="btn btn-sm btn-primary">編集</a>
                           
                        </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
    <a href="{{ route('projects.create') }}">新規作成</a>
@endsection