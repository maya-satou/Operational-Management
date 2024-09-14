@extends('layouts.app')

@section('content')


<h1 class="text-center mb-4">スキルランク編集</h1>
<div>
    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    <div class="col-md-6"><!--横幅を狭く固定-->

      <form action="{{ route('skill_ranks.update', $skill_rank->id) }}" method="POST">
      @csrf
      @method('PUT')

       <!--  スキル名 -->
       　<div class="form-group">
        <label for="skill_rank">スキル名</label>
        <input class="form-control" id="skill_rank" name="name" value="{{ $skill_rank -> name }}" placeholder="4文字まで入力してください。" maxlength="4" >
            
      </div>
     <button type="submit" class="btn btn-primary">更新</button>
    </form>
    
    </div>
</div>

@endsection
