@extends('backend/layouts.master')

@section('title', '系统管理')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        系统管理
        <small>系统管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">系统管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <h4>操作员及权限</h4>
    <a class="btn btn-default" href="#" role="button"><i class="fa fa-glass fa-3x"></i>
    <p> 用户登录记录</p>
    </a> <a class="btn btn-default" href="{!!url('admin/access/users')!!}" role="button"><i class="fa fa-heart fa-3x text-green"></i>
    <p> 用户管理</p>
    </a> <a class="btn btn-default" href="{!!url('admin/access/roles')!!}" role="button"><i class="fa fa-heart fa-3x text-green"></i>
    <p> 角色管理</p>
    </a> <a class="btn btn-default" href="{!!url('admin/access/roles/permissions')!!}" role="button"><i class="fa fa-check fa-3x text-green"></i>
    <p> 权限管理</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-power-off fa-3x"></i>
    <p> 更改密码</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-film fa-3x"></i>
    <p> 仓库权限</p>
    </a>
      <h4>系统参数</h4>
    <a class="btn btn-default" href="/admin/system/database/create" role="button"><i class="fa fa-download fa-3x text-green"></i>
    <p> 数据库填充</p>
    </a> 
    <a class="btn btn-default" href="/admin/system/options" role="button"><i class="fa fa-download fa-3x text-green"></i>
    <p> 系统选项</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-play-circle-o fa-3x"></i>
    <p> 自动编码</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-lock fa-3x"></i>
    <p> 生成打印条码</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-volume-down fa-3x"></i>
    <p> 客户事件记录</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-tag fa-3x"></i>
    <p> 功能菜单</p>
    </a>
      <h4>系统维护</h4>
    <a class="btn btn-default" href="#" role="button"><i class="fa fa-pencil fa-3x"></i>
    <p> 审核中心</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-camera fa-3x"></i>
    <p> 反审核中心</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-refresh fa-3x"></i>
    <p> 设置月结操作</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-road fa-3x"></i>
    <p> 月结操作</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-trash-o fa-3x"></i>
    <p> 知信发送模块</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-inbox fa-3x"></i>
    <p> 消息模板</p>
    </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-cog fa-3x"></i>
    <p> 短信发送</p>
    </a>
  </div>
</div>

@stop