@extends('backend.layouts.master')

@section('title', '产品类别')

@section('page-header')
    <h1>
        产品类别
        <small>产品类别管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/classifications/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">产品类别</li>
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
        @foreach ($classifications as $key => $content)
        <tr>
          <td>{{ $key +1 }}</td>
          <td> {{ $content->name }} </td>
          <td> {{ $content->remark  }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop 