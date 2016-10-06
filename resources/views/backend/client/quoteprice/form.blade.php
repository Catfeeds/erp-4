<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('client_id')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">供应商</label>
    <div class="col-md-8"> 
      <select name="client_id" class="select form-control"> 
        <option>选择供应商</option>
        @foreach ($suppliers as $content)
        @if($content->id == $form['defaults']['client_id'])
          <option value="{!! Request::old('client_id', $content->id); !!}" selected="selected" type="text">{{ $content->id.'---'.$content->name }}</option>
          @else
          <option value="{!! Request::old('client_id', $content->id); !!}" type="text">{{ $content->id.'---'.$content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('client_id') ? $errors->first('client_id') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('product_id')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">商品</label>
    <div class="col-md-8"> 
      <select name="product_id" class="select form-control"> 
        <option>选择商品</option>
        @foreach ($products as $content)
          @if($content->id == $form['defaults']['product_id'])
          <option value="{!! Request::old('product_id', $content->id); !!}" selected="selected" type="text">{{ $content->id.'---'.$content->name }}</option>
          @else
          <option value="{!! Request::old('product_id', $content->id); !!}" type="text">{{ $content->id.'---'.$content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('product_id') ? $errors->first('product_id') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('price')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">单价</label>
    <div class="col-md-8">
      <input name="price" class="form-control" value="{!! Request::old('price', $form['defaults']['price']) !!}" placeholder="单价" type="text">
      {!! ($errors->has('price') ? $errors->first('price') : '') !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2">有效期</label>
    <div class="col-md-8">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="indate" value="{{ $form['defaults']['indate'] }}" class="form-control pull-right" id="indate">
    </div>
    </div>
  </div>
  <div class="form-group{!! ($errors->has('cycle')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">货期</label>
    <div class="col-md-8">
      <input name="cycle" class="form-control" value="{!! Request::old('cycle', $form['defaults']['cycle']) !!}" placeholder="货期" type="text">
      {!! ($errors->has('cycle') ? $errors->first('cycle') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('attachment_id')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">附件</label>
    <div class="col-md-8">
      <input name="attachment_id" class="form-control" value="{!! Request::old('attachment_id', $form['defaults']['attachment_id']) !!}" placeholder="附件" type="text">
      {!! ($errors->has('attachment_id') ? $errors->first('attachment_id') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/client/quoteprices" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>