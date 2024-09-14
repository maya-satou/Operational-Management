@extends('layouts.app')

@section('content')


<h1 class="text-center mb-4">所属部署編集</h1>
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

      <form action="{{ route('departments.update', $department->id) }}" method="POST">
      @csrf
      @method('PUT')

       <!--  所属部署名 -->
       　<div class="form-group">
        　<label for="department">所属部署名</label>
        　<input class="form-control" id="department" name="name" value="{{ $department -> name }}" placeholder="12文字まで入力してください" maxlength="12" required>
            
      　</div>
     <button type="submit" class="btn btn-primary">更新</button>
    </form>
    
    </div>
</div>

@endsection