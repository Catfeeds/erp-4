@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        票据信息
        <small>票据详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/office/bills"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">票据信息</li>
@endsection

@section('content')
    <?php
    $form = [
      '标题'     => $bill->bill, 
      '客户'     => $bill->belongsToClient->short,
      '内容'     => $bill->content,
      '收据类型' => $bill->type,
      '金额'     => $bill->money,
      '票号'     => $bill->number, 
      '开票人'   => $bill->drawer,
      '备注'     => $bill->remark,
    ];
    ?>
  @include('backend.layouts.show')
@stop