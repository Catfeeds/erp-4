@extends('backend.layouts.master')

@section('title', '新建不良名称')

@section('page-header')
    <h1>
        新建不良名称
        <small>新建不良名称</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/defects"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建不良名称</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/defects',
        'method' => 'POST',
        'defaults' => [
          'name'   => '',
          'remark' => '',
    ], ];
    ?>
    @include('backend.logistics.defect.form')
  </div>
</div>
@stop