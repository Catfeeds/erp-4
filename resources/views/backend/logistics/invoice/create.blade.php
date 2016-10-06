@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        新增发货记录
        <small>新增发货信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/invoices"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新增发货记录</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/invoices',
        'method' => 'POST',
        'defaults' => [
          'client'    => '' ,
          'number'    => '' ,
          'product'   => '' ,
          'quantity'  => '' ,
          'contact'   => '' ,
          'operator'  => '' ,
          'telephone' => '' ,
          'address'   => '' ,
          'carrier_id'   => '' ,
          'state_id'     => '' ,
          'package'   => '' ,
          'weight'    => '' ,
          'fare'      => '' ,
          'remark'    => '' ,
    ], ];
    ?>
    @include('backend.logistics.invoice.form')
  </div>
</div>
@stop