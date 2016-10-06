@extends('backend.layouts.master')

@section('title', '检查记录')

@section('page-header')
    <h1>
        检查记录
        <small>检查记录管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/manufacture/jerques/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">检查记录管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 单号 </th>
        <th> 部品名称 </th>
        <th> 来料总数 </th>
        <th> 成品数量 </th>
        <th> 备注 </th>
        <th> 操作 </th>
          </thead>
      <tbody>
        @foreach ($jerques as $key => $content)
        <tr>
          <td>{{ $key+1 }}</td>
          <td> {{ $content->number }} </td>
          <td> {{ $content->product->name }} </td>
          <td> {{ $content->total }} </td>
          <td> {{ $content->accept }} </td>
          <td> {{ $content->remark }} </td>
          <td> {!! $content->actionbuttons !!} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $jerques->total() !!}
        {!! Session::flash('currentPage', $jerques->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $jerques->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 