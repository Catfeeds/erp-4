@extends('backend.layouts.master')

@section('title', '部品委外入库')

@section('page-header')
    <h1>
        新建委外入库
        <small>新建委外入库</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/receives"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">新建委外入库</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/receives',
        'method' => 'POST',
        'defaults' => [
          'number'    => $number,
          'product'   => '',
          'source'    => '',
          'total'     => '',
          'accept'    => '',
          'defective' => '',
          'remark'    => '',
    ], ];
    ?>
    @include('backend.manufacture.receive.form')
  </div>
</div>
@stop