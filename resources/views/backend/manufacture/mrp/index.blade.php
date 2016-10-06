@extends('backend.layouts.master')

@section('title', '生产管理')

@section('page-header')
    <h1>
        MRP运算
        <small class="no-print">物料需求计划</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">MRP运算</li>
@endsection

@section('content')
<div class="no-print">
    <!-- @include('backend.access.includes.partials.header-buttons') -->
    </div>
<div class="box box-success">
  <div class="box-body">
    <form class="form-horizontal" action="/admin/manufacture/mrps" method="POST">
      {{ csrf_field() }}
      <div class="well ">
        <fieldset><legend contenteditable="true">生产计划<small>-MRP</small></legend><br /> 
        <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2">生产计划</label>
          <div class="col-md-8"> 
            <select name="plan" class="select form-control"> 
                <option value="" type="text">选择生产计划</option>
              @foreach ($unfinishPlans as $content)
                <option value="{{ $content->id }}" type="text">{{ $content->number.'-'.$content->product->name.'('.$content->quantity.$content->product->unit->name.')' }}</option>
              @endforeach
            </select> 
            {!! ($errors->has('type') ? $errors->first('type') : '') !!}
          </div> 
        </div>
        <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2"></label>
          <div class="col-md-8"> 
          <input type="submit" class="btn btn-success" value="开始计算" />
          </div> 
        </div>
      </div><!--well-->
    </form>
    <form class="form-horizontal" action="/admin/manufacture/mrps" method="POST">
      {{ csrf_field() }}
      <div class="well ">
        <fieldset><legend contenteditable="true">组件名称<small>-MRP</small></legend><br />           
        <div class="form-group{!! ($errors->has('origin')) ? ' has-error' : '' !!}"> 
            <label  class="control-label col-md-2">组件名称</label>
            <div class="col-md-8"> 
              <select name="module" class="select form-control"> 
                  <option value="" type="text">选择组件名称</option>
                @foreach ($modules as $content)
                  <option value="{{ $content->id }}" type="text">{{ $content->name }}</option>
                @endforeach
              </select> 
              {!! ($errors->has('origin') ? $errors->first('origin') : '') !!}
            </div> 
        </div>
        <div class="form-group{!! ($errors->has('quantity')) ? ' has-error' : '' !!}">
          <label class="control-label col-md-2">组装数量</label>
          <div class="col-md-8">
            <input name="quantity" class="form-control" value="" placeholder="组装数量" type="text">
            {!! ($errors->has('quantity') ? $errors->first('quantity') : '') !!}
          </div>
        </div>
        <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2"></label>
          <div class="col-md-8"> 
          <input type="submit" class="btn btn-success" value="开始计算" />
          </div> 
        </div>
      </div><!--well-->
    </form>
  </div>
</div>
@stop 