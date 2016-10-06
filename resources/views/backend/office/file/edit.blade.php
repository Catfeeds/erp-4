@extends('backend.layouts.master')

@section('title', '文档管理')

@section('page-header')
    <h1>
        编辑文件
        <small>编辑文件信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/files"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 编辑文件 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/office/files/'.$document->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'name'     => $document->name, 
          'number'   => $document->number,
          'project'  => $document->project,
          'url'      => $document->url,
          'version'  => $document->version,
          'remark'   => $document->remark, 
        ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" enctype="multipart/form-data" >

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

      <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">文件编号</label>
        <div class="col-md-8">
          <input name="number" value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" placeholder="文件编号" type="text">
          {!! ($errors->has('number') ? $errors->first('number') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">文件名</label>
        <div class="col-md-8">
          <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="文件名" type="text">
          {!! ($errors->has('name') ? $errors->first('name') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('project')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">关联项目</label>
        <div class="col-md-8">
          <input name="project" value="{!! Request::old('project', $form['defaults']['project']) !!}" class="form-control" placeholder="关联项目" type="text">
          <p style="color: red;">一个项目的名称只能有一个。</p>
          {!! ($errors->has('project') ? $errors->first('project') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('version')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">版本号</label>
        <div class="col-md-8">
          <input name="version" value="{!! Request::old('version', $form['defaults']['version']) !!}" class="form-control" placeholder="版本号" type="text">
          {!! ($errors->has('version') ? $errors->first('version') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">备注</label>
        <div class="col-md-8">
          <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
          {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/office/documents" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
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