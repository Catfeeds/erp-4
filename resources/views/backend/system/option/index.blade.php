@extends('backend.layouts.master')

@section('after-styles-end')
  @include('backend.includes.css.tree')
@stop

@section('title', '系统选项')


@section('page-header')
    <h1>
        系统选项
        <small>系统选项</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.system')
    <li class="active"> 系统选项 </li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <div class="tree">
      <ul>
        <li>
          <li>
            <li>
              <span><i class="glyphicon glyphicon-minus"></i> {{ $tree['name'] }}</span>
              <a id="first" class="btn btn-success btn-xs" href="#">展开/关闭</a>
              <ul>
                @if(!empty($tree['son']))
                @foreach($tree['son'] as $value)
                  @if(!empty($value['son']))
                    <li>
                      <span><i class="glyphicon glyphicon-minus"></i> 
                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                      <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                        <ul>
                        @foreach($value['son'] as $value)
                          @if(!empty($value['son']))
                            <li>
                              <span><i class="glyphicon glyphicon-minus"></i> 
                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                              <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                <ul>
                                @foreach($value['son'] as $value)
                                  @if(!empty($value['son']))
                                    <li>
                                      <span><i class="glyphicon glyphicon-minus"></i> 
                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                      <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                        <ul>
                                        @foreach($value['son'] as $value)
                                          @if(!empty($value['son']))
                                            <li>
                                              <span><i class="glyphicon glyphicon-minus"></i> 
                                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                              <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                <ul>
                                                @foreach($value['son'] as $value)
                                                  @if(!empty($value['son']))
                                                    <li>
                                                      <span><i class="glyphicon glyphicon-minus"></i> 
                                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                      <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                        <ul>
                                                        @foreach($value['son'] as $value)
                                                          @if(!empty($value['son']))
                                                            <li>
                                                              <span><i class="glyphicon glyphicon-minus"></i> 
                                                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                              <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                                <ul>
                                                                @foreach($value['son'] as $value)
                                                                  @if(!empty($value['son']))
                                                                    <li>
                                                                      <span><i class="glyphicon glyphicon-minus"></i> 
                                                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                                      <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
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
                                                                      <span><i class="glyphicon glyphicon-leaf"></i> 
                                                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                                      @if(!empty($value['tag']))
                                                                        <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                                      @endif
                                                                    </li>
                                                                  @endif
                                                                @endforeach
                                                                </ul>
                                                            </li>
                                                          @else                      
                                                            <li>
                                                              <span><i class="glyphicon glyphicon-leaf"></i> 
                                                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                              @if(!empty($value['tag']))
                                                                <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                              @endif
                                                            </li>
                                                          @endif
                                                        @endforeach
                                                        </ul>
                                                    </li>
                                                  @else                   
                                                    <li>
                                                      <span><i class="glyphicon glyphicon-leaf"></i> 
                                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                                      @if(!empty($value['tag']))
                                                        <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                                      @endif
                                                    </li>
                                                  @endif
                                                @endforeach
                                                </ul>
                                            </li>
                                          @else                   
                                            <li>
                                              <span><i class="glyphicon glyphicon-leaf"></i> 
                                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                              @if(!empty($value['tag']))
                                                <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                              @endif
                                            </li>
                                          @endif
                                        @endforeach
                                        </ul>
                                    </li>
                                  @else                   
                                    <li>
                                      <span><i class="glyphicon glyphicon-leaf"></i> 
                                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                                      @if(!empty($value['tag']))
                                        <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                                      @endif
                                    </li>
                                  @endif
                                @endforeach
                                </ul>
                            </li>
                          @else                
                            <li>
                              <span><i class="glyphicon glyphicon-leaf"></i> 
                              {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                              <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                              <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                              @if(!empty($value['tag']))
                                <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                              @endif
                            </li>
                          @endif
                        @endforeach
                        </ul>
                    </li>
                  @else                       
                    <li>
                      <span><i class="glyphicon glyphicon-leaf"></i> 
                      {{ $value['id'].'-'.$value['name'].'-'.$value['parent_tag'] }}</span>
                      <a id="{{ $value['id'] }}" class="detail btn btn-success btn-xs" href="#"> 详情</a>
                      <a id="{{ $value['id'] }}" class="edit btn btn-success btn-xs" href="#"> 编辑</a>
                      @if(!empty($value['tag']))
                        <a id="{{ $value['id'] }}" class="add btn btn-success btn-xs" href="#"> 新建子选项</a>
                      @endif
                    </li>
                  @endif
                @endforeach
                </ul>
                @endif
            </li>
          </li>
        </li>
      </ul>
    </div>
  </div>
</div>
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST" >
          {{ csrf_field() }} 
          <input type="hidden" name="_method" value="PATCH"/>
          <div id="id" class="form-group">
            <label class="col-md-2 control-label">ID</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>  
          <div id="parent_id" class="form-group" >
            <label class="col-md-2 control-label">父ID</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="parent_tag" class="form-group">
            <label class="col-md-2 control-label">父标志</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="tag" class="form-group">
            <label class="col-md-2 control-label">标志</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="name" class="form-group">
            <label class="col-md-2 control-label">名称</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="order" class="form-group">
            <label class="col-md-2 control-label">排序</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="remark" class="form-group">
            <label class="col-md-2 control-label">备注</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div class="well">
            <div class="pull-left">
              <a href="#" class="btn btn-danger btn-xs" data-dismiss="modal">{{ trans('strings.cancel_button') }}</a>
            </div>
            <div class="pull-right"> 
              <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
          </div><!--well-->
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="addModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">新建子选项</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST" >
          {{ csrf_field() }} 
          <div id="parent_id" class="form-group" >
            <label class="col-md-2 control-label">父ID</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="parent_tag" class="form-group">
            <label class="col-md-2 control-label">父标志</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="name" class="form-group has-warning">
            <label class="col-md-2 control-label">名称</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="order" class="form-group">
            <label class="col-md-2 control-label">排序</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div id="remark" class="form-group">
            <label class="col-md-2 control-label">备注</label>
            <div class="col-md-8">
              <p class="form-control"></p>
            </div>
          </div>
          <div class="well">
            <div class="pull-left">
              <a href="#" class="btn btn-danger btn-xs" data-dismiss="modal">{{ trans('strings.cancel_button') }}</a>
            </div>
            <div class="pull-right"> 
              <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
          </div><!--well-->
        </form>
      </div>
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
    $('#first').click(function(){
      var $parent = $(this).parent('li.parent_li').find(' > ul > li ');
      var children = $(this).parent('li.parent_li').find(' > ul > li > ul > li');
      $(this).attr('title', '展开/关闭次级目录');
      if (children.is(":visible")) {
          children.hide('fast');
          $parent.find(' >span > i').removeClass('glyphicon glyphicon-minus').addClass('glyphicon glyphicon-plus');
      } else {
          children.show('fast');
          $parent.find(' >span > i').removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-minus');
      }
      e.stopPropagation();
    })
    $('.detail').click(function(){
      var id = $(this).attr('id');
      $('#myModal .modal-title').html('详情');
      $('#myModal .well').html('<button type="button" class="btn btn-success btn-xs pull-right" data-dismiss="modal">关闭</button><div class="clearfix"></div>');
      $.get("/admin/system/getOption/"+id, function(data,status){
        $('#myModal #id').find('p').html(data.id);
        $('#myModal #parent_id').find('p').html(data.parent_id);
        $('#myModal #tag').find('p').html(data.tag);
        $('#myModal #parent_tag').find('p').html(data.parent_tag);
        $('#myModal #name').find('p').html(data.name);
        $('#myModal #order').find('p').html(data.order);
        $('#myModal #remark').find('p').html(data.remark);
      });
      $('#myModal').modal();
    });
    $('.edit').click(function(){
      var id = $(this).attr('id');
      $('form').attr('action','/admin/system/options/'+id);
      $('#myModal .modal-title').html('编辑');
      $('#myModal .well').html('<div class="pull-left"><a href="#" class="btn btn-danger btn-xs" data-dismiss="modal">取消</a></div><div class="pull-right"><input type="submit" class="btn btn-success btn-xs" value="保存" /></div><div class="clearfix"></div></div>');
      $.get("/admin/system/getOption/"+id, function(data,status){
        $('#myModal #id .col-md-8').html('<input name="id" value="'+data.id+'" class="form-control" type="text">');
        $('#myModal #parent_id .col-md-8').html('<input name="parent_id" value="'+data.parent_id+'" class="form-control" type="text">');
        $('#myModal #tag .col-md-8').html('<input name="tag" value="'+data.tag+'" class="form-control" type="text">');
        $('#myModal #parent_tag .col-md-8').html('<input name="parent_tag" value="'+data.parent_tag+'" class="form-control" type="text">');
        $('#myModal #name .col-md-8').html('<input name="name" value="'+data.name+'" class="form-control" type="text">');
        $('#myModal #order .col-md-8').html('<input name="order" value="'+data.order+'" class="form-control" type="text">');
        $('#myModal #remark .col-md-8').html('<input name="remark" value="'+data.remark+'" class="form-control" type="text">');
      });
      $('#myModal').modal();
    });    
    $('.add').click(function(){
      var id = $(this).attr('id');
      $.get("/admin/system/getOption/"+id, function(data,status){
        $('#addModal #parent_id .col-md-8').html('<input name="parent_id" value="'+data.id+'" class="form-control" type="text">');
        $('#addModal #parent_tag .col-md-8').html('<input name="parent_tag" value="'+data.tag+'" class="form-control" type="text">');
        $('#addModal #name .col-md-8').html('<input name="name" value="" class="form-control" type="text">');
        $('#addModal #order .col-md-8').html('<input name="order" value="" class="form-control" type="text">');
        $('#addModal #remark .col-md-8').html('<input name="remark" value="" class="form-control" type="text">');
      });
      $('#addModal').modal();
    });
  });
</script>
@stop
