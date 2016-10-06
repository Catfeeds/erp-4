//多长时间以前
->diffForHumans() 

//常用命名空间
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Redirect;

/如果是编辑,不显示添加按钮
@if(!isset($form['_method']))   
<button id="btn_add" type="button" class="btn btn-warning">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加
</button>
@endif

//Map时No从1开始,每次加1.
$records->map(function($item, $key){
    $item->No = $key+1;
}

//ajax 实例
$.get("/admin/manufacture/getPlanId",
{
  number:product_row.find('b.plan_number').html(),
},
function(data,status){
  $('form').attr('action',"/admin/manufacture/plans/"+data);
});

$('.detail').click(function(){
  var id = $(this).attr('id');
  $.get("/admin/system/getOption/"+id, function(data,status){
    $('#detail #id').find('p').html(data.id);
    $('#detail #tag').find('p').html(data.tag);
    $('#detail #parent_tag').find('p').html(data.parent_tag);
    $('#detail #name').find('p').html(data.name);
    $('#detail #order').find('p').html(data.order);
    $('#detail #remark').find('p').html(data.remark);
  });
  $('#detail').modal();
});

//create/edit  共用form选择列表
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

  //判断是否为空
    '分类'     => !empty($product->type) ? $product->hasOneType->name : '',