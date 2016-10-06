@extends('backend.layouts.master')

@section('title', '客户联系人明细')

@section('page-header')
    <h1>
        客户信息
        <small>客户供应商详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/personnel/personnels"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.personnel') 
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
  <?php
  // dd($personnel);
  $form = [
    '姓名' => $personnel->name, 
    '性别' => $personnel->gender,
    '电话' => $personnel->telephone,
    'qq'   => $personnel->qq,
    '微信' => $personnel->birthday,
    '邮箱' => $personnel->email,
    '地址' => $personnel->address,
    '公司' => $personnel->belongsToClient->short,
    '职务' => $personnel->position,
    '类型' => $personnel->type,
    '备注' => $personnel->remark,];
  ?>
  @include('backend.layouts.show')
@stop