@extends('backend.layouts.master')

@section('title', '进销存')

@section('page-header')
    <h1>
        新建调拨
        <small>新建调拨</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/flits"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建调拨</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/flits',
        'method' => 'POST',
        'defaults' => [
          'out'    => '',
          'in'   => '',
          'handler'    => '',
          'use'     => '',
          'remark'    => '',
    ], ];
    ?>
    @include('backend.logistics.flit.form')
  </div>
</div>
@stop