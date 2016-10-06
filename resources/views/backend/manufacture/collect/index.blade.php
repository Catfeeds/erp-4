@extends('backend.layouts.master')
 
@section('title', '生产计划')

@section('page-header')
    <h1>
        加工领料
        <small>加工领料信息</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/manufacture/collects/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">加工领料</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <th class="check-header hidden-xs">No</th>
        <th> 单号 </th>
        <th> 产品名称 </th>
        <th> 领料总数 </th>
        <th> 经手人 </th>
        <th> 日期 </th>
        <th> 备注 </th>
        <th> 操作 </th>
      </thead>
      <tbody>
        @foreach ($collects as $key=>$content)
        <tr>
          <td class="check hidden-xs">{{ $key+1 }}</td>
          <td> {{ $content->number }}</td>
          <td> {{ $content->worksheet->plan->product->name }}</td>
          <td> {{ $content->total }}</td>
          <td> {{ $content->handler->name }} </td>
          <td> {{ $content->date }} </td>
          <td> {{ $content->remark }} </td>
          <td> {!! $content->collectbuttons !!} </td>        
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $collects->total() !!}
        {!! Session::flash('currentPage', $collects->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $collects->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 