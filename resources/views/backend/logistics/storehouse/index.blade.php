@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('page-header')
    <h1>
        仓库名称
        <small>仓库名称管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/storehouses/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">仓库名称管理</li>
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
        @foreach ($storehouses as $content)
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
        总数: {!! $storehouses->total() !!}
        {!! Session::flash('currentPage', $storehouses->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $storehouses->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 