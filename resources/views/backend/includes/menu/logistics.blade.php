@extends('backend/layouts.master')

@section('title', '进销存管理')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        进销存管理
        <small>进销存管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">进销存管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
      <a class="btn btn-default" href="/admin/logistics/classifications" role="button"><i class="fa fa-shield fa-3x text-green"></i>
      <p> 部品类别</p>
      </a> <a class="btn btn-default" href="/admin/logistics/products" role="button"><i class="fa fa-bullseye fa-3x text-green"></i>
      <p> 部品管理</p>
      </a> <a class="btn btn-default" href="/admin/logistics/storehouses" role="button"><i class="fa fa-check fa-3x "></i>
      <p> 仓库管理</p>
      </a> <a class="btn btn-default" href="/admin/logistics/alarms" role="button"><i class="fa fa-th fa-3x text-green"></i>
      <p> 库存报警</p>
      </a>
        <h4>采购管理</h4>
      <a class="btn btn-default" href="/admin/logistics/applications" role="button"><i class="fa fa-align-left fa-3x text-green"></i>
      <p> 采购申请</p>
      </a> <a class="btn btn-default" href="/admin/logistics/purchases" role="button"><i class="fa fa-play-circle-o fa-3x text-green"></i>
      <p> 采购订单</p>
      </a> <a class="btn btn-default" href="/admin/logistics/entrys" role="button"><i class="fa fa-asterisk fa-3x text-green"></i>
      <p> 采购入库</p>
      </a> <a class="btn btn-default" href="" role="button"><i class="fa fa-eye fa-3x"></i>
      <p> 采购付款</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-sign-in fa-3x"></i>
      <p> 采购退货</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-money fa-3x"></i>
      <p> 采购对账</p>
      </a>
        <h4>库存管理</h4>
      <a class="btn btn-default" href="/admin/logistics/imports" role="button"><i class="fa fa-arrow-down fa-3x text-green"></i>
      <p> 其它入库</p>
      </a> <a class="btn btn-default" href="/admin/logistics/exports" role="button"><i class="fa fa-arrow-up fa-3x text-green"></i>
      <p> 其它出库</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-tasks fa-3x"></i>
      <p> 库存调拨</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x"></i>
      <p> 库存盘点</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 商品组装</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 商品拆分</p>
      </a> <a class="btn btn-default" href="/admin/logistics/checks" role="button"><i class="fa fa-smile-o fa-3x text-green"></i>
      <p> 质检报告</p>
      </a>
        <h4>销售管理</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-tasks fa-3x"></i>
      <p> 销售订单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x"></i>
      <p> 销售出库</p>

      </a> <a class="btn btn-default" href="/admin/logistics/invoices" role="button"><i class="fa fa-circle-o fa-3x text-green"></i>
      <p> 运货单管理 </p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 销售收款单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 销售退回</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 销售对账单</p>
      </a>
  </div>
</div>

@stop