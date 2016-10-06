@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        还款计划
        <small>还款计划列表</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/finance/plans/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.finance')
    <li class="active">还款计划</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th> 客户 </th>
          <th> 标题 </th>
          <th> 还款日期 </th>
          <th> 类别 </th>
          <th> 金额 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>      
        @foreach ($plans as $content)
        <tr>
          <td> {{ $content->id }} </td>
          <td> {{ $content->belongsToClient['short'] }} </td>
          <td> {{ $content->title }} </td>
          <td> {{ $content->date }} </td>
          <td> {{ $content->type }} </td>
          <td> {{ $content->money }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>    
    </table>
    <div class="pull-left">
        总数: {!! $plans->total() !!}
        {!! Session::flash('currentPage', $plans->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $plans->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 