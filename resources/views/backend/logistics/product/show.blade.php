@extends('backend.layouts.master')

@section('title', '部品信息')

@section('page-header')
    <h1>
        部品信息
        <small>部品详细信息</small>
        <a class="btn btn-info btn-xs no-print" href="/admin/logistics/products"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">部品信息</li>
@endsection

@section('content')
  <?php 
  $form = [
    '名称'     => $product->name, 
    '编号'     => $product->number,
    '型号'     => $product->mode,
    '规格'     => $product->standard,
    '分类'     => !empty($product->type_id) ? $product->type->name : '',
    '库存'     => $product->total,
    '单位'     => $product->unit->name,
    '最小量'   => $product->min,
    '最大量'   => $product->max,
    '供应商'   => !empty($product->supplier_id) ? $product->supplier->name : '',
    ];     
  ?>
  <div class="box box-info">
  <div class="box-body">
    <form class="form-horizontal" role="form">  
        @foreach($form as $key=>$value)
        <div class="form-group">
            <label class="col-sm-2 control-label">{{$key}}</label>
            <div class="col-sm-10">
              <p class="form-control-static">{{ $value }}</p>
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <label class="col-sm-2 control-label">图片</label>
            <div class="col-sm-10">
              <p class="form-control-static"><img src="{{ $product->hasOnePicture['logo'] }}"></p>
            </div>
        </div>
    </form>

  </div>
</div>
@stop