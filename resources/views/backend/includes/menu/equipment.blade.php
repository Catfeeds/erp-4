@extends('backend/layouts.master')

@section('title', '设备管理')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        设备管理
        <small>设备管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">设备管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
         <h4>基础资料</h4>
        <a class="btn btn-default" href="/admin/equipment/equipments">
          <i class="fa fa-plane fa-3x text-green"></i>
          <p> 设备管理</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-heart fa-3x"></i>
          <p> 技术资料</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-film fa-3x"></i>
          <p> 技术特征</p>        
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-check fa-3x"></i>
          <p> 附属清单</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-play-circle-o fa-3x"></i>
          <p> 易损件表</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-lock fa-3x"></i>
          <p> 检查验收</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-volume-down fa-3x"></i>
          <p> 安装记录</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-tag fa-3x"></i>
          <p> 调试记录</p></a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-check fa-3x"></i>
          <p> 配件清单</p>
        </a> 
      <h4>设备跟进</h4>
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-download fa-3x"></i>
          <p> 运行情况</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-play-circle-o fa-3x"></i>
          <p> 保养计划</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-lock fa-3x"></i>
          <p> 保养登记</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-volume-down fa-3x"></i>
          <p> 维修登记</p>
        </a> 
        <a class="btn btn-default" href="#" role="button">
          <i class="fa fa-tag fa-3x"></i>
          <p> 事故报告</p>
        </a>
      <h4>设备报表</h4>
      <a class="btn btn-default" href="#" role="button">
        <i class="fa fa-pencil fa-3x"></i>
        <p> 运行统计</p>
      </a> 
      <a class="btn btn-default" href="#" role="button">
        <i class="fa fa-camera fa-3x"></i>
        <p> 保养明细</p>
      </a> 
      <a class="btn btn-default" href="#" role="button">
        <i class="fa fa-cog fa-3x"></i>
        <p> 维修明细</p>
      </a> 
      <a class="btn btn-default" href="#" role="button">
        <i class="fa fa-lock fa-3x"></i>
        <p> 保养记录</p>
      </a>
  </div>
</div>
@stop