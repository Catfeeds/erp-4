@extends('backend.layouts.master')

@section('title', '不良品名称')

@section('page-header')
    <h1>
        不良品名称
        <small>不良品名称管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/defects/create') }}"><b>新 建</b></a>
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
        <th> 说明 </th>
        <th> 操作 </th>
          </thead>
      <tbody>
        @foreach ($defects as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->name }} </td>
          <td> {{ $content->remark  }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $defects->total() !!}
        {!! Session::flash('currentPage', $defects->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $defects->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 