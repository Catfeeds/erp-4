@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑客户联系人
        <small>编辑客户联系人信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/contacts"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 编辑客户联系人 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
    <form action="{{ URL('contact/'.$contact->id) }}" method="POST" class="form-horizontal">
      <input name="_method" type="hidden" value="PUT">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="form-group">
        <label name="name" class="control-label col-md-2">公司名称</label>
        <div class="col-md-8">
          <input name="name" class="form-control" placeholder="公司全称" value="{{ $contact->name }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">简称</label>
        <div class="col-md-8">
          <input name="short" class="form-control" placeholder="公司简称" value="{{ $contact->short }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">邮政编码</label>
        <div class="col-md-8">
          <input name="postalcode" class="form-control" placeholder="邮政编码" value="{{ $contact->postalcode }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">电话</label>
        <div class="col-md-8">
          <input name="telephone" class="form-control" placeholder="电话" value="{{ $contact->telephone }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">传真</label>
        <div class="col-md-8">
          <input name="fax" class="form-control" placeholder="传真" value="{{ $contact->fax }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">地址</label>
        <div class="col-md-8">
          <input name="address" class="form-control" placeholder="地址" value="{{ $contact->address }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">邮箱</label>
        <div class="col-md-8">
          <input name="email" class="form-control" placeholder="邮箱" value="{{ $contact->email }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">网址</label>
        <div class="col-md-8">
          <input name="netword" class="form-control" placeholder="网址" value="{{ $contact->netword }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">开户行</label>
        <div class="col-md-8">
          <input name="bank" class="form-control" placeholder="开户行" value="{{ $contact->bank }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">帐号</label>
        <div class="col-md-8">
          <input name="account" class="form-control" placeholder="帐号" value="{{ $contact->account }}" type="text">
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">备注</label>
        <div class="col-md-8">
          <textarea name="remark" name="body" rows="5" placeholder="备注" value="{{ $contact->remark }}" type="text" ></textarea>
        </div>
      </div>
      <div class="form-group">
        <label  class="control-label col-md-2">客户来源</label>
        <div class="col-md-8">
          <input name="origin" class="form-control" placeholder="请输入文本" value="{{ $contact->origin }}" type="text">
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/office/contacts" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix">
      </div><!--well-->
    </form>
  </div>
</div>
@stop