@extends('backend.layouts.master')

@section('title', '不良品名称')

@section('page-header')
    <h1>
        不良品名称
        <small>不良品名称管理</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">不良品名称管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 名称 </th>
        <th> 数量 </th>
        <th> 工位 </th>
        <th> 备注 </th>
        <th> 操作 </th>
          </thead>
      <tbody>
        @foreach ($defectives as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->name }} </td>
          <td> {{ $content->quantity }} </td>
          <td> {{ $content->station }} </td>
          <td> {{ $content->remark  }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $defectives->total() !!}
        {!! Session::flash('currentPage', $defectives->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $defectives->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 