@extends('layouts.admin_master')

@section('title', 'トップページ')

@section('sidebar')
@endsection

@section('content')
    <h1>トップページ<h1>
<input class="btn btn-default btn-block" type="button" onclick="location.href='{{route('admin.home')}}'" value="社員管理">
<input class="btn btn-default btn-block" type="button" onclick="location.href='{{route('admin.home')}}'" value="日報管理">
@endsection