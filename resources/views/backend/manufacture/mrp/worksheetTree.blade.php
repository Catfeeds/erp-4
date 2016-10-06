@extends('backend.layouts.master')
@section('after-styles-end')
  @include('backend.includes.css.tree')
@stop
@section('title', '生产管理')

@section('page-header')
    <h1>
        MRP运算
        <small>>>>><span style="color: blue">{{ $product->name }}</span></small><span style="color: red"> </span><small>{{ $product->need.$product->unit->name }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">MRP运算</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <div class="tree">
      <ul>
        <li>
          <span class="btn brn-success"><i class="glyphicon glyphicon-minus"></i> {{ $product->name }}---<span class="badge">需求：{{ $product->need }}</span></span><i></i>
          <ul>
            @foreach($stucture as $content)
                <li>
                  <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}---<span class="badge">需求：{{ $content->need }}</span></span> <i class="badge {{ $content->needState < 0 ? 'bg-red':'bg-green'}}">库存：{{ $content->total }}</i>
                </li>
            @endforeach 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
@stop 

@section('after-scripts-end')
<script type="text/javascript">
  $(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', '关闭');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', '展开').find(' > i').removeClass('glyphicon glyphicon-minus').addClass('glyphicon glyphicon-plus');
        } else {
            children.show('fast');
            $(this).attr('title', '关闭').find(' > i').removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-minus');
        }
        e.stopPropagation();
    });
});
</script>
@stop

