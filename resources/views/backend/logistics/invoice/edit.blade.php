@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        编辑发货记录
        <small>编辑发货信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/logistics/invoices"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑发货记录 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/invoices/'.$invoice->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'client'    => $invoice->client,
          'number'    => $invoice->number,
          'product'   => $invoice->product,
          'quantity'  => $invoice->quantity,
          'contact'   => $invoice->contact,
          'date'      => $invoice->date,
          'operator'  => $invoice->operator,
          'telephone' => $invoice->telephone,
          'address'   => $invoice->address, 
          'carrier_id'  => $invoice->carrier_id,
          'state_id'   => $invoice->state,
          'package'   => $invoice->package,
          'weight'    => $invoice->weight,
          'fare'      => $invoice->fare,
          'remark'    => $invoice->remark,
    ], ];
    ?>
    @include('backend.logistics.invoice.form')
@stop