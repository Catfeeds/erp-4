@extends('backend.layouts.master')

@section('title', '客户联系人列表')

@section('page-header')
    <h1>
        客户联系人
        <small>新建客户联系人</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/client/contacts/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">客户联系人管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 姓名 </th>
        <th> 客户 </th>
        <th class="hidden-xs"> 性别 </th>
        <th> 电话 </th>
        <th> 邮箱 </th>
        <th class="hidden-xs"> QQ </th>
        <th class="hidden-xs"> 微信</th>
        <th>　操作 </th>
          </thead>
      <tbody>
        @foreach ($contacts as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->name }} </td>
          <td> {{ $content->belongsToClient['short']  }} </td>
          <td class="hidden-xs"> {{ $content->gender }} </td>
          <td> {{ $content->telephone }} </td>
          <td> {!! link_to("mailto:".$content->email, $content->email) !!} </td>
          <td class="hidden-xs"> {{ $content->qq }} </td>
          <td class="hidden-xs"> {{ $content->wechat }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $contacts->total() !!}
        {!! Session::flash('currentPage', $contacts->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $contacts->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 