@extends('backend.layouts.master')

@section('title', '生产管理')

@section('page-header')
    <h1>
        工序信息
        <small>工序详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/luster/processes?page={!! Session::get('currentPage') !!}"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">工序信息</li>
@endsection

@section('content')
  <?php
  $form = [
    '名称' => $process->name,
    '备注' => $process->remark,
    ];
  ?>
  @include('backend.layouts.show')
@stop