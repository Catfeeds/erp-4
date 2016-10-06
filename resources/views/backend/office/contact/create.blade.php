@extends('backend/layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        新增员工联系人
        <small>新增员工联系人</small>
        <a class="btn btn-danger btn-xs " href="/admin/office/contacts"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">新增员工联系人</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
  </div>    
</div>
@stop