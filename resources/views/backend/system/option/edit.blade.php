@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑客户
        <small style="color: blue">>>>>{{ $client->short }}</small>
        <a class="btn btn-warning btn-xs no-print" href="/admin/system/clients"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.system')
    <li class="active"> 编辑客户 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">    
  <?php
    $form = ['url' => URL('/admin/system/clients/'.$client->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
            'company'   => $client->company,
            'short'     => $client->short,
            'telephone' => $client->telephone,
            'fax'       => $client->fax,
            'address'   => $client->address,
            'email'     => $client->email,
            'netword'   => $client->netword,
            'bank'      => $client->bank,
            'account'   => $client->account,
            'remark'    => $client->remark,
            'type'      => $client->type,
            'origin'    => $client->origin,
    ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

      <div class="form-group{!! ($errors->has('company')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">公司名称</label>
        <div class="col-md-8">
          <input name="company" class="form-control" value="{!! Request::old('company', $form['defaults']['company']) !!}" placeholder="公司全称" type="text">
          {!! ($errors->has('company') ? $errors->first('company') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('short')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">简称</label>
        <div class="col-md-8">
          <input name="short" class="form-control" value="{!! Request::old('short', $form['defaults']['short']) !!}" placeholder="公司简称" type="text">
          {!! ($errors->has('short') ? $errors->first('short') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('telephone')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">电话</label>
        <div class="col-md-8">
          <input name="telephone" class="form-control" value="{!! Request::old('telephone', $form['defaults']['telephone']) !!}" placeholder="电话" type="text">
          {!! ($errors->has('telephone') ? $errors->first('telephone') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('fax')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">传真</label>
        <div class="col-md-8">
          <input name="fax" class="form-control" value="{!! Request::old('fax', $form['defaults']['fax']) !!}" placeholder="传真" type="text">
          {!! ($errors->has('fax') ? $errors->first('fax') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('address')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">地址</label>
        <div class="col-md-8">
          <input name="address" class="form-control" value="{!! Request::old('address', $form['defaults']['address']) !!}{{ old('address') }}" placeholder="地址" type="text">
          {!! ($errors->has('address') ? $errors->first('address') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('email')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">邮箱</label>
        <div class="col-md-8">
          <input name="email" class="form-control" value="{!! Request::old('email', $form['defaults']['email']) !!}{{ old('email') }}" placeholder="邮箱" type="text">
          {!! ($errors->has('email') ? $errors->first('email') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('netword')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">网址</label>
        <div class="col-md-8">
          <input name="netword" class="form-control" value="{!! Request::old('netword', $form['defaults']['netword']) !!}" placeholder="网址" type="text">
          {!! ($errors->has('netword') ? $errors->first('netword') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('bank')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">开户行</label>
        <div class="col-md-8">
          <input name="bank" class="form-control" value="{!! Request::old('bank', $form['defaults']['bank']) !!}" placeholder="开户行" type="text">
          {!! ($errors->has('bank') ? $errors->first('bank') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('account')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">帐号</label>
        <div class="col-md-8">
          <input name="account" class="form-control" value="{!! Request::old('account', $form['defaults']['account']) !!}" placeholder="帐号" type="text">
          {!! ($errors->has('account') ? $errors->first('account') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
        <label  class="control-label col-md-2">类型</label>
        <div class="col-md-8"> 
          <select name="type" class="select"> 
            @foreach ($clientType as $content)
              @if ($content->id == $client->type)
                <option value="{!! Request::old('company', $content->id); !!}"  selected="selected" type="text">{{ $content->name }}</option>
              @else
              <option value="{!! Request::old('type', $content->id); !!}" type="text">{{ $content->name }}</option>
              @endif
            @endforeach
          </select> 
          {!! ($errors->has('type') ? $errors->first('type') : '') !!}
        </div> 
      </div>
      <div class="form-group{!! ($errors->has('origin')) ? ' has-error' : '' !!}"> 
        <label  class="control-label col-md-2">来源</label>
        <div class="col-md-8"> 
          <select name="origin" class="select"> 
            @foreach ($clientOrigin as $content)
              @if ($content->id == $client->origin)
                <option value="{!! Request::old('company', $content->id); !!}"  selected="selected" type="text">{{ $content->name }}</option>
              @else
              <option value="{!! Request::old('origin', $content->id); !!}" type="text">{{ $content->name }}</option>
              @endif
            @endforeach
          </select> 
          {!! ($errors->has('origin') ? $errors->first('origin') : '') !!}
        </div> 
      </div>
      <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
        <label  class="control-label col-md-2">备注</label>
        <div class="col-md-8">
          <textarea name="remark" class="form-control" value="" name="body" placeholder="备注" type="text" >{!! Request::old('remark', $form['defaults']['remark']) !!}
          {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
          </textarea>
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/system/clients" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
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