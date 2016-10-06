@extends('backend.layouts.master')

@section('title', '服务列表')

@section('page-header')
    <h1>
        编辑服务
        <small>编辑服务信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/client/services"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 编辑服务 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/client/services/'.$service->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'number'      => $service->number,
          'client_id'   => $service->client_id,
          'contact'     => $service->contact,
          'content'     => $service->content,
          'method'      => $service->method,
          'type'        => $service->type,
          'verify'      => $service->verify,
          'approver'    => $service->approver,
          'remark'      => $service->remark,
          'attachment'  => $service->attachment,
          'creator'     => $service->creator,
    ], ];
    ?>
    @include('backend.client.service.form')
@stop