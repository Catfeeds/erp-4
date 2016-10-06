@extends('backend.layouts.master')

@section('title', '新建部品')

@section('page-header')
    <h1>
        新建部品
        <small>新建部品信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/products"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')  
    <li class="active">新建部品</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/products',
        'method' => 'POST',
        'defaults' => [
          'name'          => '', 
          'order'         => '', 
          'number'        => '',
          'unit'          => '',
          'mode'          => '',
          'standard'      => '',
          'material'      => '',
          'type'          => '',
          'total'         => '',
          'min'           => '',
          'max'           => '',
          'image'         => '',
          'file'          => '',
          'supplier'        => '',
    ], ];
    ?>
    @include('backend.logistics.product.form')
  </div>
</div>
@stop