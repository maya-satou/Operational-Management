@extends('layouts.app')

@section('content')

 <h1>新規社員登録</h1>

 {{-- @if($error->any())
  <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif--}}

  <div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
  <div class="container">

 <form action="{{ route('employees.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="name">氏名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required>

  </div>

  <div class="form-group">
    <label for="department">所属部署</label>
    <input type="text" class="form-control" id="department" name="department" value="{{ old('department')}}" required>

  </div>

  
   <div class="form-group">
    <label for="unit_price" >単価</label>
    <input type="number" step="0.01" class="form-control" id="cost_price" value="{{ old('cost_price')}}">
   </div>

   <div class="class form-group">
    <label for="cost_price">原価</label>
    <input class="number" step="0.01" class="form-control" name="cost_price" value="{{ old('cost_price') }}">

   </div>

    <div class="class form-group">
    <label for="skill_rank">スキルランク</label>
    <input class="text" class="form-control" id="skill_rank" name="skill_rank" value="{{ old('skill_rank') }}">
    
   </div>

    <div class="class form-group">
    <label for="work_hours">工数</label>
    <input class="number" step="0.01" class="form-control" name="work_hours" value="{{ old('work_hours') }}">
    
   </div>


 <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection