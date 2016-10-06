@extends('backend.layouts.master')

@section('title', '客户管理')

@section('page-header')
    <h1>
        客户信息
        <small style="color: blue">>>>>{{ $client->short }}</small>
        <a class="btn btn-info btn-xs no-print" href="/admin/client/clients"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">客户信息</li>
@endsection

@section('content') 
    <?php
    $form = [
      '公司全称' => $client->company,
      '公司简称' => $client->short,
      '电话'     => $client->telephone,
      '传真'     => $client->fax,
      '地址'     => $client->address,
      '邮箱'     => $client->email,
      '网址'     => $client->netword,
      '开户行'   => $client->bank,
      '帐号'     => $client->account,
      '备注'     => $client->remark,
      '类型'     => isset($client->type->name)? $client->type->name:'',
      '来源'     => isset($client->source->name)? $client->source->name : '',
    ];
    ?>
  @include('backend.layouts.show')
@stop