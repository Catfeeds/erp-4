@extends('backend.layouts.master')

@section('title', '新建客户')

@section('page-header')
    <h1>
        新建客户
        <small>新建客户供应商信息</small>
        <a class="btn btn-danger btn-xs no-print" href="/admin/client/clients"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 新建客户 </li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/client/clients',
        'method' => 'POST',
        'defaults' => [
            'company'    => '',
            'name'      => '',
            'telephone'  => '',
            'fax'        => '',
            'address'    => '',
            'email'      => '',
            'netword'    => '',
            'bank'       => '',
            'account'    => '',
            'remark'     => '',
            'type'       => '',
            'source'     => '',
    ], ];
    ?>
    @include('backend.client.client.form')
  </div>
</div>
@stop