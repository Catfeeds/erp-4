<form class="form-horizontal"  action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">采购订单号</label>
    <div class="col-md-8">
      <input name="number" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" placeholder="计划编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('title')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">标题</label>
    <div class="col-md-8">
      <input name="title" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('title', $form['defaults']['title']) !!}" class="form-control" placeholder="标题" type="text">
      {!! ($errors->has('title') ? $errors->first('title') : '') !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2">计划到货日期:</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="arrival_date" value="{{ $form['defaults']['date'] }}" class="form-control pull-right" id="date">
      </div>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('supplier_id')) ? ' has-error' : ' has-warning' !!}"> 
    <label  class="control-label col-md-2">客户/供应商</label>
    <div class="col-md-8"> 
      <select name="supplier_id" class="select form-control"> 
          <option value="" type="text">选择生产商</option>
        @foreach ($supplys as $content)
          @if($content->id == $form['defaults']['supplier_id'])
          <option value="{!! Request::old('supplier_id', $content->id); !!}" selected="selected" type="text">{{ $content->id.'---'.$content->name }}</option>
          @else
          <option value="{!! Request::old('supplier_id', $content->id); !!}" type="text">{{ $content->id.'---'.$content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('supplier_id') ? $errors->first('supplier_id') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>  
  <div>
    <div id="toolbar" class="btn-group">
      <button id="add_app" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>采购申请单
      </button>
      <button id="add_plan" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>计划采购单
      </button>
      <button id="add_btn" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
      </button>
      <button id="btn_delete" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
      </button>
    </div>
    <table id="tb_A"></table>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/logistics/purchases" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input id="submit" type="submit" class="btn btn-success btn-xs"  value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>