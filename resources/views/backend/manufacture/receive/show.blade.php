@extends('backend.layouts.master')

@section('title', '进销存')

@section('page-header')
    <h1>
        委外入库
        <small>委外入库详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/manufacture/receives"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">委外入库</li>
@endsection

@section('content')
  <?php
  $form = [
        '编号'      => $receive->number,
        '部品名称'  => $receive->belongsToProduct['name'],
        '来源'      => $receive->source,
        '总数'      => $receive->total,
        '成品数量'  => $receive->accept,
        '不良数量'  => $receive->defective,
        '备注'      => $receive->remark,
        ];
  ?>
  <div class="box box-info">
  <div class="box-body">
    <form class="form-horizontal" role="form">  
      @foreach($form as $key=>$value)
      <div class="form-group">
        <label class="col-sm-2 control-label">{{$key}}</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{$value}}</p>
        </div>
      </div>
      @endforeach
    </form>
    <p style="color:orange">不良品明细</p>
    <table class="table table-striped table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs col-md-1">序号</th>
        <th > 名称 </th>
        <th > 不良 </th>
        <th > 备注 </th>
          </thead>
      <tbody>
        @forelse ($defectives as $key=>$content)
        <tr>
          <td> {{ $key+1 }} </td>
          <td> {{ $content->hasOneDefect->name }} </td>
          <td> {{ $content->quantity }} </td>
          <td> {{ $content->remark }} </td>
        </tr>
        @empty
          <td colspan='4'> 无记录 </td>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@stop