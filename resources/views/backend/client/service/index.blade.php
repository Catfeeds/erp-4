@extends('backend.layouts.master')

@section('title', '客户服务')

@section('page-header')
    <h1>
        客户服务
        <small>新建客户服务</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/client/services/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">客户服务</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
        <th class="check-header hidden-xs">序号</th>
          <th> 客户 </th>
          <th> 内容 </th>
          <th class="hidden-xs"> 审核 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->client->name }} </td>
          <td class="hidden-xs col-md-8" > {{ $content->content }} </td>
          <td class="hidden-xs"> {{ $content->state }} </td>
          <td >{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $services->total() !!}
        {!! Session::flash('currentPage', $services->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $services->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 