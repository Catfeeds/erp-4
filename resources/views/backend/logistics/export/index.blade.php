@extends('backend.layouts.master')
 
@section('title', '进 销 存')

@section('page-header')
    <h1>
        其它出库
        <small>其它出库信息</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/logistics/exports/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">其它出库</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <th class="check-header hidden-xs">No</th>
        <th> 编号 </th>
        <th> 出库总数 </th>
        <th> 经手人 </th>
        <th> 供应商 </th>
        <th> 日期 </th>
        <th> 备注 </th>
        <th> 操作 </th>
      </thead>
      <tbody>
        @foreach ($exports as $key=>$content)
        <tr>
          <td class="check hidden-xs">{{ $key+1 }}</td>
          <td> {{ $content->number }}</td>
          <td> {{ $content->total }}</td>
          <td> {{ $content->handler->name }} </td>
          <td> {{ $content->supplier->short }} </td>
          <td> {{ $content->date }} </td>
          <td class="hidden-xs"> {{ $content->remark }} </td>
          <td> {!! $content->exportbuttons !!} </td>        
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $exports->total() !!}
        {!! Session::flash('currentPage', $exports->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $exports->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 