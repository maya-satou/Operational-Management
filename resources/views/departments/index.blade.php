@extends('layouts.app')

@section('content')
<div class="container">

<h1>所属部署一覧</h1>
    　　<div class="text-end">
            <!--所属部署登録ボタン-->
          <a href="{{ route('departments.create') }}" class="btn btn-primary">登録</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                   <th>所属部署名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('departments.edit',$department->id) }}" class="btn btn-sm btn-primary">編集</a>
                           
                        </td>
                    </tr>
            　　 @endforeach
            </tbody>
        </table>
    </div>
@endsection