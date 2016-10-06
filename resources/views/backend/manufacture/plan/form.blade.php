<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">计划编号</label>
    <div class="col-md-8">
      <input name="number" {{ empty($form['defaults']['product_id']) ? '':'disabled="disabled"' }} value="{!! Request::old('number', $form['defaults']['number']) !!}" class="form-control" placeholder="计划编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('product_id')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2 ">产品名称</label>
    <div class="col-md-8"> 
    @if(!empty($form['defaults']['product_id']))
      <input type="hidden" name="product_id" value="{{ $form['defaults']['product_id'] }}">
      <select class="form-control" disabled="disabled" name="product_id" class="select"> 
    @else
      <select class="form-control"  name="product_id" class="select"> 
          <option value="" type="text text-green">选择产品名称</option>
    @endif
        @foreach ($products as $content)
          @if($content->id == $form['defaults']['product_id'])
            <option value="{!! Request::old('product_id', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @endif
            <option value="{!! Request::old('product_id', $content->id); !!}" type="text">{{ $content->name }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('product_id') ? $errors->first('product_id') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('quantity')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2 ">数量</label>
    <div class="col-md-8">
      <input name="quantity" value="{!! Request::old('quantity', $form['defaults']['quantity']) !!}" class="form-control" placeholder="数量" type="text">
      {!! ($errors->has('quantity') ? $errors->first('quantity') : '') !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2">开始日期</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="start_date" value="{{ $form['defaults']['start_date'] }}" class="form-control pull-right" id="begin_at">
    </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2">结束日期</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="end_date" value="{{ $form['defaults']['end_date'] }}" class="form-control pull-left" id="end_at">
    </div>
    </div>
    </div>
  <div class="well ">
    <div class="pull-left">
        <a href="/admin/luster/manufacture/plans" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>