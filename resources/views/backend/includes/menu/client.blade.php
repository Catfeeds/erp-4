@extends('backend/layouts.master')

@section('title', '客户供应商')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        客户供应商管理
        <small>客户供应商主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">客户管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <h4 >基础资料</h4>
    <a class="btn btn-default" href="#">
      <i class="fa fa-database fa-3x"></i>
      <p>基础资料</p>
    </a> 
    <a class="btn btn-default" href="#">
      <i class="fa fa-sitemap fa-3x"></i>
      <p> 客户分类</p>
    </a> 
    <a class="btn btn-default" href="/admin/client/clients">
      <i class="fa fa-list-ul fa-3x text-green"></i>
      <p> 客户资料</p>
    </a>
    <h4 >客户往来</h4>
    <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-exchange fa-3x"></i>
      <p> 客户往来</p>
    </a>
    <a class="btn btn-default" href="/admin/client/quoteprices" role="button">
      <i class="fa fa-file-text fa-3x text-green"></i>
      <p> 供应商报价</p>
    </a> 
    <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-phone fa-3x"></i><p> 联系回访</p></a> 
    <a class="btn btn-default" href="/admin/client/services" role="button">
      <i class="fa fa-tag fa-3x text-green"></i><p> 客户服务</p></a> 
    <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-ils fa-3x "></i><p> 状态变更</p></a> 
    <a class="btn btn-default" href="#" role="button">
      <i class="fa fa-list-ol fa-3x"></i><p> 客户分析</p></a>
  </div>
</div>
@stop