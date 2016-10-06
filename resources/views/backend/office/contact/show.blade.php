@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        员工联系人
        <small>员工联系人详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/office/contacts"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">员工联系人</li>
@endsection

@section('content')
<div class="box box-info">
  <div class="box-body">
    <form class="form-horizontal" role="form">  
      <div class="form-group">
        <label class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->name }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">公司</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->client }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->gender }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">电话</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->telephone }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">生日</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->birthday }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">地址</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->address }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->email }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">类别</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->type }}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">备注</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $content->remark }}</p>
        </div>
      </div>
    </form>
  </div>   
</div>
@stop