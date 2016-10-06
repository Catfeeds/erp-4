@extends('backend.layouts.master')

@section('title', '编辑部品')

@section('page-header')
    <h1>
        编辑部品
        <small>编辑部品信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/products"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑部品 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/products/'.$product->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'name'          => $product->name, 
          'order'         => $product->order, 
          'number'        => $product->number,
          'unit'          => $product->unit_id,
          'mode'          => $product->mode,
          'standard'      => $product->standard,
          'material'      => $product->material,
          'type'          => $product->type_id,
          'total'         => $product->total,
          'min'           => $product->min,
          'max'           => $product->max,
          'image'         => $product->image_id,
          'file'          => $product->file_id,
          'supplier'      => !empty($product->supplier_id) ? $product->supplier->name : '',
    ], ];
    ?>
    @include('backend.logistics.product.form')
  </div>
</div>
@stop