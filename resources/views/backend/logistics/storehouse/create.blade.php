@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        新建仓库名称
        <small>新建仓库名称</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/storehouses"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建仓库名称</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/storehouses',
        'method' => 'POST',
        'defaults' => [
          'name'    => '',
          'remark'    => '',
    ], ];
    ?>
    @include('backend.logistics.storehouse.form')
  </div>
</div>
@stop