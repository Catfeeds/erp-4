@extends('backend.layouts.master')

@section('title', '进 销 存')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        新建采购入库
        <small>新建采购入库明细</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/entrys"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建采购入库</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/entrys',
        'method' => 'POST',
        'defaults' => [
          'number'     => $number,
          'date'    => '',
          'supplier_id' => '',
          'product_id' => '',
          'date'   => $nowDate,
          'remark'     => '',
    ], ];
    ?>
    @include('backend.logistics.entry.form')
  </div>
</div>
<div id="myModal" class="modal fade bs-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">采购订单明细</h3>
      </div>
      <div class="modal-body">
        <table id="subTable"></table>
    </div><!-- /.modal-content -->
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      <button type="button" id="submit" class="btn btn-primary" data-dismiss="modal">提交</button>
    </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js') !!}

<script type="text/javascript">
$(function () {      
    var $modal = $('#myModal');
    $("#change").change(function(data){
        $('#subTable').bootstrapTable({
            uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
            clickToSelect: true,                //是否启用点击选中行
            pagination: true,                   //是否显示分页（*）
            columns: [{
              checkbox: true
            },{
               field: 'No',
               title: '序号'
            },{
               field: 'number',
               title: '编号'
            },{
               field: 'name',
               title: '名称'
            },{
               field: 'standard',
               title: '规格'
            }],
            data:[{
              checkbox:true
            }],
        });      
        var id = $(this).children('option:selected').val();
        $.get("/admin/logistics/logistics/pur-detail/"+ id, function(data,status){
          $("#supplier").attr('value',data[0].supplier);
          $('#subTable').bootstrapTable('load',data);
        });
        $modal.modal();   
    });
    $('#date').datepicker({
      dateFormat: 'dd/mm/yy',
      language:  'zh-CN',
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
    }); 

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    $('#submit').click(function(){
      var datas = $('#subTable').bootstrapTable('getSelections');
      var y = 0;
      for( var x in datas){
        y++;
        datas[x].quantity ='<input hidden type="text" name="products['+x+'][product_id]" value="'+datas[x].id+'"/><input type="text" name="products['+x+'][quantity]" />';
        datas[x].id = y;
        if (y == 1) {
          $('textarea').html(''+datas[x].name+'...');
        };
      };
      $('#tb_A').bootstrapTable('load',datas);
    });

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tb_A').bootstrapTable({
            columns: [{
               field: 'id',
               title: 'No'
            },{
               field: 'number',
               title: '编号'
            },{
               field: 'name',
               title: '名称'
            },{
               field: 'standard',
               title: '规格'
            },{
               field: 'quantity_buy',
               title: '采购数量'
            },{
               field: 'quantity',
               title: '入库数量'
            },{
               field: 'unit',
               title: '单位',
            }]
        }); 
    };
    return oTableInit;
  };
</script>
@stop