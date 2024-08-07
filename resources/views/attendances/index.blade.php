@extends('layouts.app')

@section('content')
<div class="container">
        <h1>勤怠記録</h1>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>出勤時間</th>
                    <th>退勤時間</th>
                    <th>作成日</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->employee->name }}</td> <!-- Employeeの名前を表示する場合 -->
                        <td>{{ $attendance->clock_in }}</td>
                        <td>{{ $attendance->clock_out }}</td>
                        <td>{{ $attendance->created_at }}</td>
                        <td>{{ $attendance->updated_at }}</td>
                        <td>
                            <!--編集や削除のリンクを追加-->
                            <a href="{{ route('attendances.edit',$attendance->id) }}" class="btn btn-sm btn-primary">編集</a>
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </br>
    </div>
@endsection