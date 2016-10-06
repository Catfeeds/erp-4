@extends('backend.layouts.master')

@section('title', '客户联系人明细')

@section('page-header')
    <h1>
        不良品信息
        <small>不良品详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/defects"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">不良品信息</li>
@endsection

@section('content')
  <?php
  $form = [
    '名称' => $defect->name,
    '备注' => $defect->remark,
    ];
  ?>
  @include('backend.layouts.show')
@stop