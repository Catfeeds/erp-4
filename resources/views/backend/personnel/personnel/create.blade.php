@extends('backend.layouts.master')

@section('title', '客户联系人')

@section('page-header')
    <h1>
        新建联系人
        <small>新建客户联系人</small>
        <a class="btn btn-danger btn-xs " href="/admin/personnel/personnels"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.personnel')
    <li class="active">新建联系人</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/personnel/personnels',
        'method' => 'POST',
        'defaults' => [
          'name'      => '', 
          'gender'    => '',
          'telephone' => '',
          'qq'        => '',
          'wechat'    => '',
          'email'     => '',
          'address'   => '',
          'company'   => '',
          'position'  => '',
          'type'      => '',
          'remark'    => '',
    ], ];
    ?>
    @include('backend.personnel.personnel.form')
  </div>
</div>
@stop