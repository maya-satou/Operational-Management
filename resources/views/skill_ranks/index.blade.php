@extends('layouts.app')

@section('content')
<div class="container">

        <h1>スキルランク</h1>

        <div class="text-end">
            <!--スキルランク登録ボタン-->
          <a href="{{ route('skill_ranks.create') }}" class="btn btn-primary">登録</a>

        
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
              
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill_ranks as $skill_rank)
                  
                    <tr>
                        <td>{{ $skill_rank->id }}</td>
                        <td>{{ $skill_rank->name }}</td> <!-- Employeeの名前を表示する場合 -->
                        
                        <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('skill_ranks.edit',$skill_rank->id) }}" class="btn btn-sm btn-primary">編集</a>
                           
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
  
@endsection