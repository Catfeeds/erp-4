@extends('backend.layouts.master')

@section('title', '设备列表')

@section('page-header')
    <h1>
        设备列表
        <small>设备信息列表</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/equipment/equipments/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.equipment')
    <li class="active">设备列表</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th> 名称 </th>
          <th> 部门 </th>
          <th class="hidden-xs"> 数量 </th>
          <th class="hidden-xs"> 单位 </th>
          <th> 存放位置 </th>
          <th class="hidden-xs"> 类型 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipments as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->name }} </td>
          <td class="hidden-xs " > {{ $content->department }} </td>
          <td class="hidden-xs"> {{ $content->num }} </td>
          <td class="hidden-xs">{{ $content->unit }}</td>
          <td> {{ $content->address }} </td>
          <td> {{ $content->AssetsType->name }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>  
    </table>
    <div class="pull-left">
        总数: {!! $equipments->total() !!}
        {!! Session::flash('currentPage', $equipments->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $equipments->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 