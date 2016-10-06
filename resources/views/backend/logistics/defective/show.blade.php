@extends('backend.layouts.master')

@section('title', '客户联系人明细')

@section('page-header')
    <h1>
        不良品信息
        <small>不良品详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/defectives"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">不良品信息</li>
@endsection

@section('content')
  <?php
  $form = [
        '编号' => $defective->number,
        '名称' => $defective->name,
        '数量' => $defective->quantity,
        '工位' => $defective->station,
        '备注' => $defective->remark,
        ];
  ?>
  @include('backend.layouts.show')
@stop