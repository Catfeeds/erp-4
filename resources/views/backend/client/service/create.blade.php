@extends('backend.layouts.master')

@section('title', '新增服务')

@section('page-header')
    <h1>
        新增服务
        <small>新增客户服务信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/client/services"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">新建联系人</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/client/services',
        'method' => 'POST',
        'defaults' => [ 
          'number'      => '',
          'client_id'      => '',
          'contact'     => '',
          'content'     => '',
          'method'      => '',
          'type'        => '',
          'verify'      => '',
          'approver'    => '',
          'remark'      => '',
          'attachment'  => '',
          'creator'     => '',
    ], ];
    ?>
    @include('backend.client.service.form')
  </div>
</div>
@stop