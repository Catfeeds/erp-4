@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑客户联系人
        <small>编辑客户联系人信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/flows"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 编辑客户联系人 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
    <form action="/admin/luster/flows" method="POST" class="form-horizontal">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="form-group">
        <label name="flow_id" class="control-label col-md-2">编号</label>
        <div class="col-md-8">
          <input name="flow_id" class="form-control" placeholder="编号" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">名称</label>
        <div class="col-md-8">
          <input name="flow_name" class="form-control" placeholder="名称"  type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">状态</label>
        <div class="col-md-8">
          <input name="status" class="form-control" placeholder="状态" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">备注</label>
        <div class="col-md-8">
          <input name="remark" class="form-control" placeholder="备注"  type="text">
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/luster/flows" class="btn btn-danger btn-xs">取消</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-xs" value="确定" />
        </div>
        <div class="clearfix">
      </div><!--well-->
    </form>
  </div>
</div>
@stop