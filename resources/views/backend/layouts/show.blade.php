<div class="box box-info">
  <div class="box-body">
    <form class="form-horizontal" role="form">  
      @foreach($form as $key=>$value)
      <div class="form-group">
        <label class="col-sm-2 control-label">{{ $key }} :</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $value }}</p>
        </div>
      </div>
      @endforeach
    </form>
  </div>
</div>