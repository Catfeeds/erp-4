@extends('backend.layouts.master')

@section('title', '部品检查记录')

@section('page-header')
    <h1>
        新建检查记录
        <small>新建检查记录</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/jerques"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">新建检查记录</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/jerques',
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
    @include('backend.manufacture.jerque.form')
  </div>
</div>
@stop