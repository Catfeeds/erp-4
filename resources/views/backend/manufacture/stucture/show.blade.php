@extends('backend.layouts.master')

@section('title', '生产管理')

@section('page-header')
    <h1>
        产品结构信息
        <small>产品结构详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/manufacture/stuctures"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">产品结构信息</li>
@endsection

@section('content')
  
  @foreach($parent_products as $value)
  @endforeach

  <?php
  foreach($parent_products as $value){
    if ($value->id == $stucture->parent_id){
      $parent_products = $value->name;
    }
  } 
  $form = [   
    '父件名称' => $parent_products,
    '部品名称' => $stucture->name,
    '数量'     => $stucture->factor,
    '工序'     => $stucture->hasOneProcess->name,
    ];
  ?>
  @include('backend.layouts.show')
@stop