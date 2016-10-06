<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">
  {{ csrf_field() }}
  <div class="well ">
    <fieldset><legend contenteditable="true">生产计划<small>---工单生成</small></legend><br /> 
    <div class="form-group{!! ($errors->has('type')) ? ' has-error' : ' has-warning' !!}"> 
      <label  class="control-label col-md-2">生产计划</label>
      <div class="col-md-8"> 
        <select name="plan" class="select form-control"> 
            <option value="" type="text">选择生产计划</option>
          @foreach ($unfinishPlans as $content)
            <option value="{{ $content->id }}" type="text">{{ $content->number.'-'.$content->product->name.'('.$content->quantity.$content->product->unit->name.')' }}</option>
          @endforeach
        </select> 
        {!! ($errors->has('type') ? $errors->first('type') : '') !!}
      </div> 
    </div>
    <div class="form-group{!! ($errors->has('type')) ? ' has-error' : '' !!}"> 
      <label  class="control-label col-md-2"></label>
      <div class="col-md-8"> 
      <input type="submit" class="btn btn-success" value="自动生成" />
      </div> 
    </div>
  </div><!--well-->
</form>