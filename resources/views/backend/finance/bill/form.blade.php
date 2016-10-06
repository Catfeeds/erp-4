<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('bill')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">标题</label>
    <div class="col-md-8">
      <input name="bill" class="form-control" value="{!! Request::old('bill', $form['defaults']['bill']) !!}" placeholder="标题" type="text">
      {!! ($errors->has('bill') ? $errors->first('bill') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('client')) ? ' has-error' : '' !!}"> 
    <label  class="control-label col-md-2">客户</label>
    <div class="col-md-8"> 
      <select name="client" class="select"> 
        @foreach ($clients as $content)
          <option value="{!! Request::old('client', $content->id); !!}" type="text">{{ $content->short }}</option>
        @endforeach
      </select> 
      {!! ($errors->has('client') ? $errors->first('client') : '') !!}
    </div> 
  </div>
  <div class="form-group{!! ($errors->has('content')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">内容</label>
    <div class="col-md-8">
      <textarea name="content" class="form-control" value="{!! Request::old('content', $form['defaults']['content']) !!}" placeholder="内容" type="text">{!! Request::old('content', $form['defaults']['content']) !!}</textarea>
      {!! ($errors->has('content') ? $errors->first('content') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">收据种类</label>
    <div class="col-md-8">
      {!! Form::selectBillType('type', $form['defaults']['type'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('type') ? $errors->first('type') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('money')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">金额</label>
    <div class="col-md-8">
      <input name="money" class="form-control" value="{!! Request::old('money', $form['defaults']['money']) !!}" placeholder="金额" type="text">
      {!! ($errors->has('money') ? $errors->first('money') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">票号</label>
    <div class="col-md-8">
      <input name="number" class="form-control" value="{!! Request::old('number', $form['defaults']['number']) !!}" placeholder="票号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('drawer')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">开票人</label>
    <div class="col-md-8">
      <input name="drawer" class="form-control" value="{!! Request::old('drawer', $form['defaults']['drawer']) !!}" placeholder="开票人" type="text">
      {!! ($errors->has('drawer') ? $errors->first('drawer') : '') !!}
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
            <a href="/admin/finance/bills" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>
      </div><!--well-->
    </form>