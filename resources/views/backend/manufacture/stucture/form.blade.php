<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('parent_id')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">父件名称</label>
    <div class="col-md-8"> 
      <select name="parent_id" class="select"> 
        @foreach ($modules as $content)
          <option value="{!! Request::old('parent_id', $content->id); !!}" type="text">{{ $content->name }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('parent_id') ? $errors->first('parent_id') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('product_id')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">部品名称</label>
    <div class="col-md-8"> 
      <select name="product_id" class="select"> 
        @foreach ($products as $content)
          <option value="{!! Request::old('product_id', $content->id); !!}" type="text">{{ $content->name }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('product_id') ? $errors->first('product_id') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('factor')) ? ' has-error' : '' !!}">
    <label name="factor" class="control-label col-md-2">数量</label>
    <div class="col-md-8">
      <input name="factor" value="{!! Request::old('factor', $form['defaults']['factor']) !!}" class="form-control" placeholder="数量" type="text">
      {!! ($errors->has('factor') ? $errors->first('factor') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('process')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">工序名称</label>
    <div class="col-md-8"> 
      <select name="process" class="select"> 
        @foreach ($processes as $content)
          <option value="{!! Request::old('process', $content->id); !!}" type="text">{{ $content->name }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('process') ? $errors->first('process') : '') !!}
    </div> 
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/manufacture/stuctures" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>