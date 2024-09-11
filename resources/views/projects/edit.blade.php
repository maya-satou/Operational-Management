@extends('layouts.app')

@section('content')


<h1 class="text-center mb-4">案件名編集</h1>
<div>
        <ul>@foreach ($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
</div>
<div class="d-flex justify-content-center">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('projects.update', $project->id) }}" method="POST">
      @csrf
      @method('PUT')

       <!--  案件名 -->
        <div class="form-group">
         <label for="project">案件名</label>
         <input class="form-control" id="project" name="name" value="{{ $project -> name }}" >
            
        </div>
      <!--更新ボタン-->
       <button type="submit" class="btn btn-primary mt-3">更新</button>
      
      </form>
   
    </div>
</div>

@endsection
