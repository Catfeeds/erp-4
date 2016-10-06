<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="form-group {!! ($errors->has('name')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">名称</label>
    <div class="col-md-8">
      <input name="name" class="form-control" value="{!! Request::old('name', $form['defaults']['name']) !!}" placeholder="名称" type="text">
      {!! ($errors->has('name') ? $errors->first('name') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('assetstype')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">类型</label>
    <div class="col-md-8">
      <select name="assetstype" class="select"> 
      @if (empty($form['defaults']['type']))
          <option value="" type="text">选择设备类型</option>
      @endif
        @foreach ($assetstypes as $content)
          @if($content->id == $form['defaults']['type'])
          <option value="{!! Request::old('assetstype', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @else
          <option value="{!! Request::old('assetstype', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('assetstype') ? $errors->first('assetstype') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('department')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">使用部门</label>
    <div class="col-md-8">
      {!! Form::selectCompanyDepartment('department', $form['defaults']['department'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('department') ? $errors->first('department') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('worker')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">管理员</label>
    <div class="col-md-8">
      <select name="worker" class="select"> 
        @if (empty($form['defaults']['type']))
          <option value="" type="text">选择管理员</option>
        @endif
        @foreach ($workers as $content)
          @if($content->id == $form['defaults']['worker'])
          <option value="{!! Request::old('worker', $content->id); !!}" selected="selected" type="text">{{ $content->name }}</option>
          @else
          <option value="{!! Request::old('worker', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('worker') ? $errors->first('worker') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('norm')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">规格</label>
    <div class="col-md-8">
      <input name="norm" class="form-control" value="{!! Request::old('norm', $form['defaults']['norm']) !!}" placeholder="规格" type="text">
      {!! ($errors->has('norm') ? $errors->first('norm') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('num')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">数量</label>
    <div class="col-md-8">
      <input name="num" class="form-control" value="{!! Request::old('num', $form['defaults']['num']) !!}" placeholder="数量" type="text">
      {!! ($errors->has('num') ? $errors->first('num') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('price')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">单价</label>
    <div class="col-md-8">
      <input name="price" class="form-control" value="{!! Request::old('price', $form['defaults']['price']) !!}" placeholder="单价" type="text">
      {!! ($errors->has('price') ? $errors->first('price') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('unit')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">单位</label>
    <div class="col-md-8">
      {!! Form::selectUnit('unit', $form['defaults']['unit'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('unit') ? $errors->first('unit') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('bill')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">票据</label>
    <div class="col-md-8">
      <select name="bill" class="select"> 
        @if (empty($form['defaults']['bill']))
          <option value="" type="text">选择票据</option>
        @endif
        @foreach ($bills as $content)
          @if($content->id == $form['defaults']['bill'])
          <option value="{!! Request::old('bill', $content->id); !!}" selected="selected" type="text">{{ $content->id }}</option>
          @else
          <option value="{!! Request::old('bill', $content->id); !!}" type="text">{{ $content->id }}</option>
          @endif
        @endforeach
      </select> 
      {!! ($errors->has('bill') ? $errors->first('bill') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <textarea name="remark" class="form-control"  placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/equipment/equipments" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>

    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>