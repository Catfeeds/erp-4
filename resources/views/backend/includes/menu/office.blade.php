@extends('backend/layouts.master')

@section('title', '协同办公')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        协同办公
        <small>协同办公主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
        <h4>工作台</h4>
      <a class="btn btn-default" href="/admin/office/emails" role="button"><i class="fa fa-envelope fa-3x text-green"></i>
      <p> 邮件管理</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-bookmark fa-3x"></i>
      <p> 便   笺</p>
      </a> <a class="btn btn-default" href="/admin/office/memos" role="button"><i class="fa fa-edit fa-3x text-green"></i>
      <p> 备 忘 录</p>
      </a> <a class="btn btn-default" href="/admin/office/messages" role="button"><i class="fa fa-comments fa-3x "></i>
      <p> 消息管理</p>
      </a>
        <h4>共用资料</h4>
      <a class="btn btn-default" href="/admin/office/files" role="button"><i class="fa fa-folder fa-3x text-green"></i>
      <p> 文档管理</p>
      </a>
      <a class="btn btn-default" href="/kodexplorer" role="button"><i class="fa fa-folder fa-3x text-green"></i>
      <p> KODExplorer</p> 
      </a>
      <a class="btn btn-default" href="/typecho" role="button"><i class="fa fa-random fa-3x text-green"></i>
      <p> Blog</p>
      </a> <a class="btn btn-default" href="/admin/office/contacts" role="button"><i class="fa fa-book fa-3x text-green"></i>
      <p> 通 讯 录</p>
      </a>
  </div>
</div>

@stop