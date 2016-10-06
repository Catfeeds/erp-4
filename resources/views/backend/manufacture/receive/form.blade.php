<div class="well">
<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">检查单号</label>
    <div class="col-md-8">
      <input name="number" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" placeholder="计划编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('worksheet')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">委外加工单号</label>
    <div class="col-md-8"> 
      <select name="worksheet_id" class="select form-control"> 
          <option value="" type="text">请选择委外加工单</option>
        @foreach ($worksheets as $content)
          <option value="{!! Request::old('worksheet', $content->id); !!}" type="text">{{ $content->number.'---'.$content->productName.'---计划'.$content->quantity.$content->productUnit.'---'.'剩余'.$content->remnant.$content->productUnit }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('worksheet') ? $errors->first('worksheet') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('total')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">验收数量</label>
    <div class="col-md-8">
      <input name="total" value="{!! Request::old('total', $form['defaults']['total']) !!}" class="form-control" placeholder="验收数量" type="text">
      {!! ($errors->has('total') ? $errors->first('total') : '') !!}
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
    <div class="pull-left">
        <a href="/admin/manufacture/receives" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>