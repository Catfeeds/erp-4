<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">编号</label>
    <div class="col-md-8">
      <input name="number" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" placeholder="计划编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-md-2">申请日期</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="start_date" value="{{ $form['defaults']['start_date'] }}" class="form-control pull-right" id="begin_at">
    </div>
    </div>
  </div>
  <div class="form-group has-warning">
    <label class="control-label col-md-2">期限</label>
    <div class="col-md-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" name="end_date" value="{{ $form['defaults']['end_date'] }}" class="form-control pull-left" id="end_at">
      </div>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2"> 
      @if(!isset($form['_method']))   
      <button id="btn_add" type="button" class="btn btn-warning">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加
      </button>
      @endif
    </label>
    <div class="col-md-8">
      <table id="tb_A"></table>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  <div class="well ">
    <div class="pull-left">
        <a href="/admin/logistics/applications" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>