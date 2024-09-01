@extends('layouts.app')

@section('content')
<h1 class="mb-4">スキルランク登録</h1>
<div>
    <ul>@foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
<div class="container">
    <div class="col-md-6"><!--横幅を狭く固定-->
        <form method="POST" action="{{ route('skill_ranks.store') }}">
            @csrf

            
        <div class="mb-3">
            <label for="name" class="form-label">スキルランク名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
           
        </div>
        
            <!-- {{--<div class="mb-3">
                <label for="employees" class="form-label">従業員を割り当てる:</label>
                <select name="employees[]" id="employees" class="form-select" multiple>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>--}} -->



            <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>

</div>

@endsection