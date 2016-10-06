@extends('backend.layouts.master')

@section('title', '部品管理')

@section('page-header')
    <h1>
        部品管理
        <small>新建部品信息</small>
        <a class="btn btn-success btn-xs no-print" href="{{ URL('admin/logistics/products/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">部品管理</li>
@endsection

@section('content')
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#A" data-toggle="tab">全部</a></li>
   <li><a href="#B" data-toggle="tab">零件</a></li>
   <li><a href="#C" data-toggle="tab">组件</a></li>
   <li><a href="#D" data-toggle="tab">成品</a></li>
</ul>
<div class="box box-success">
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="A">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 编号 </th>
            <th> 名称 </th>
            <th> 库存 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 图片 </th>
            <th class="no-print">　操作 </th>
          </thead>
          <tbody>
            @foreach ($all as $key=>$content)
              <tr>
                <td class="check hidden-xs">{{ $key+1 }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td> {{ $content->total }} </td>
                <td> {{ $content->unit->name }} </td>
                <td> 
                  <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><p hidden>{{ $content->hasOnePicture['big'] }}</p><img src="{{ $content->hasOnePicture['small'] }}" alt="product image" /></a> 
                </td>
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in" id="B">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 编号 </th>
            <th> 名称 </th>
            <th> 库存 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 图片 </th>
            <th class="no-print">　操作 </th>
          </thead>
          <tbody>
            @foreach ($parts as $key=>$content)
              <tr>
                <td class="check hidden-xs">{{ $key+1 }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td> {{ $content->total }} </td>
                <td> {{ $content->unit->name }} </td>
                <td> 
                  <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><p hidden>{{ $content->hasOnePicture['big'] }}</p><img src="{{ $content->hasOnePicture['small'] }}" alt="product image" /></a> 
                </td>
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in" id="C">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 编号 </th>
            <th> 名称 </th>
            <th> 库存 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 图片 </th>
            <th class="no-print">　操作 </th>
          </thead>
          <tbody>
            @foreach ($subassemblys as $key=>$content)
              <tr>
                <td class="check hidden-xs">{{ $key+1 }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td> {{ $content->total }} </td>
                <td> {{ $content->unit->name }} </td>
                <td> 
                  <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><p hidden>{{ $content->hasOnePicture['big'] }}</p><img src="{{ $content->hasOnePicture['small'] }}" alt="product image" /></a> 
                </td>
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in" id="D">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 编号 </th>
            <th> 名称 </th>
            <th> 库存 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 图片 </th>
            <th class="no-print">　操作 </th>
          </thead>
          <tbody>
            @foreach ($products as $key=>$content)
              <tr>
                <td class="check hidden-xs">{{ $key+1 }}</td>
                <td> {{ $content->number }} </td>
                <td> {{ $content->name }} </td>
                <td> {{ $content->total }} </td>
                <td> {{ $content->unit->name }} </td>
                <td> 
                  <a data-toggle="modal" data-target="#myModal{{ $key }}" href="#"><p hidden>{{ $content->hasOnePicture['big'] }}</p><img src="{{ $content->hasOnePicture['small'] }}" alt="product image" /></a> 
                </td>
                <td class="no-print">{!! $content->actionbuttons !!}</td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="thumbnail btn btn-info">
      <img class="img-rounded" alt="Product Image" /></img>
    </div>
  </div>
</div>
@stop 
@section('after-scripts-end')
<script type="text/javascript">
  $(function(){
    $('img').click(function(){
      $('#myModal').find('img').attr("src",$(this).siblings("p").html());
      $('#myModal').modal();
    });
  });
</script>
@stop

