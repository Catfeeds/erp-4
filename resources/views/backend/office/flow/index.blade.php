@extends('backend.layouts.master')

@section('title', '作业流程')

@section('page-header')
    <h1>
        作业流程
        <small>作业流程管理</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/flows/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">作业流程</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th class="hidden-xs"> ID </th>
          <th class="hidden-xs"> 名称 </th>
          <th class="hidden-xs"> 备注 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($flows as $key=>$content)
        <tr>
          <td class="check hidden-xs">{{ $key +1 }}</td>
          <td> {{ $content->flow_id }} </td>
          <td> {{ $content->flow_name }} </td>
          <td> {{ $content->remark }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>   
    </table>
    <div class="pull-left">
        总数: {!! $flows->total() !!}
        {!! Session::flash('currentPage', $flows->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $flows->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 