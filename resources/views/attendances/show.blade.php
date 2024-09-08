<div class="container">
        <h1>出勤・退勤管理</h1>

        @if ($attendance)
            <p>出勤時間: {{ $attendance->clock_in }}</p>
            <p>退勤時間: {{ $attendance->clock_out ?? '退勤していません' }}</p>
            <p>ステータス: {{ $attendance->status }}</p>
        @endif

        <!-- 出勤中かどうかを確認 -->
        @if ($attendances && $attendance->status === '出勤中')
            <!-- 退勤ボタン -->
            <form action="{{ route('attendances.clock-out') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">退勤</button>
            </form>
        @else
            <!-- 出勤ボタン -->
            <form action="{{ route('attendances.clock-in') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">出勤</button>
            </form>
        @endif
    </div>
@endsection