@extends('layouts.app')

@section('content')


<h1 class="mb-4">案件名編集</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('projects.update', $project->id) }}" method="POST">
      @csrf
      @method('PUT')

       <!--  案件名 -->
       　<div class="form-group">
        <label for="project">スキル名</label>
        <input class="form-control" id="project" name="name" value="{{ $project -> name }}" >
            
      </div>
     <button type="submit" class="btn btn-primary">更新</button>
    </form>
   
    </div>
</div>

@endsection
