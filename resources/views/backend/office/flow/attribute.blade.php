
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/luster/flow/attr' ),
        '_method' => 'POST',
        'method' => 'POST',
        'defaults' => [
          'name'          => $process->process_name, 
    ], ];
    ?>
    <form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

        <input type="hidden" name="flow_id" value="{{ $process->flow_id }}">
        <input type="hidden" name="process_id" value="{{ $process->id }}">

      <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">名称</label>
        <div class="col-md-8">
          <input name="name" value="{!! Request::old('name', $form['defaults']['name']) !!}" class="form-control" placeholder="名称" type="text">
          {!! ($errors->has('name') ? $errors->first('name') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
        <div class="col-md-8">
            <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
        </div>
      </div>
        </div>
      </div><!--well-->
    </form>
  </div>
</div>