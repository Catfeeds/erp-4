@extends('backend.layouts.master')

@section('title', '文档管理')

@section('page-header')
    <h1>
        文档列表
        <small>所有文档信息</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/files/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">文档列表</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 名称 </th>
        <th> 编号 </th>
        <th> 项目 </th>
        <th> 文件名 </th>
        <th> 版本号 </th>
        <th> 备注 </th>
        <th> 操作 </th>
      </thead>
      <tbody>
        @foreach ($files as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->name }} </td>
          <td> {{ $content->number }} </td>
          <td> {{ $content->project }} </td>
          <td> {{ $content->url}} </td>
          <td> {{ $content->version }} </td>
          <td> {{ $content->remark }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $files->total() !!}
        {!! Session::flash('currentPage', $files->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $files->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 