@extends('backend/layouts.master')

@section('title', '报表中心')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        报表中心
        <small>报表中心主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">报表中心</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
        <h4>采购报表</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-glass fa-3x"></i>
      <p> 采购申请</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-heart fa-3x"></i>
      <p> 采购订单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-film fa-3x"></i>
      <p> 采购退货</p>
      </a>
        <h4>销售报表</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-download fa-3x"></i>
      <p> 销售订单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-play-circle-o fa-3x"></i>
      <p> 销售退回</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-lock fa-3x"></i>
      <p> 销售排行榜</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-volume-down fa-3x"></i>
      <p> 客户销售毛利</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-tag fa-3x"></i>
      <p> 客户销售排行榜</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-print fa-3x"></i>
      <p> 业务员销售排行</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-italic fa-3x"></i>
      <p> 最近未销售商品</p>
      </a>
        <h4>仓库报表</h4>
      <a class="btn btn-default" href="/admin/report/stock/list/all" role="button"><i class="fa fa-pencil fa-3x "></i>
      <p> 库存查询</p>
      </a> <a class="btn btn-default" href="/admin/report/stock/alarm/all" role="button"><i class="fa fa-camera fa-3x "></i>
      <p> 库存商品报警</p>
      </a> <a class="btn btn-default" href="/admin/report/stock/list/in" role="button"><i class="fa fa-lock fa-3x "></i>
      <p> 入库明细表</p>
      </a> <a class="btn btn-default" href="/admin/report/stock/list/out" role="button"><i class="fa fa-volume-down fa-3x "></i>
      <p> 出库明细表</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-tag fa-3x"></i>
      <p> 调拨明细</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-print fa-3x"></i>
      <p> 盘点报表</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-italic fa-3x"></i>
      <p> 商品组装明细</p>
      </a> <a class="btn btn-default" href="/admin/report/stock/collect" role="button"><i class="fa fa-cog fa-3x  "></i>
      <p> 库存汇总</p>
      </a>
        <h4>综合报表</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-refresh fa-3x"></i>
      <p> 客户应收应付</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-road fa-3x"></i>
      <p> 客户期帐</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-trash-o fa-3x"></i>
      <p> 商品进出统计</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-inbox fa-3x"></i>
      <p> 客户订单汇总</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-barcode fa-3x"></i>
      <p> 库存进出汇总</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-bookmark fa-3x"></i>
      <p> 库存进出明细</p>
      </a>
  </div>
</div>


@stop