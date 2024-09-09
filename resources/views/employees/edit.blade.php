@extends('layouts.app')

@section('content')
<h1 class="mb-4 text-center">社員情報編集</h1>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
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
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!--入社日-->
                 <div class="form-group">
                  <label for="hire_date">入社日</label>
                  <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ old('hire_date', $employee->hire_date) }}">
                 </div>

                <!-- 所属部署選択 -->
                <div class="mb-3">
                    <label for="department_id" class="form-label">所属部署</label>
                    <select name="department_id" id="department_id" class="form-control" required>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- スキルランク選択 -->
                <div class="mb-3">
                    <label for="skill_rank_id" class="form-label">スキルランク</label>
                    <select name="skill_rank_id" id="skill_rank_id" class="form-control" required>
                        @foreach($skill_ranks as $skill_rank)
                            <option value="{{ $skill_rank->id }}" {{ $employee->skill_rank_id == $skill_rank->id ? 'selected' : '' }}>
                                {{ $skill_rank->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">更新</button>
            </form>

            
        </div>
    </div>
</div>
@endsection
