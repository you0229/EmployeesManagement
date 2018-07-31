@extends('layouts.admin_master')

@section('title', 'Employee update')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員情報更新<h1>
    <form action="employee_update" class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label" for="employee_id">ＩＤ：</label>
            <div class="col-sm-10" id="employee_id">
                {{$_POST['employee_id']}}
                <input type="hidden" name="employee_id" value="{{$_POST['employee_id']}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">氏名：</label>
            <div class="form-inline col-sm-10">
                姓<input type="text" class="form-control" id="neme" name="last_name" value="{{$_POST['last_name']}}">名<input type="text" class="form-control" id="neme" name="first_name" value="{{$_POST['first_name']}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="role">役職：</label>
            {{$_POST['role']}}
            <select id="role" name="role" value="{{$_POST['role']}}">
                <option value="">変更</option>
                <option value="1">管理</option>
                <option value="2">役員</option>
                <option value="3">社員</option>
            </select>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('admin.post.update')}}'">じっこう</button>
                <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('admin.get.list')}}'">取り消し</button>
            </div>
        </div>
    </form>


@endsection