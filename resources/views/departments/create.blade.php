@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">所属部署登録</h1>
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
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <!-- 所属部署登録-->
            <div class="mb-3">
                <label for="department_id" class="form-label">所属部署登録</label>
                <input type="text" name="name" id="name" class="form-select" placeholder="12文字まで入力してください" maxlength="40" required>
            </div>
          



            <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>

</div>

@endsection