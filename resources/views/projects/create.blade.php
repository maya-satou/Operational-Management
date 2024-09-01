@extends('layouts.app')

@section('content')
<h1 class="mb-4">新規案件登録</h1>
<div>
    <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <!-- 案件登録 -->
            <div class="mb-3">
                <label for="project_id" class="form-label">案件名</label>
                <input type="text" name="name" id="name" class="form-select" required>
            </div>
            
           <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>

</div>

@endsection