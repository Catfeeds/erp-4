@extends('backend.layouts.master')

@section('title', '采购入库')

@section('page-header')
    <h1>
        采购入库
        <small>采购入库管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/flits/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">采购入库管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 编号 </th>
        <th> 调出库 </th>
        <th> 拨入库 </th>
        <th> 经手人 </th>
        <th> 目的 </th>
        <th> 备注 </th>
        <th> 操作 </th>
          </thead>
      <tbody>
        @foreach ($flits as $content)
        <tr>
          <td class="hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->number }} </td>
          <td> {{ $content->Storehouseout->name }} </td>
          <td> {{ $content->Storehousein->name }} </td>
          <td> {{ $content->belongsToHandler->name }} </td>
          <td> {{ $content->use }} </td>
          <td class="hidden-xs"> {{ $content->remark }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $flits->total() !!}
        {!! Session::flash('currentPage', $flits->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $flits->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 