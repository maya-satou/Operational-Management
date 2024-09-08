@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">新規社員登録</h1>

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

     

    <!-- フォーム -->
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <!-- 登録ボタン -->
     　　　　　　<div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary">登録</button>
   　　　　　　　 </div>

                <!-- 社員名 -->
                <div class="mb-3">
                    <label for="name" class="form-label">社員名</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <!--管理者か一般ユーザか-->
               <div>
                <input type="checkbox" name="is_admin" id="is_admin" value="1">
                <label for="is_admin">管理者</label>
               </div>

                <!-- 所属部署選択 -->
                <div class="mb-3">
                    <label for="department_id" class="form-label">所属部署</label>
                    <select name="department_id" id="department_id" class="form-control" required>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- スキルランク選択 -->
                <div class="mb-3">
                    <label for="skill_rank_id" class="form-label">スキルランク</label>
                    <select name="skill_rank_id" id="skill_rank_id" class="form-control" required>
                        @foreach($skill_ranks as $skill_rank)
                            <option value="{{ $skill_rank->id }}">{{ $skill_rank->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- 入社日 -->
                <div class="mb-3">
                    <label for="hire_date" class="form-label">入社日</label>
                    <input type="date" name="hire_date" id="hire_date" class="form-control" required>
                </div>

                <!-- メールアドレス -->
                <div class="mb-3">
                    <label for="email" class="form-label">メールアドレス</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <!-- パスワード -->
                <div class="mb-3">
                    <label for="password" class="form-label">パスワード</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <!-- パスワード確認 -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">パスワード確認</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                
            </form>
        </div>
    </div>
</div>
@endsection
