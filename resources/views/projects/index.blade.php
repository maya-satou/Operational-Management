@extends('layouts.app')

@section('content')
<div class="container">
  <h1>案件一覧</h1>
     <div>
       <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
          @endforeach
       </ul>
    </div>
        <div class="text-end">
            <!--案件登録ボタン-->
          <a href="{{ route('projects.create') }}" class="btn btn-primary">登録</a>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>案件名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                   
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('projects.edit',$project->id) }}" class="btn btn-sm btn-primary">編集</a>
                           
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
@endsection