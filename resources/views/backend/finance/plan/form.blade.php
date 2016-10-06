<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

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
  <div class="form-group{!! ($errors->has('title')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">标题</label>
    <div class="col-md-8">
      <input name="title" class="form-control" value="{!! Request::old('title', $form['defaults']['title']) !!}" placeholder="标题" type="text">
      {!! ($errors->has('title') ? $errors->first('title') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('date')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">还款日期</label>
    <div class="col-md-8">
      <input name="date" class="form-control" value="{!! Request::old('date', $form['defaults']['date']) !!}" placeholder="日期" type="text">
      {!! ($errors->has('date') ? $errors->first('date') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('money')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">金额</label>
    <div class="col-md-8">
      <input name="money" class="form-control" value="{!! Request::old('money', $form['defaults']['money']) !!}" placeholder="金额" type="text">
      {!! ($errors->has('money') ? $errors->first('money') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('creator')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">创建人</label>
    <div class="col-md-8">
      <input name="creator" class="form-control" value="{!! Request::old('creator', $form['defaults']['creator']) !!}" placeholder="创建人" type="text">
      {!! ($errors->has('creator') ? $errors->first('creator') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">收据种类</label>
    <div class="col-md-8">
      {!! Form::selectBillType('type', $form['defaults']['type'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('type') ? $errors->first('type') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('state')) ? ' has-error' : '' !!}">
    <label name="name" class="control-label col-md-2">完成状态</label>
    <div class="col-md-8">
      {!! Form::selectPlanState('state', $form['defaults']['state'] , ['class' => 'form-control']) !!}
      {!! ($errors->has('state') ? $errors->first('state') : '') !!}
    </div>
  </div>
  <div class="well">
    <div class="pull-left">
        <a href="/admin/finance/plans" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
    </div>
    <div class="pull-right">
        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
    </div>
    <div class="clearfix"></div>
  </div><!--well-->
</form>