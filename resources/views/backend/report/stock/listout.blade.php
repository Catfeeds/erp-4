@extends('backend.layouts.master')

@section('title', '报表中心')

@section('page-header')
    <h1>
        库存列表
        <small>>>>>库存</small>
        <span style="color: blue">{{ $type }}</span>
        <small>列表</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.report')
    <li class="active">出库列表</li>
@endsection

@section('content')
<!-- @include('backend.luster.report.includes.list.partials.header-buttons') -->
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 编号 </th>
        <th> 供应商 </th>
        <th> 经手人 </th>
        <th> 存入仓库 </th>
        <th class="hidden-xs"> 备注 </th>
      </thead>
      <tbody>
        @foreach ($exports as $key=>$content)
          <tr>
            <td class="check hidden-xs">{{ $key+1 }}</td>
            <td> {{ $content->number }} </td>            
            <td> {{ $content->belongsToCompany->short }} </td>
            <td> {{ $content->belongsToHandler->name   }} </td>
            <td> {{ $content->stockhouse }} </td>
            <td class="hidden-xs "> {{ $content->remark }}  </td>
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