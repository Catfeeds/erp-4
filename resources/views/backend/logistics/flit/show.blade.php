@extends('backend.layouts.master')

@section('title', '进销存')

@section('page-header')
    <h1>
        采购入库
        <small>采购入库详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/flits"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">采购入库</li>
@endsection

@section('content')
  <?php
  $form = [
        '编号'      => $flit->number,
        '调出仓库'  => $flit->Storehouseout->name,
        '拨入仓库'  => $flit->Storehousein->name,
        '经手人'    => $flit->belongsToHandler->name,
        '目的'      => $flit->use,
        '备注'      => $flit->remark,
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
    <p style="color:orange">调拨明细</p>
    <table class="table table-striped table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs col-md-1">序号</th>
        <th > 部品编号 </th>
        <th > 名称 </th>
        <th > 数量 </th>
        <th > 单位 </th>
        <th > 备注 </th>
          </thead>
      <tbody>
        @forelse ($flitrecords as $key=>$content)
        <tr>
          <td> {{ $key+1 }} </td>
          <td> {{ $content->product_number }} </td>
          <td> {{ $content->Product->name }} </td>
          <td> {{ $content->quantity }} </td>
          <td> {{ $content->unit }} </td>
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