@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        收据管理
        <small>收据接收开票记录</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/bills/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">收据管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th class="hidden-xs"> 票号 </th>
          <th> 客户 </th>
          <th> 名称 </th>
          <th class="hidden-xs"> 内容 </th>
          <th class="hidden-xs"> 收据种类 </th>
          <th> 金额 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bills as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->number }} </td>
          <td> {{ $content->belongsToClient->short }} </td>
          <td class="hidden-xs " > {{ $content->bill }} </td>
          <td class="hidden-xs"> {{ $content->content }} </td>
          <td class="hidden-xs">{{ $content->type }}</td>
          <td> {{ $content->money }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>   
    </table>
    <div class="pull-left">
        总数: {!! $bills->total() !!}
        {!! Session::flash('currentPage', $bills->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $bills->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 