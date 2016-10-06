@extends('backend.layouts.master')

@section('title', '编辑部品')

@section('page-header')
    <h1>
        编辑部品
        <small>编辑部品信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/alarms"><b>返 回</b></a>
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
    $form = ['url' => URL('/admin/logistics/alarms/'.$product->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'name'          => $product->name, 
          'min'           => $product->min,
          'max'           => $product->max,
    ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" enctype="multipart/form-data" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">名称</label>
    <div class="col-md-8">
      <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="名称" type="text">
      {!! ($errors->has('name') ? $errors->first('name') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('min')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">最低库存</label>
    <div class="col-md-8">
      <input name="min" class="form-control" value="{!! Request::old('min', $form['defaults']['min']) !!}" placeholder="最低库存" type="text">
      {!! ($errors->has('min') ? $errors->first('min') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('max')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">最高库存</label>
    <div class="col-md-8">
      <input name="max" class="form-control" value="{!! Request::old('max', $form['defaults']['max']) !!}" placeholder="最高库存" type="text">
      {!! ($errors->has('max') ? $errors->first('max') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/logistics/alarms" class="btn btn-danger btn-xs">
        {{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>
  </div>
</div>
@stop