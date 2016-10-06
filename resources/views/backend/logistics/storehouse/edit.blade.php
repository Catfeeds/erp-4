@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        编辑仓库名称
        <small>编辑仓库名称信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/logistics/storehouses"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑仓库名称 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/storehouses/'.$storehouse->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'name'    => $storehouse->name,
          'remark'  => $storehouse->remark,
    ], ];
    ?>
    @include('backend.logistics.storehouse.form')
  </div>
</div>
@stop