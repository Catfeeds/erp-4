<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">
  {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">
  <div class="well ">
    <fieldset><legend contenteditable="true">生产计划<small>---委外加工单生成</small></legend><br /> 
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
    <div class="form-group{!! ($errors->has('supplier_id')) ? ' has-error' : ' has-warning' !!}"> 
      <label  class="control-label col-md-2">委外加工商</label>
      <div class="col-md-8"> 
        <select name="supplier_id" class="select form-control"> 
            <option value="" type="text">选择委外加工商</option>
          @foreach ($suppliers as $content)
            <option value="{{ $content->id }}" type="text">{{ $content->id.'-'.$content->name }}</option>
          @endforeach
        </select> 
        {!! ($errors->has('supplier_id') ? $errors->first('supplier_id') : '') !!}
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