<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" enctype="multipart/form-data" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">编号</label>
    <div class="col-md-8">
      <input name="number" class="form-control" value="{!! Request::old('number', $form['defaults']['number']) !!}" placeholder="编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('name')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">名称</label>
    <div class="col-md-8">
      <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="名称" type="text">
      {!! ($errors->has('name') ? $errors->first('name') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('order')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">排序</label>
    <div class="col-md-8">
      <input name="order" class="form-control" value="{!! Request::old('order', $form['defaults']['order']) !!}" placeholder="排序" type="text">
      {!! ($errors->has('order') ? $errors->first('order') : '默认值:9999') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('unit')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">计量单位</label>
    <div class="col-md-8"> 
      <select class="form-control" name="unit_id" class="select">
        @if(empty($form['defaults']['unit']))       
          <option value="" type="text">选择部品计量单位</option>
        @endif
        @foreach ($units as $content)
          @if( $content->id == $form['defaults']['unit'] )
            <option value="{!! Request::old('unit', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @else
           <option value="{!! Request::old('unit', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('unit') ? $errors->first('unit') : '') !!}
    </div> 
  </div>  
  <div class="form-group{!! ($errors->has('mode')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">型号</label>
    <div class="col-md-8">
      <input name="mode" class="form-control" value="{!! Request::old('mode', $form['defaults']['mode']) !!}" placeholder="型号" type="text">
      {!! ($errors->has('mode') ? $errors->first('mode') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('standard')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">规格</label>
    <div class="col-md-8">
      <input name="standard" class="form-control" value="{!! Request::old('standard', $form['defaults']['standard']) !!}" placeholder="规格" type="text">
      {!! ($errors->has('standard') ? $errors->first('standard') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('material')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">材质</label>
    <div class="col-md-8">
      <input name="material" class="form-control" value="{!! Request::old('material', $form['defaults']['material']) !!}" placeholder="材质" type="text">
      {!! ($errors->has('material') ? $errors->first('material') : '') !!}
    </div>
  </div> 
  <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">部品分类</label>
    <div class="col-md-8"> 
      <select class="form-control" name="type_id" class="select">
        @if(empty($form['defaults']['type']))       
          <option value="" type="text">选择部品分类</option>
        @endif
        @foreach ($types as $content)
          @if( $content->id == $form['defaults']['type'] )
            <option value="{!! Request::old('type', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @else
           <option value="{!! Request::old('type', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('type') ? $errors->first('type') : '') !!}
    </div> 
  </div>  
  <div class="form-group{!! ($errors->has('total')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">库存</label>
    <div class="col-md-8">
      <input name="total" class="form-control" value="{!! Request::old('total', $form['defaults']['total']) !!}" placeholder="库存" type="text">
      {!! ($errors->has('total') ? $errors->first('total') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('min')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">最低库存</label>
    <div class="col-md-8">
      <input name="min" class="form-control" value="{!! Request::old('min', $form['defaults']['min']) !!}" placeholder="最低库存" type="text">
      {!! ($errors->has('min') ? $errors->first('min') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('max')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">最高库存</label>
    <div class="col-md-8">
      <input name="max" class="form-control" value="{!! Request::old('max', $form['defaults']['max']) !!}" placeholder="最高库存" type="text">
      {!! ($errors->has('max') ? $errors->first('max') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('supplier')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">供应商</label>
    <div class="col-md-8"> 
      <select class="form-control" name="supplier_id" class="select"> 
        @if(empty($form['defaults']['supplier']))       
          <option value="" type="text">选择供应商</option>  
        @endif    
        @foreach ($supplys as $content)
          @if(  $content->id == $form['defaults']['supplier'])
          <option value="{!! Request::old('supplier', $content->id); !!}" selected=" " type="text">{{ $content->id.'---'.$content->name }}</option>
          @else
          <option value="{!! Request::old('supplier', $content->id); !!}" type="text">{{ $content->id.'---'.$content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('supplier') ? $errors->first('supplier') : '') !!}
    </div> 
  </div>    
  <div>
  @if(empty($form['_method']))
  <div class="form-group{!! ($errors->has('image')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">图片附件</label>
    <div class="col-md-8">
      <input type="file" name="image_id" />
    </div>
  </div>
  @endif
  <div class="well">
    <div class="pull-left">
        <a href="/admin/logistics/products" class="btn btn-danger btn-xs">
        {{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>