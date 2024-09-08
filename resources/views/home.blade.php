@extends('layouts.app')

@section('title', '業務管理システム')

@section('content_header')
    <h1>業務管理システム</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="row">
        <!--勤怠管理セクション-->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">勤怠管理</h3>
                </div>
                <div class="box-body">
                    <p>出勤・退勤の打刻、総労働時間の確認などができます。</p>
                    <a href="{{ route('attendances.index')}}" class="btn btn-primary">勤怠管理に移動</a>
               </div>
            </div>
        </div>
    </div>
    <!--社員情報管理セクション-->
    <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">社員情報管理</h3>
                </div>
                <div class="box-body">
                    <p>社員の情報を登録・編集・更新することができます。</p>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">社員情報管理に移動</a>
               </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
