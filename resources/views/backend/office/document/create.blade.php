@extends('backend.layouts.master')

@section('title', '文档管理')

@section('page-header')
    <h1>
        新增文件记录
        <small>新增文件记录信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/office/documents"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">新增文件记录</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/office/documents',
        'method' => 'POST',
        'defaults' => [
          'name'     => '', 
          'number'   => '',
          'project'  => '',
          'url'      => '',
          'version'  => '',
          'remark'   => '', 
        ], ];
    ?>
    @include('backend.office.document.form')
  </div> 
</div>
@stop