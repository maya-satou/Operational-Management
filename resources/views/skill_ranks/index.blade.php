@extends('layouts.app')

@section('content')
<div class="container">

        <h1>スキルランク</h1>

        <div class="text-end">
            <!--スキルランク登録ボタン-->
          <a href="{{ route('projects.create') }}" class="btn btn-primary">登録</a>

        
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>スキルランク</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill_ranks as $skill_rank)
                   @foreach($project->employees as $employee)
                    <tr>
                        <td>{{ $skill_rank->id }}</td>
                        <td>{{ $skill_rank->employee->name }}</td> <!-- Employeeの名前を表示する場合 -->
                        <td>{{ $skill_rank->name }}</td>
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('skill_ranks.edit',$skill_rank->id) }}" class="btn btn-sm btn-primary">編集</a>
                           
                        </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
    <a href="{{ route('skill_ranks.create') }}">新規作成</a>
@endsection