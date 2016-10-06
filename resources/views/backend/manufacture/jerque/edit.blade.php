@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑检查记录
        <small>编辑检查记录</small>
        <a class="btn btn-warning btn-xs" href="/admin/manufacture/jerques"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑检查记录 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/jerques/'.$jerque->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'number'    => $jerque->number,
          'product'   => $jerque->product,
          'total'     => $jerque->total,
          'accept'    => $jerque->accept,
          'defective' => $jerque->defective,
          'remark'    => $jerque->remark,
    ], ];
    ?>
<div class="well">
<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
    <input type="hidden" name="station" value="加工入库">

  <div class="form-group{!! ($errors->has('porduct')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">部品名称</label>
    <div class="col-md-8"> 
      <select name="product" disabled="disabled" class="select"> 
        @foreach ($products as $content)
          @if ($content->id == $jerque->product)
            <option value="{!! Request::old('porduct', $content->id); !!}" selected = "selected" type="text">{{ $content->name }}</option>
          @else
            <option value="{!! Request::old('porduct', $content->id); !!}" disabled="disabled" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('porduct') ? $errors->first('porduct') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('accept')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">成品总数</label>
    <div class="col-md-8">
      <input name="accept" value="{!! Request::old('accept', $form['defaults']['accept']) !!}" class="form-control" placeholder="成品数量" type="text">
      {!! ($errors->has('accept') ? $errors->first('accept') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  </div>
  <div class="well">
    <table class="table table-striped table-bordered table-hover" >
      <thead>
      <th class="jerque-header hidden-xs col-md-1">序号</th>
        <th > 名称 </th>
        <th > 数量 </th>
        <th > 备注 </th>
          </thead>
      <tbody>
        @foreach ($defectives as $key=>$defective)
        <tr>
          <td class="jerque hidden-xs">
            {{ $key+1 }}
          </td>
          <td>  
            <select name="defect" disabled="disabled" class="select"> 
              @foreach ($defects as $content)
                @if ($content->id == $defective->name)
                  <option value="{!! Request::old('defect', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
                @else
                  <option value="{!! Request::old('defect', $content->id); !!}" type="text">{{ $content->name }}</option>
                @endif
              @endforeach
            </select> 
          </td>
          <td> 
           <input name="quantity{{$key}}" value="{!! Request::old('quantity',$defective['quantity']) !!}" class="form-control" placeholder="数量" type="text">
          </td>
          <td>
           <input name="remark{{$key}}" value="{!! Request::old('remark',$defective['remark']) !!}" class="form-control" placeholder="备注" type="text">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/manufacture/jerques" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>
  </div>
</div>
@stop