@extends('layouts.app')

@section('content')
<h1>社員情報</h1>

<div class="container">
　 <div class="col-md-6"><!--横幅を狭く固定-->
     <div class="text-end">
      <!--社員登録ボタン-->
　　   <a href="{{ route('employees.create') }}" class="btn btn-primary">社員追加登録</a>
       <br>
　　　  <table class="table table-bordered">
  　　   <thead>
        　<tr>
        　 <th>ID</th>
        　 <th>氏名</th>
        　 <th>所属部署</th>
         　<th>単価</th>
        　 <th>原価</th>
         　<th>スキルランク</th>
        　 <th>操作</th>
        　</tr>
   　　  </thead>
    　 <tbody>
    　  @foreach($employees as $employee)
         
    　　<tr>
        　<td>{{ $employee->employee_id }}</td>
       　 <td>{{ $employee->name }}</td>
        　<td>{{ $employee->department }}</td>
       　 <td>{{ $employee->unit_price }}</td> <!-- 単価 -->
        　<td>{{ $employee->pivot->cost }}</td> <!-- 原価 -->
        　<td>{{ $employee->skill_rank }}</td> <!-- スキルランク -->
       　 <td>
                <a href="{{ route('employees.edit', $employee->id) }}">編集</a>
       　 </td>
   　   </tr>
        
           
        
       @endforeach
      </tbody>

     </table>
      </div>
    </div>
    </br>
</div>
@endsection
