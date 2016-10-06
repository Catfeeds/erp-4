@extends('backend.layouts.master')

@section('title', '生产管理')

@section('page-header')
    <h1>
        新建产品结构
        <small>新建产品结构</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/stuctures"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">新建产品结构</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/stuctures',
        'method' => 'POST',
        'defaults' => [
          'parent_id' => '',
          'factor'  => '',
          'process' => '',
    ], ];
    ?>
    @include('backend.manufacture.stucture.form')
  </div>
</div>
@stop