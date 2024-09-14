@extends('layouts.app')

@section('content')

<div class="container">
    <h1>出勤状況</h1>

    <div>
    <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>


    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session('standard_work_hours') && session('worked_hours') && session('over_time_hours'))
    <div>
        <p>所定労働時間: {{ session('standard_work_hours') .'時間'}} 時間</p>
        <p>実労働時間: {{ session('worked_hours').'時間' }} 時間</p>
        <p>時間外労働時間: {{ session('over_time_hours').'時間' }} .</p>
    </div>
    @endif

    <!-- 出勤 -->
    <div class="mb-4">
        <form action="{{ route('attendances.clock-in') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">出勤</button>
        </form>
    <!-- 退勤 -->
        <form action="{{ route('attendances.clock-out') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-secondary">退勤</button>
        </form>
    </div>

    <!-- 管理者か一般ユーザーかで表示を分岐 -->
    @if($is_admin)
    <h2>全従業員の勤怠記録</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>従業員ID</th>
                <th>従業員名</th>
                <th>日付</th>
                <th>出勤時間</th>
                <th>退勤時間</th>
                <th>所定労働時間</th>
                <th>時間外労働時間</th>
                <th>総労働時間</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
              
                <tr>
                    <!-- 従業員IDと従業員名の表示 -->
                    <td>{{ $attendance->employee->id }}</td>
                    <td>{{ $attendance->employee->name }}</td>
                    <!-- 勤怠情報の表示 -->
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->clock_in }}</td>
                    <td>{{ $attendance->clock_out }}</td>
                    <td>{{ $attendance->work_time .'時間'}}</td>
                    <td>{{ $attendance->over_time .'時間' }}</td>
                    <td>{{ $attendance->total_time .'時間' }}</td>
                    <td>
                            <!--編集のリンクを追加-->
                            <a href="{{ route('attendances.edit', $attendance->id) }}">編集</a>            
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else

    <h2>あなたの勤怠記録</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>日付</th>
                <th>出勤時間</th>
                <th>退勤時間</th>
                <th>所定労働時間</th>
                <th>時間外労働時間</th>
                <th>総労働時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->clock_in }}</td>
                    <td>{{ $attendance->clock_out }}</td>
                    <td>{{ $attendance->work_time .'時間'}}</td>
                    <td>{{ $attendance->over_time .'時間' }}</td>
                    <td>{{ $attendance->total_time .'時間' }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>
@endsection
