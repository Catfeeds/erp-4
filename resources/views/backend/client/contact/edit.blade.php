@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑联系人
        <small>编辑客户联系人信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/client/contacts"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 编辑联系人 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/client/contacts/'.$contact->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'name'      => $contact->name, 
          'gender'    => $contact->gender,
          'telephone' => $contact->telephone,
          'qq'        => $contact->qq,
          'wechat'    => $contact->wechat,
          'email'     => $contact->email,
          'address'   => $contact->address,
          'client'    => $contact->company,
          'position'  => $contact->position,
          'type'      => $contact->type,
          'remark'    => $contact->remark,
    ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">姓名</label>
    <div class="col-md-8">
      <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="姓名" type="text">
      {!! ($errors->has('name') ? $errors->first('name') : '') !!}
    </div>
  </div>
   <div class="form-group{!! ($errors->has('gender')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">性别</label>
    <div class="col-md-8">  
      {!! Form::selectGender('gender', $form['defaults']['gender'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('gender') ? $errors->first('gender') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('telephone')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">电话</label>
    <div class="col-md-8">
      <input name="telephone" value="{!! Request::old('telephone', $form['defaults']['telephone']) !!}" class="form-control" placeholder="电话" type="text">
      {!! ($errors->has('telephone') ? $errors->first('telephone') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('qq')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">QQ</label>
    <div class="col-md-8">
      <input name="qq" value="{!! Request::old('qq', $form['defaults']['qq']) !!}" class="form-control" placeholder="QQ" type="text">
      {!! ($errors->has('qq') ? $errors->first('qq') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('wechat')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">微信</label>
    <div class="col-md-8">
      <input name="wechat" value="{!! Request::old('wechat', $form['defaults']['wechat']) !!}" class="form-control"  placeholder="微信" type="text">
      {!! ($errors->has('wechat') ? $errors->first('wechat') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('email')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">邮箱</label>
    <div class="col-md-8">
      <input name="email" value="{!! Request::old('email', $form['defaults']['email']) !!}" class="form-control" placeholder="邮箱" type="text">
      {!! ($errors->has('email') ? $errors->first('email') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('position')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">职务</label>
    <div class="col-md-8">
      <input name="position" value="{!! Request::old('position', $form['defaults']['position']) !!}" class="form-control" placeholder="职务" type="text">
      {!! ($errors->has('position') ? $errors->first('position') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">分类</label>
    <div class="col-md-8">
      {!! Form::selectCompanyType('type', $form['defaults']['type'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('type') ? $errors->first('type') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('company')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">所属公司</label>
    <div class="col-md-8"> 
      <select name="company" class="select"> 
        @foreach ($clients as $content)
          @if ($content->id == $contact->company)
            <option value="{!! Request::old('company', $content->id); !!}"  selected="selected" type="text">{{ $content->short }}</option>
          @else
            <option value="{!! Request::old('company', $content->id); !!}" type="text">{{ $content->short }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('company') ? $errors->first('company') : '') !!}
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
        <a href="/admin/client/contacts" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
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