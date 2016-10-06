<form class="form-horizontal" action="{{ $form['url'] }}" method="{{ $form['method'] }}" >

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

      <div class="form-group{!! ($errors->has('title')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">标题</label>
        <div class="col-md-8">
          <input name="title" class="form-control" value="{!! Request::old('title', $form['defaults']['title']) !!}" placeholder="标题" type="text">
          {!! ($errors->has('title') ? $errors->first('title') : '') !!}
        </div>
      </div>
      <div class="form-group{!! ($errors->has('content')) ? ' has-error' : '' !!}">
        <label name="name" class="control-label col-md-2">内容</label>
        <div class="col-md-8">
          <textarea name="content" class="form-control" value="{!! Request::old('content', $form['defaults']['content']) !!}" placeholder="内容" type="text">{!! Request::old('content', $form['defaults']['content']) !!}</textarea>
          {!! ($errors->has('content') ? $errors->first('content') : '') !!}
        </div>
      </div>
      <div class="well">
        <div class="pull-left">
            <a href="/admin/office/bills" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>
      </div><!--well-->
    </form>