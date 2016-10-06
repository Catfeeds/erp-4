<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">名称</label>
    <div class="col-md-8">
      <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="名称" type="text">
      {!! ($errors->has('name') ? $errors->first('name') : '') !!}
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
        <a href="/admin/luster/processes?page={!! Session::get('currentPage') !!}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>