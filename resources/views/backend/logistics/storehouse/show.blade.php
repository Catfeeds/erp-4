@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        仓库名称信息
        <small>仓库名称详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/storehouses"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">仓库名称信息</li>
@endsection

@section('content')
  <?php
  $form = [
        '名称'      => $storehouse->name,
        '备注'      => $storehouse->remark,
        ];
  ?>
  @include('backend.layouts.show')
@stop