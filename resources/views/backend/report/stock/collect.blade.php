@extends('backend.layouts.master')

@section('title', '报表中心')

@section('page-header')
    <h1>
        库存汇总
        <small>>>>>仓库</small>
        <span style="color: blue">{{ $type }}</span>
        <small>汇总列表</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.report')
    <li class="active">库存汇总</li>
@endsection

@section('content')
<!-- @include('backend.luster.report.includes.collect.partials.header-buttons') -->
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 编号 </th>
        <th> 名称 </th>
        <th> 库存 </th>
        <th> 单位 </th>
        <th class="hidden-xs"> 图片 </th>
      </thead>
      <tbody>
        @foreach ($products as $key=>$content)
          @if ($content->total - $content->min < 0)
            <tr style="color: red">
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $content->number }} </td>
              <td> {{ $content->name }} </td>
              <td> {{ $content->total }} </td>
              <td> {{ $content->unit }} </td>
              <td style="color: red" class="hidden-xs "> 
                <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><img src="{{ $content->hasOnePicture['small'] }}" alt="Product Image" /></a> 
                <div class="modal fade" id="myModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="thumbnail btn btn-info">
                      <img class="img-rounded"src="{{ $content->hasOnePicture['big'] }}" alt="Product Image" /></img>
                    </div>
                  </div>
                </div><!-- /.modal -->
              </td>
            </tr>
          @elseif ($content->max - $content->total < 0)
            <tr style="color: orange">
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $content->number }} </td>
              <td> {{ $content->name }} </td>
              <td> {{ $content->total }} </td>
              <td> {{ $content->unit }} </td>
              <td style="color: red" class="hidden-xs "> 
                <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><img src="{{ $content->hasOnePicture['small'] }}" alt="Product Image" /></a> 
                <div class="modal fade" id="myModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="thumbnail btn btn-info">
                      <img class="img-rounded"src="{{ $content->hasOnePicture['big'] }}" alt="Product Image" /></img>
                    </div>
                  </div>
                </div><!-- /.modal -->
              </td>
            </tr>
          @else (!($content->total - $content->min < 0) && !($content->max - $content->total < 0))
            <tr style="color: green">
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $content->number }} </td>
              <td> {{ $content->name }} </td>
              <td> {{ $content->total }} </td>
              <td> {{ $content->unit }} </td>
              <td  class="hidden-xs "> 
                <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><img src="{{ $content->hasOnePicture['small'] }}" alt="Product Image" /></a> 
                <div class="modal fade" id="myModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="thumbnail btn btn-info">
                      <img class="img-rounded"src="{{ $content->hasOnePicture['big'] }}" alt="Product Image" /></img>
                    </div>
                  </div>
                </div><!-- /.modal -->
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $products->total() !!}
        {!! Session::flash('currentPage', $products->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $products->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 