@extends('backend.layouts.master')

@section('title', '新建产品类别')

@section('page-header')
    <h1>
        新建产品类别
        <small>新建不良品名称</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/classifications"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建产品类别</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/classifications',
        'method' => 'POST',
        'defaults' => [
          'name'    => '',
          'order'    => '',
          'remark'    => '',
    ], ];
    ?>
    @include('backend.logistics.classification.form')
  </div>
</div>
@stop