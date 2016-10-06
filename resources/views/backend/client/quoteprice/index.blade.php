@extends('backend/layouts.master')

@section('title', '供应商报价')

@section('page-header')
    <h1>
        供应商报价
        <small>供应商报价列表</small>
        <a class="btn btn-success btn-xs " href="{{ URL('admin/client/quoteprices/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">供应商报价</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th> 供应商 </th>
          <th> 商品 </th>
          <th class="hidden-xs"> 单价 </th>
          <th>有效期 </th>
          <th>货期 </th>
          <th>附件 </th>
          <th>操作 </th>
        </tr>
      </thead>
      <tbody>      
        @foreach ($quoteprices as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td> {{ $content->supplier->name }} </td>
          <td> {{ $content->product->name }} </td>
          <td> {{ round($content->price,2) }} </td>
          <td> {{ $content->indate }} </td>
          <td> {{ $content->cycle.'周' }} </td>
          <td> {{ $content->attachment_id }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $quoteprices->total() !!}
        {!! Session::flash('currentPage', $quoteprices->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $quoteprices->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 