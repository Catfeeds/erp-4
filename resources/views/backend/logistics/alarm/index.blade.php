@extends('backend.layouts.master')

@section('title', '进销存')

@section('page-header')
    <h1>
        库存报警
        <small>>>>>库存</small>
        <span style="color: blue">{{ $type }}</span>
        <small>报警列表</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">库存报警</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
      <th class="check-header hidden-xs">序号</th>
        <th> 编号 </th>
        <th> 名称 </th>
        <th> 库存 </th>
        <th> 库存下限 </th>
        <th> 库存上限 </th>
        <th> 单位 </th>
        <th class="hidden-xs"> 图片 </th>
        <th class="no-print">　操作 </th>
      </thead>
      <tbody>
        @foreach ($products as $key=>$content)
          @if ($content->total - $content->min < 0 || $content->max - $content->total < 0 )
            @if ($content->total - $content->min < 0)
              <tr style="color: red">
                <td class="check hidden-xs">{{ $i++ }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td style="color: blue"> {{ $content->total }} </td>
                <td style="color: blue"> {{ $content->min }} </td>
                <td> {{ $content->max }} </td>
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
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
            @elseif ($content->max - $content->total < 0)
              <tr style="color: orange">
                <td class="check hidden-xs">{{ $i++ }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td style="color: blue"> {{ $content->total }} </td>
                <td> {{ $content->min }} </td>
                <td style="color: blue"> {{ $content->max }} </td>
                <td> {{ $content->unit }} </td>
                <td class="hidden-xs "> 
                  <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><img src="{{ $content->hasOnePicture['small'] }}" alt="Product Image" /></a> 
                  <div class="modal fade" id="myModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="thumbnail btn btn-info">
                        <img class="img-rounded"src="{{ $content->hasOnePicture['big'] }}" alt="Product Image" /></img>
                      </div>
                    </div>
                  </div><!-- /.modal -->
                </td>
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
            @endif
          @endif
        @endforeach
      </tbody>
    </table>
    <div class="pull-left">
        总数: {!! $i-1 !!}
        {!! Session::flash('currentPage', $products->currentPage()); !!}
    </div>

    <div class="pull-right">
        {!! $products->render() !!}
    </div>
    <div class="clearfix"></div>
  </div>
</div>
@stop 