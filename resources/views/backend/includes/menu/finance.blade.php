@extends('backend/layouts.master')

@section('title', '财务管理')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        财务管理
        <small>财务管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">财务管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <h4>基础资料</h4>
  <a class="btn btn-default" href="#">
  <i class="fa fa-glass fa-3x"></i>
  <p> 资金帐号</p></a> 
  <a class="btn btn-default" href="#">
  <i class="fa fa-heart fa-3x"></i>
  <p> 资金科目</p></a> <a class="btn btn-default" href="#">
  <i class="fa fa-film fa-3x"></i>
  <p> 固定资产</p></a>
  <h3>
    <h4>资金收支</h4>
  </h3>
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-download fa-3x"></i>
      <p> 收 入 单</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-play-circle-o fa-3x"></i>
      <p> 支 出 单</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-lock fa-3x"></i>
      <p> 发票管理</p></a> 
  <a class="btn btn-default" href="/admin/finance/bills" role="button">
      <i class="fa fa-volume-down fa-3x text-green"></i>
      <p> 票据管理</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-tag fa-3x"></i>
      <p> 存 取 款</p></a> 
  <a class="btn btn-default" href="" role="button">
      <i class="fa fa-print fa-3x "></i>
      <p> 还款计划</p></a> 
  <a class="btn btn-default" href="/plan" role="button">
      <i class="fa fa-italic fa-3x "></i>
      <p> 借款管理</p></a>
    <h4>财务报表</h4>
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-pencil fa-3x"></i>
      <p> 科目汇总</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-camera fa-3x"></i>
      <p> 收支情况</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-camera fa-3x"></i>
      <p> 流水明细</p></a> 
  <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-camera fa-3x"></i>
      <p> 收支明细</p></a> 
<a class="btn btn-default" href="#" role="button"><i class="fa fa-cog fa-3x"></i>
  <p> 收支汇总</p>
  </a>
    <h4>发票管理</h4>
  <a class="btn btn-default" href="#" role="button"><i class="fa fa-refresh fa-3x"></i>
  <p> 开票登记</p>
  </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-road fa-3x"></i>
  <p> 待开发票</p>
  </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-trash-o fa-3x"></i>
  <p> 已开发票</p>
  </a>
</div>
</div>
@stop