@extends('backend.layouts.master')

@section('title', '编辑产品类别')

@section('page-header')
    <h1>
        编辑产品类别
        <small>编辑产品类别信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/logistics/classifications"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑产品类别 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/classifications/'.$classification->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'name'    => $classification->name,
          'order'    => $classification->order,
          'remark'  => $classification->remark,
    ], ];
    ?>
    @include('backend.logistics.classification.form')
  </div>
</div>
@stop