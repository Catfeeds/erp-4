@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑委外入库
        <small>编辑委外入库</small>
        <a class="btn btn-warning btn-xs" href="/admin/manufacture/receives"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑委外入库 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/receives/'.$receive->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'number'    => $receive->number,
          'product'   => $receive->product,
          'total'     => $receive->total,
          'accept'    => $receive->accept,
          'defective' => $receive->defective,
          'remark'    => $receive->remark,
    ], ];
    ?>
<div class="well">
<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
    <input type="hidden" name="station" value="生产入库">
    <input type="hidden" name="defective" value="0">

  <div class="form-group{!! ($errors->has('porduct')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">部品名称</label>
    <div class="col-md-8"> 
      <select name="product" class="select"> 
        @foreach ($products as $content)
          @if ($content->id == $receive->product)
            <option value="{!! Request::old('porduct', $content->id); !!}" selected = "selected" type="text">{{ $content->name }}</option>
          @else
            <option value="{!! Request::old('porduct', $content->id); !!}" type="text">{{ $content->name }}</option>
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
      <th class="check-header hidden-xs col-md-1">序号</th>
        <th > 名称 </th>
        <th > 数量 </th>
        <th > 备注 </th>
          </thead>
      <tbody>
        @foreach ($defectives as $key=>$defective)
        <tr>
          <td class="check hidden-xs">
            {{ $key+1 }}
          </td>
          <td>  
            <select name="defect" class="select"> 
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
        <a href="/admin/manufacture/receives" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
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