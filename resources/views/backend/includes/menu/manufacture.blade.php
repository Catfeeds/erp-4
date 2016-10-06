@extends('backend/layouts.master')

@section('title', '生产组装')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        生产管理
        <small>生产管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">生产管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <h4>基础资料</h4>
      <a class="btn btn-default" href="/admin/manufacture/stuctures" role="button"> <i class="fa fa-building-o fa-3x text-green"></i><p> 产品结构</p></a> 
      <a class="btn btn-default" href="/admin/manufacture/processes" role="button"><i class="fa fa-shield fa-3x text-green"></i><p> 工序管理</p></a> 
      <a class="btn btn-default" href="/admin/manufacture/mrps" role="button"><i class="fa fa-bullseye fa-3x text-green"></i><p> MRP运算</p></a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-check fa-3x "></i><p> 设计管理</p></a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-th fa-3x " ></i><p> 成本项目</p></a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-th-list fa-3x "></i><p> 生产报价</p></a>
    <h4>生产流程</h4>
      <a class="btn btn-default" href="/admin/manufacture/plans" role="button"><i class="fa fa-align-left fa-3x text-green"></i><p> 生产计划</p></a> 
      <a class="btn btn-default" href="/admin/manufacture/worksheets" role="button"><i class="fa fa-play-circle-o fa-3x text-green"></i>
      <p> 加 工 单</p>
      </a> 
      <a class="btn btn-default" href="/admin/manufacture/outsources" role="button"><i class="fa fa-asterisk fa-3x text-green"></i>
      <p> 委外加工</p>
      </a> 
      <a class="btn btn-default" href="/admin/manufacture/receives" role="button"><i class="fa fa-eye fa-3x text-green"></i>
      <p> 委外入库</p>
      </a>  
      <a class="btn btn-default" href="/admin/manufacture/jerques" role="button"><i class="fa fa-sign-in fa-3x text-green"></i>
      <p> 生产入库</p>
      </a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-money fa-3x "></i>
      <p> 委外付款</p>
      </a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-balance-scale fa-3x "></i>
      <p> 成本分摊</p>
      </a>
    <h4>材料处理</h4>
      <a class="btn btn-default" href="/admin/manufacture/collects" role="button"><i class="fa fa-arrow-down fa-3x text-green"></i>
      <p> 领 料 单</p>
      </a> <a class="btn btn-default" href="/admin/manufacture/retours" role="button"><i class="fa fa-arrow-up fa-3x text-green"></i>
      <p> 退 料 单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-book fa-3x "></i>
      <p> 箱单管理</p>
      </a>
    <h4>生产报表</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-tasks fa-3x"></i>
      <p> 生产进度</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x "></i>
      <p> 需求清单</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 加工统计</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 生产日报</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 工序进度</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 领料明细</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 退料明细</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 材料使用</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 成本分摊</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i>
      <p> 成本计算</p></a> 
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-smile-o fa-3x"></i><p> 箱单明细</p></a>
  </div>
</div>

@stop