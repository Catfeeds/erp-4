<div class="well">
  <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

      {{ csrf_field() }}
      <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}"><!-- 
      <input type="hidden" name="station" value="受入检查">
      <input type="hidden" name="defective" value="0"> -->

    <div class="form-group{!! ($errors->has('out')) ? ' has-error' : '' !!}"> 
      <label  class="control-label col-md-2">调出仓库</label>
      <div class="col-md-8"> 
        <select name="out" class="select"> 
          @foreach ($storehouse as $content)
            <option value="{!! Request::old('out', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endforeach
        </select> 
        {!! ($errors->has('out') ? $errors->first('out') : '') !!}
      </div> 
    </div>
    <div class="form-group{!! ($errors->has('in')) ? ' has-error' : '' !!}"> 
      <label  class="control-label col-md-2">拨入仓库</label>
      <div class="col-md-8"> 
        <select name="in" class="select"> 
          @foreach ($storehouse as $content)
            <option value="{!! Request::old('in', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endforeach
        </select> 
        {!! ($errors->has('in') ? $errors->first('in') : '') !!}
      </div> 
    </div>
    <div class="form-group{!! ($errors->has('handler')) ? ' has-error' : '' !!}"> 
      <label  class="control-label col-md-2">经手人</label>
      <div class="col-md-8"> 
        <select name="handler" class="select"> 
          @foreach ($personnels as $content)
            <option value="{!! Request::old('handler', $content->id); !!}" type="text">{{ $content->name }}</option>
          @endforeach
        </select> 
        {!! ($errors->has('handler') ? $errors->first('handler') : '') !!}
      </div> 
    </div>
    <div class="form-group{!! ($errors->has('use')) ? ' has-error' : '' !!}">
      <label  class="control-label col-md-2">目的</label>
      <div class="col-md-8">
        <input name="use" value="{!! Request::old('use', $form['defaults']['use']) !!}" class="form-control" placeholder="目的" type="text">
        {!! ($errors->has('use') ? $errors->first('use') : '') !!}
      </div>
    </div>
    <div class="form-group{!! ($errors->has('remark')) ? ' has-error' : '' !!}">
      <label  class="control-label col-md-2">备注</label>
      <div class="col-md-8">
        <textarea name="remark"  class="form-control" placeholder="备注" type="text">{!! Request::old('remark', $form['defaults']['remark']) !!}</textarea>
        {!! ($errors->has('remark') ? $errors->first('remark') : '') !!}
      </div>
    </div>
    </div>
    <div class="well">
      <table class="table table-striped table-bordered table-hover" >
        <thead>
        <th class="check-header hidden-xs col-md-1">序号</th>
          <th > 名称 </th>
          <th > 数量 </th>
          <th > 备注 </th>
            </thead>
        <tbody>
         @for ($i = 1; $i < 11; $i++)
          <tr>
            <td class="check hidden-xs">{{ $i }}</td>
            <td>  
              <select name="flitrecord{{ $i }}" class="select"> 
                @foreach ($products as $content)
                  <option value="{!! Request::old('flitrecord{{ $i }}', $content->number); !!}" type="text">{{ $content->name }}</option>
                @endforeach
              </select> 
            </td>
            <td> 
              <input name="quantity{{ $i }}" value="{!! Request::old('quantity{{ $i }}') !!}" class="form-control" placeholder="数量" type="text">
              <input type="hidden" name="unit" value="{{ $content->unit }}">
            </td>
            <td>
             <input name="remark{{ $i }}" value="{!! Request::old('remark{{ $i }}') !!}" class="form-control" placeholder="备注" type="text">
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
    <div class="well">
      <div class="pull-left">
          <a href="/admin/logistics/checks" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
      </div>
      <div class="pull-right">
          <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
      </div>
      <div class="clearfix"></div>
  </form>
</div><!--well-->