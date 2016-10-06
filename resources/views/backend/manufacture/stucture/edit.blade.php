@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑产品结构
        <small>编辑产品结构信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/manufacture/stuctures"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑产品结构 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/stuctures/'.$stucture->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'parent_id'   => $stucture->parent_id,
          'factor'    => $stucture->factor,
          'process'     => $stucture->process,
    ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

      <div class="form-group{!! ($errors->has('parent_id')) ? ' has-error' : '' !!}"> 
        <label  class="control-label col-md-2">父件名称</label>
        <div class="col-md-8"> 
          <select name="parent_id" class="select"> 
            @foreach ($assembly as $content)
              @if ($content->id == $stucture->parent_id)
                <option value="{!! Request::old('parent_id', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
              @else
                <option value="{!! Request::old('parent_id', $content->id); !!}" type="text">{{ $content->name }}</option>
              @endif
            @endforeach
          </select> 
          {!! ($errors->has('parent_id') ? $errors->first('parent_id') : '') !!}
        </div> 
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">部品名称</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $product->name }}</p>
        </div>
      </div>
      <div class="form-group{!! ($errors->has('factor')) ? ' has-error' : '' !!}">
        <label name="factor" class="control-label col-md-2">数量</label>
        <div class="col-md-8">
          <input name="factor" value="{!! Request::old('factor', $form['defaults']['factor']) !!}" class="form-control" placeholder="名称" type="text">
          {!! ($errors->has('factor') ? $errors->first('factor') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('process')) ? ' has-error' : '' !!}"> 
        <label  class="control-label col-md-2">工序名称</label>
        <div class="col-md-8"> 
          <select name="process" class="select"> 
            @foreach ($processes as $content)
              @if ($content->id == $stucture->process)
                <option value="{!! Request::old('process', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
              @else
                <option value="{!! Request::old('process', $content->id); !!}" type="text">{{ $content->name }}</option>
              @endif
            @endforeach
          </select> 
          {!! ($errors->has('process') ? $errors->first('process') : '') !!}
        </div> 
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/manufacture/stuctures" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
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