@extends('backend.layouts.master')

@section('title', '进销存')

@section('page-header')
    <h1>
        编辑调拨
        <small>编辑调拨明细</small>
        <a class="btn btn-warning btn-xs" href="/admin/logistics/flits"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑调拨 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/flits/'.$flit->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'number'    => $flit->number,
          'out'       => $flit->out,
          'in'        => $flit->in,
          'handler'   => $flit->handler,
          'use'       => $flit->use,
          'remark'    => $flit->remark,
    ], ];
    ?>
    <div class="well">
      <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

        <div class="form-group{!! ($errors->has('out')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2">调出仓库</label>
          <div class="col-md-8"> 
            <select name="out" class="select"> 
              @foreach ($storehouses as $content)
                @if ($content->id == $flit->out)
                <option value="{!! Request::old('out', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
                @else
                <option value="{!! Request::old('out', $content->id); !!}" disabled="true" type="text">{{ $content->name }}</option>
                @endif
              @endforeach
            </select> 
            {!! ($errors->has('out') ? $errors->first('out') : '') !!}
          </div> 
        </div>
        <div class="form-group{!! ($errors->has('in')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2">拨入仓库</label>
          <div class="col-md-8"> 
            <select name="in" class="select"> 
              @foreach ($storehouses as $content)
                @if ($content->id == $flit->in)
                <option value="{!! Request::old('in', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
                @else
                <option value="{!! Request::old('in', $content->id); !!}" disabled="true" type="text">{{ $content->name }}</option>
                @endif
              @endforeach
            </select> 
            {!! ($errors->has('in') ? $errors->first('in') : '') !!}
          </div> 
        </div>
        <div class="form-group{!! ($errors->has('handler')) ? ' has-error' : '' !!}"> 
          <label  class="control-label col-md-2">经手人</label>
          <div class="col-md-8"> 
            <select name="handler" class="select"> 
              @foreach ($personnels as $content)
                @if ($content->id == $flit->handler)
                <option value="{!! Request::old('handler', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
                @else
                <option value="{!! Request::old('handler', $content->id); !!}" disabled="true" type="text">{{ $content->name }}</option>
                @endif
              @endforeach
            </select> 
            {!! ($errors->has('handler') ? $errors->first('handler') : '') !!}
          </div> 
        </div>
        <div class="form-group{!! ($errors->has('use')) ? ' has-error' : '' !!}">
          <label  class="control-label col-md-2">目的</label>
          <div class="col-md-8">
            <input name="use" value="{!! Request::old('use', $form['defaults']['use']) !!}" class="form-control" placeholder="目的" type="text">
            {!! ($errors->has('use') ? $errors->first('use') : '') !!}
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
            <th class="flit-header hidden-xs col-md-1">序号</th>
              <th > 名称 </th>
              <th > 数量 </th>
              <th > 备注 </th>
                </thead>
            <tbody>
            @foreach ($flitrecords as $key=>$flitrecord )
              <tr>
                <td class="flit hidden-xs">{{ $key+1 }}</td>
                <td>  
                  <select name="productname{{ $key }}" class="select"> 
                    @foreach ($products as $content)
                      @if ($content->number == $flitrecord->product_number)
                      <option value="{!! Request::old('productname{{ $key }}', $content->number); !!}" selected="selected" type="text">{{ $content->name }}</option>
                      @else
                      <option value="{!! Request::old('productname{{ $key }}', $content->number); !!}" disabled="true"  type="text">{{ $content->name }}</option>
                      @endif
                    @endforeach
                  </select> 
                </td>
                <td> 
                  <input name="quantity{{ $key }}" value="{!! Request::old('quantity'.$key, $flitrecord->quantity ) !!}" class="form-control" placeholder="数量" type="text">
                  <input type="hidden" name="unit{{ $key }}" value="{{ $content->unit }}">
                </td>
                <td>
                 <input name="remark{{ $key }}" value="{!! Request::old('remark'.$key), $flitrecord->remark!!}" class="form-control" placeholder="备注" type="text">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="well">
          <div class="pull-left">
              <a href="/admin/logistics/flits" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
          </div>
          <div class="pull-right">
              <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
          </div>
          <div class="clearfix"></div>
      </form>
    </div><!--well-->
  </div>
</div>
@stop