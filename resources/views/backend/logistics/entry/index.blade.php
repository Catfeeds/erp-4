@extends('backend.layouts.master')
 
@section('title', ' 进销存管理')

@section('page-header')
    <h1>
        采购入库
        <small>采购入库信息</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/entrys/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">采购入库</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <th class="check-header hidden-xs">No</th>
        <th> 编号 </th>
        <th> 入库总数 </th>
        <th> 经手人 </th>
        <th> 供应商 </th>
        <th> 日期 </th>
        <th> 备注 </th>
        <th> 操作 </th>
      </thead>
      <tbody>
        @foreach ($entrys as $key=>$content)
        <tr>
          <td class="check hidden-xs">{{ $key+1 }}</td>
          <td> {{ $content->number }}</td>
          <td> {{ $content->total }}</td>
          <td> {{ $content->handler->name }} </td>
          <td> {{ $content->supplier->short }} </td>
          <td> {{ $content->date }} </td>
          <td class="hidden-xs"> {{ $content->remark }} </td>
          <td> {!! $content->importbuttons !!} </td>        
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $entrys->total() !!}
        {!! Session::flash('currentPage', $entrys->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $entrys->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 