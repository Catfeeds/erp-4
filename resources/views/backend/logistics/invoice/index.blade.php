@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        发货单管理
        <small>发货单列表</small>
        <a class="btn btn-success btn-xs no-print" href="{{ URL('admin/logistics/invoices/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">发货单管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header">序号</th>
          <th> 客户 </th>
          <th> 发货内容 </th>
          <th> 发货数量 </th>
          <th class="hidden-xs"> 联系人 </th>
          <th class="hidden-xs"> 电话 </th>
          <th> 状态 </th>
          <th> 日期 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>      
        @foreach ($invoices as $content)
        <tr>
          <td class="check">{{ $content->id }}</td>
          <td> {{ $content->client }} </td>
          <td class="hidden-xs"> {{ $content->product }} </td>
          <td> {{ $content->quantity }} </td>
          <td class="hidden-xs"> {{ $content->contact }} </td>
          <td class="hidden-xs" > {{ $content->telephone }} </td>
          <td>{{ $content->state }}</td>
          <td> {{ $content->updated_at->diffForHumans() }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $invoices->total() !!}
        {!! Session::flash('currentPage', $invoices->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $invoices->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 