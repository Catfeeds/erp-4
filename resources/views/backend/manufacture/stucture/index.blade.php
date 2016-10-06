@extends('backend.layouts.master')

@section('after-styles-end')
  @include('backend.includes.css.tree')
@stop

@section('title', '生产管理')

@section('page-header')
    <h1>
        产品结构树
        <small>电磁阀结构树</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">结构树</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
  <a class="btn btn-success" href="/admin/manufacture/stucture/1">电磁阀55L</a>
  <a class="btn btn-success" href="/admin/manufacture/stucture/41">电磁阀90L</a>
    <div class="tree well">
      <ul>
        <li>
          <li>
            <span ><i class="glyphicon glyphicon-minus"></i> {{ $product->name }} </span> <a class="btn btn-success btn-xs" href="#"> <p class="product_id" hidden="">{{ $product->id }}</p><p class="product_name" hidden="">{{ $product->name }}</p>新建子结构</a>
            <ul>
            @foreach($tree as $value)
              @if(!empty($value['son']))
                <li>
                  <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] ==37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                  <ul>
                    @foreach($value['son'] as $value)
                      @if(!empty($value['son']))
                        <li>
                          <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                            <ul>
                            @foreach($value['son'] as $value)
                              @if(!empty($value['son']))
                                <li>
                                  <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                    <ul>
                                    @foreach($value['son'] as $value)
                                      @if(!empty($value['son']))
                                        <li>
                                          <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                            <ul>
                                            @foreach($value['son'] as $value)
                                              @if(!empty($value['son']))
                                                <li>
                                                  <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                    <ul>
                                                    @foreach($value['son'] as $value)
                                                      @if(!empty($value['son']))
                                                        <li>
                                                          <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                            <ul>
                                                            @foreach($value['son'] as $value)
                                                              @if(!empty($value['son']))
                                                                <li>
                                                                  <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                                    <ul>
                                                                    @foreach($value['son'] as $value)
                                                                      @if(!empty($value['son']))
                                                                        <li>
                                                                          <span><i class="glyphicon glyphicon-minus"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                                          <ul>
                                                                            @foreach($value['son'] as $value)
                                                                            <li>
                                                                              <span><i class="glyphicon glyphicon-leaf"></i>遍历级别不足,请通知管理员</span> <a href="">发送邮件</a>
                                                                            </li>
                                                                            @endforeach
                                                                          </ul>
                                                                        </li>
                                                                      @else
                                                                        <li>
                                                                          <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                                        </li>
                                                                      @endif
                                                                    @endforeach
                                                                  </ul>
                                                                </li>
                                                              @else
                                                                <li>
                                                                  <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                                </li>
                                                              @endif
                                                            @endforeach
                                                          </ul>
                                                        </li>
                                                      @else
                                                        <li>
                                                          <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                        </li>
                                                      @endif
                                                    @endforeach
                                                  </ul>
                                                </li>
                                              @else
                                                <li>
                                                  <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                                </li>
                                              @endif
                                            @endforeach
                                          </ul>
                                        </li>
                                      @else
                                        <li>
                                          <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </li>
                              @else
                                <li>
                                  <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                                </li>
                              @endif
                            @endforeach
                          </ul>
                        </li>
                      @else
                        <li>
                          <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                        </li>
                      @endif
                    @endforeach
                  </ul>
                </li>
              @else
                <li>
                  <span><i class="glyphicon glyphicon-leaf"></i> {{ $value->children->name }}---<span class="badge">需求：{{ $value["factor"] }}</span></span> @if( $value["type"]['id'] == 37 )<a class="btn btn-success btn-xs" ><p class="product_id" hidden="">{{ $value->children_id }}</p><p class="product_name" hidden="">{{ $value->children->name }}</p>新建子结构</a>@endif
                </li>
              @endif
            @endforeach
            </ul>
          </li>
        </li>
      </ul>
    </div>
  </div>
</div><div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">新建子结构</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/admin/manufacture/stuctures" method="POST" enctype="multipart/form-data" >
          {{ csrf_field() }}
          <div>
            <div class="form-group">
              <label name="name" class="control-label col-md-2">部件名</label>
              <div class="col-md-8">
              <input name="product_id" hidden="hidden"></input>
              <input name="product_name" value="" class="form-control" disabled="disabled" placeholder="" type="text">
              </div>
            </div>
            <div class="form-group has-warning">
              <label name="name" class="control-label col-md-2">子结构</label>
              <div class="col-md-8">
                <select class="form-control" name="children_id" class="select">
                  <option value="" type="text">请选择子结构</option>
                  @foreach($products as $value)
                  <option value="{{$value->id}}" type="text">{{ $value->id.'---'.$value->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group has-warning">
              <label name="factor" class="control-label col-md-2">数量</label>
              <div class="col-md-8">
                <input name="factor" value="" class="form-control" placeholder="数量" type="text">
              </div>
            </div>
          </div>
        </div>
      <div class="well">
        <div class="pull-left">
          <a href="#" class="btn btn-danger" data-dismiss="modal">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right"> 
          <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>
      </div><!--well-->
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
    $('.well li>a').click(function(){
      var product_id = $(this).find('.product_id').html();
      var product_name = $(this).find('.product_name').html();
      $('input[name="product_id"]').attr('value',product_id);
      $('input[name="product_name"]').attr('placeholder',product_name);

      $('#myModal').modal();
    });
});
</script>
@stop

