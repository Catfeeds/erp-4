@extends('backend.layouts.master')

@section('title', '新建系统选项')

@section('page-header')
    <h1>
        新建系统选项
        <small>新建系统选项</small>
        <a class="btn btn-danger btn-xs no-print" href="/admin/system/options"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.system')
    <li class="active"> 新建系统选项 </li>
@endsection

@section('content')
<div class="box box-danger">
    <div class="box-body">
      <form class="form-horizontal" action="/admin/system/options" method="POST" >

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="mnum" value="{{$option->num}}">

      <div class="form-group{!! ($errors->has('company')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">上级名称</label>
        <div class="col-md-8">
          <input name="mnum" class="form-control" disabled="disabled" value="{{$option->num}}" placeholder="{{$option->mnum}}" type="text">
          {!! ($errors->has('company') ? $errors->first('company') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('short')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">新建名称</label>
        <div class="col-md-8">
          <input name="name" class="form-control" value="" placeholder="名称" type="text">
          {!! ($errors->has('short') ? $errors->first('short') : '') !!}
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/system/options" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>
      </div>
    </form>
  </div>
</div>
@stop