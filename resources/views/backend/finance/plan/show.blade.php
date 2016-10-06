@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        还款计划
        <small>还款计划详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/finance/plans"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.finance')
    <li class="active">还款计划</li>
@endsection

@section('content')
    <?php
    $form = [
      '客户'     => $plan->belongsToClient['short'], 
      '标题'     => $plan->title, 
      '还款日期' => $plan->date,
      '金额'     => $plan->money,
      '创建人'   => $plan->creator,
      '收据类型' => $plan->type,
    ];
    ?>
  @include('backend.layouts.show')
@stop