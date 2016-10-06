@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑工序名称
        <small>编辑工序名称信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/manufacture/processes"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑工序名称 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/processes/'.$process->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'name'    => $process->name,
          'remark'  => $process->remark,
    ], ];
    ?>
    @include('backend.manufacture.process.form')
  </div>
</div>
@stop