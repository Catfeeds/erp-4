@extends('backend.layouts.master')

@section('title', '服务明细')

@section('page-header')
    <h1>
        客户服务
        <small>客户服务详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/client/services"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">客户服务</li>
@endsection

@section('content')
    <?php
    $form = [
      '编号'   => $service->number,
      '客户'   => $service->client->name,
      '联系人' => $service->contact,
      '内容'   => $service->content,
      '方式'   => $service->method,
      '类别'   => $service->type,
      '审核'   => $service->verify,
      '执行人' => $service->approver,
      '备注'   => $service->remark,
      '附件'   => $service->attachment,
      '创建人' => $service->creator,
    ];
    ?>
  @include('backend.layouts.show')
@stop