@extends('layouts.admin_master')

@section('title', 'Employee update')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員情報更新　確認画面</h1>
    <div class="form-group lead">
        {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">氏名：</label>
            <div class="form-inline col-sm-9">
                {{$employee['last_name']}} {{$employee['first_name']}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="birthday">生年月日：</label>
            <div class="dateArea">
                <div class="col-sm-9" id="birthday">
                    {{$employee['birthday']}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="mail">メールアドレス：</label>
            <div class="col-sm-9" id="mail">
                {{$employee['mail']}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="password">パスワード：</label>
            <div class="col-sm-9">
                **********
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="password_comfirm">パスワード(確認)：</label>
            <div class="col-sm-9">
                **********
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" for="role_id">役職：</label>
            <div class="form-group"  id="role_id">
                {{$employee->role->role_name}}
            </div>
        </div>
        {!! Form::close() !!}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary col-xs-5" type="button" onclick="location.href='{{route('admin.update.completion.get')}}'" value="完了">
                <input class="btn btn-default col-xs-5" type="button" onclick="location.href='{{route('admin.get.update', ['id' => $employee['id']])}}'" value="修正">
            </div>
        </div>
    </div>
@endsection