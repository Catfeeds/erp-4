<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">快递单号</label>
    <div class="col-md-8">
      <input name="number" class="form-control" value="{!! Request::old('number', $form['defaults']['number']) !!}" placeholder="快递单号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('client')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">客户名称</label>
    <div class="col-md-8">
      <input name="client" class="form-control" value="{!! Request::old('client', $form['defaults']['number']) !!}" placeholder="客户名称" type="text">
      {!! ($errors->has('client') ? $errors->first('client') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('product')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">货品内容</label>
    <div class="col-md-8">
      <input name="product" class="form-control" value="{!! Request::old('product', $form['defaults']['product']) !!}" placeholder="货品内容" type="text">
      {!! ($errors->has('product') ? $errors->first('product') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('quantity')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">数量</label>
    <div class="col-md-8">
      <input name="quantity" class="form-control" value="{!! Request::old('quantity', $form['defaults']['quantity']) !!}" placeholder="数量" type="text">
      {!! ($errors->has('quantity') ? $errors->first('quantity') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('contact')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">联系人</label>
    <div class="col-md-8">
      <input name="contact" class="form-control" value="{!! Request::old('contact', $form['defaults']['contact']) !!}" placeholder="联系人" type="text">
      {!! ($errors->has('contact') ? $errors->first('contact') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('telephone')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">联系电话</label>
    <div class="col-md-8">
      <input name="telephone" class="form-control" value="{!! Request::old('telephone', $form['defaults']['telephone']) !!}" placeholder="电话" type="text">
      {!! ($errors->has('telephone') ? $errors->first('telephone') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('address')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">地址</label>
    <div class="col-md-8">
      <input name="address" class="form-control" value="{!! Request::old('address', $form['defaults']['address']) !!}" placeholder="地址" type="text">
      {!! ($errors->has('address') ? $errors->first('address') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('carrier_id')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">物流公司</label>
    <div class="col-md-8"> 
      <select name="carrier_id" class="select form-control"> 
        <option>选择物流公司</option>
        @foreach ($expressCompanys as $content)
        @if($content->id == $form['defaults']['carrier_id'])
          <option value="{!! Request::old('carrier_id', $content->id); !!}" selected="selected" type="text">{{ $content->id.'---'.$content->name }}</option>
          @else
          <option value="{!! Request::old('carrier_id', $content->id); !!}" type="text">{{ $content->id.'---'.$content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('carrier_id') ? $errors->first('carrier_id') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('state_id')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">物流类别</label>
    <div class="col-md-8"> 
      <select name="state_id" class="select form-control"> 
        <option>选择物流类别</option>
        @foreach ($states as $content)
        @if($content->id == $form['defaults']['state_id'])
          <option value="{!! Request::old('state_id', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @else
          <option value="{!! Request::old('state_id', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('state_id') ? $errors->first('state_id') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('weight')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">重量</label>
    <div class="col-md-8">
      <input name="weight" class="form-control" value="{!! Request::old('weight', $form['defaults']['weight']) !!}" placeholder="重量" type="text">
      {!! ($errors->has('weight') ? $errors->first('weight') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('fare')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">费用</label>
    <div class="col-md-8">
      <input name="fare" class="form-control" value="{!! Request::old('fare', $form['defaults']['fare']) !!}" placeholder="费用" type="text">
      {!! ($errors->has('fare') ? $errors->first('fare') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark" class="form-control" value="{!! Request::old('remark', $form['defaults']['remark']) !!}" placeholder="备注" type="text"></textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/logistics/invoices" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>