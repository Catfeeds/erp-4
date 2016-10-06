@extends('backend.layouts.master')

@section('title', '生产管理')

@section('page-header')
    <h1>
        新建工序名称
        <small>新建工序名称</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/processes"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">新建工序名称</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/processes',
        'method' => 'POST',
        'defaults' => [
          'name'   => '',
          'remark' => '',
    ], ];
    ?>
    @include('backend.manufacture.process.form')
  </div>
</div>
@stop