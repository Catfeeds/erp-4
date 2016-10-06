@extends('backend.layouts.master')

@section('title', '客户联系人明细')

@section('page-header')
    <h1>
        客户信息
        <small>客户供应商详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/client/contacts"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
  <?php
  $form = [
    '姓名' => $contact->name, 
    '性别' => $contact->gender,
    '电话' => $contact->telephone,
    'qq'   => $contact->qq,
    '微信' => $contact->birthday,
    '邮箱' => $contact->email,
    '地址' => $contact->address,
    '公司' => $contact->belongsToClient['short'],
    '职务' => $contact->position,
    '类型' => $contact->type,
    '备注' => $contact->remark,];
  ?>
  @include('backend.layouts.show')
@stop