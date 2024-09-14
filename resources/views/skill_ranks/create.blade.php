@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">スキルランク登録</h1>
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
        <form method="POST" action="{{ route('skill_ranks.store') }}">
            @csrf

            
        <div class="mb-3">
            <label for="name" class="form-label">スキルランク名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="4文字まで入力してください。" maxlength="4" required>
        </div>
            <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>

</div>

@endsection