 @extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        客户列表
        <small>客户供应商列表</small>
        <a class="btn btn-success btn-xs no-print" href="{{ URL('admin/client/clients/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 客户列表 </li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class="table table-striped table-bordered table-hover">
      <thead>
      <tr>
        <th class="check-header hidden-xs">序号</th>
        <th> 名称 </th>
        <th class="hidden-xs"> 电话 </th>
        <th class="hidden-xs"> 邮箱 </th>
        <th class="hidden-xs"> 类型 </th>
        <th class="no-print">　操作 </th>
      </tr>
      </thead>
      <tbody>
      @foreach ($clients as $content)
      <tr>
        <td class="check hidden-xs">{{ $content->id }}</td>
        <td> {{ $content->company }} </td>
        <td class="hidden-xs"> {{ $content->telephone }} </td>
        <td class="hidden-xs"> {!! link_to("mailto:".$content->email, $content->email) !!} </td>
        <td class="hidden-xs"> {{ $content->type->name or '无' }} </td>
        <td class="no-print">{!! $content->actionbuttons !!}</td>  
      </tr>
      @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $clients->total() !!}
        {!! Session::flash('currentPage', $clients->currentPage()); !!}
    </div>

    <div class="pull-right no-print">
        {!! $clients->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 