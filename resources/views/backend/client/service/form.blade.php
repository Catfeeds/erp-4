<form class="form-horizontal" action="{{ $form['url'] }}" method="POST">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

  <div class="form-group{!! ($errors->has('number')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">编号</label>
    <div class="col-md-8">
      <input name="number" class="form-control" value="{!! Request::old('number', $form['defaults']['number']) !!}" placeholder="编号" type="text">
      {!! ($errors->has('number') ? $errors->first('number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('client_id')) ? ' has-error' : ' has-warning' !!}">
    <label name="name" class="control-label col-md-2">客户</label>
    <div class="col-md-8"> 
      <select name="client_id" class="select form-control"> 
        <option>选择客户</option>
        @foreach ($clients as $content)
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
  <div class="form-group{!! ($errors->has('contact')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">联系人</label>
    <div class="col-md-8">
      <input name="contact" class="form-control" value="{!! Request::old('contact', $form['defaults']['contact']) !!}" placeholder="联系人" type="text">
      {!! ($errors->has('contact') ? $errors->first('contact') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('content')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">内容</label>
    <div class="col-md-8">
      <input name="content" class="form-control" value="{!! Request::old('content', $form['defaults']['content']) !!}" placeholder="内容" type="text">
      {!! ($errors->has('content') ? $errors->first('content') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('method')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">方式</label>
    <div class="col-md-8">
      <input name="method" class="form-control" value="{!! Request::old('method', $form['defaults']['method']) !!}" placeholder="方式" type="text">
      {!! ($errors->has('method') ? $errors->first('method') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">类别</label>
    <div class="col-md-8">
      <input name="type" class="form-control" value="{!! Request::old('type', $form['defaults']['type']) !!}" placeholder="类别" type="text">
      {!! ($errors->has('type') ? $errors->first('type') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('verify')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">审核</label>
    <div class="col-md-8">
      <input name="verify" class="form-control" value="{!! Request::old('verify', $form['defaults']['verify']) !!}" placeholder="审核" type="text">
      {!! ($errors->has('verify') ? $errors->first('verify') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('approver')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">执行人</label>
    <div class="col-md-8">
      <input name="approver" class="form-control" value="{!! Request::old('approver', $form['defaults']['approver']) !!}" placeholder="执行人" type="text">
      {!! ($errors->has('approver') ? $errors->first('approver') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">备注</label>
    <div class="col-md-8">
      <input name="remark" class="form-control" value="{!! Request::old('remark', $form['defaults']['remark']) !!}" placeholder="备注" type="text">
      {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('attachment')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">附件</label>
    <div class="col-md-8">
      <input name="attachment" class="form-control" value="{!! Request::old('attachment', $form['defaults']['attachment']) !!}" placeholder="附件" type="text">
      {!! ($errors->has('attachment') ? $errors->first('attachment') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('creator')) ? ' has-error' : '' !!}">
    <label  class="control-label col-md-2">创建人</label>
    <div class="col-md-8">
      <input name="creator" class="form-control" value="{!! Request::old('creator', $form['defaults']['creator']) !!}" placeholder="创建人" type="text">
      {!! ($errors->has('creator') ? $errors->first('creator') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/client/services" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>