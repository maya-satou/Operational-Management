@extends('layouts.app')

@section('content')


<h1 class="mb-4">スキルランク編集</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('skill_ranks.update', $skill_rank->id) }}" method="POST">
      @csrf
      @method('PUT')

       <!--  スキル名 -->
       　<div class="form-group">
        <label for="skill_rank">スキル名</label>
        <input class="form-control" id="skill_rank" name="name" value="{{ $skill_rank -> name }}" >
            
      </div>
     <button type="submit" class="btn btn-primary">更新</button>
    </form>
    
    </div>
</div>

@endsection
