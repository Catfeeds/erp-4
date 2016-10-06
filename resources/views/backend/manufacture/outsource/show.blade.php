@extends('backend.layouts.master')

@section('title', '生产模块')

@section('page-header')
    <h1>
        加工单
        <small>加工单信息</small>
        <a class="btn btn-info btn-xs" href="/admin/manufacture/outsourcings"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
  <?php
  $form = [
    '计划单号' => $worksheet->number, 
    '产品编号' => $worksheet->plan->product->number,
    '产品名称' => $worksheet->plan->product->name,
    '生产状态' => $worksheet->state->name,
    '开始日期' => $worksheet->plan->start_date,
    '结束日期' => $worksheet->end_date,
    '计划数量' => $worksheet->plan->quantity,
    '完成数量' => $worksheet->plan->finish,
    '剩余数量' => $worksheet->plan->quantity - $worksheet->plan->finish,
    ];
  ?>
  @include('backend.layouts.show')
@stop