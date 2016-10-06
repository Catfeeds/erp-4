<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">单号</label>
    <div class="col-md-8">
      <input name="number" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2">出库日期:</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="date" value="{{ $form['defaults']['date'] }}" class="form-control pull-right" id="date">
      </div>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('worksheet_id')) ? ' has-error' : ' has-warning' !!}"> 
    <label  class="control-label col-md-2">加工单</label>
    <div class="col-md-8"> 
      <select name="worksheet_id" onChange="getData(this)" class="select form-control"> 
          <option value="" type="text">选择加工单</option>
        @foreach ($worksheets as $content)
          @if($content->id == $form['defaults']['worksheet_id'])
          <option value="{!! Request::old('worksheet_id', $content->id); !!}" selected="selected" type="text">{{ $content->type.'-'.$content->number.'-'.$content->productName.'('.$content->quantity.$content->productUnit.')' }}</option>
          @else
          <option value="{!! Request::old('worksheet_id', $content->id); !!}" type="text">{{ $content->type.'-'.$content->number.'-'.$content->productName.'('.$content->quantity.$content->productUnit.')' }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('worksheet_id') ? $errors->first('worksheet_id') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">明细</label>
    <div class="col-md-8">
      <table id="table"></table>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/manufacture/collects" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>