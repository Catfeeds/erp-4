@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        新增还款计划
        <small>新增还款计划内容</small>
        <a class="btn btn-danger btn-xs " href="/admin/finance/plans"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.finance')
    <li class="active">新增还款计划</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/finance/plans',
        'method' => 'POST',
        'defaults' => [
          'client'  => '', 
          'title'   => '', 
          'date'    => '',
          'money'   => '',
          'creator' => '',
          'state'   => '',
          'type'    => '',
    ], ];
    ?>
    @include('backend.finance.plan.form')
  </div>
</div>
@stop