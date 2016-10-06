@extends('backend/layouts.master')

@section('title', '报价明细')

@section('page-header')
    <h1>
        供应商报价
        <small>客户供应商报价详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/client/quoteprices"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">供应商报价</li>
@endsection

@section('content')
    <?php
    $form = [
      '供应商' => $quoteprice->supplier->name,
      '商品'   => $quoteprice->product->name,
      '单价'   => round($quoteprice->price,2).'元',
      '有效期' => $quoteprice->date,
      '货期'   => $quoteprice->cycle.'周',
      '附件'   => $quoteprice->attachment,
    ];
    ?>
  @include('backend.layouts.show')
@stop