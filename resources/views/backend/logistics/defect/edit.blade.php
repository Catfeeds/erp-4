@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑不良名称
        <small>编辑不良名称信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/logistics/defects"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑不良名称 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/defects/'.$defect->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'name'    => $defect->name,
          'remark'  => $defect->remark,
    ], ];
    ?>
    @include('backend.logistics.defect.form')
  </div>
</div>
@stop