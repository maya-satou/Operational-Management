@extends('layouts.app')

@section('content')

<div class="container">
<h1>社員情報</h1>

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



    <div class="text-end mb-3">
        <!-- 社員登録ボタン -->
        <a href="{{ route('employees.create') }}" class="btn btn-primary">社員追加登録</a>
    </div>

    <!-- テーブル -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>所属部署</th>
                <th>スキルランク</th>
                <th>入社日</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->skill_rank->name }}</td>
                    <td>{{ $employee->hire_date }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
