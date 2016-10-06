@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        发货单信息
        <small>发货单详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/invoices"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">发货单信息</li>
@endsection

@section('content')
    <?php
    $form = [
      '单号'      =>  $invoice->number,
      '客户'      =>  $invoice->belongsToClient->short,
      '发货内容'  =>  $invoice->belongsToProduct->name,
      '数量'      =>  $invoice->quantity,
      '收货人'    =>  $invoice->Consignor->name,
      '联系电话'  =>  $invoice->telephone,
      '联系地址'  =>  $invoice->address,
      '发货人'    =>  $invoice->Consignee->name,
      '承运人'    =>  $invoice->Carrier,
      '发货状态'  =>  $invoice->state,
      '包装样式'  =>  $invoice->package,
      '重量'      =>  $invoice->weight,
      '费用'      =>  $invoice->fare,
      '日期'      =>  $invoice->updated_at,
      '备注'      =>  $invoice->remark,
    ];
    ?>
  @include('backend.layouts.show')
@stop