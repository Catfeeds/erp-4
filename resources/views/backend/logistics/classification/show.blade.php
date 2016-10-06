@extends('backend.layouts.master')

@section('title', '客户联系人明细')

@section('page-header')
    <h1>
        产品分类信息
        <small>产品分类详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/classifications"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">产品分类信息</li>
@endsection

@section('content')
  <?php
  $form = [
        '名称'      => $classification->name,
        '备注'      => $classification->remark,
        ];
  ?>
  @include('backend.layouts.show')
@stop