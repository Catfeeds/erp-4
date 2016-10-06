@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
{!! HTML::style('plugins/bootstrap-tree/bootstrap-treeview.css') !!}
@stop

@section('page-header')
    <h1>
        新建质检报告
        <small>新建质检报告明细</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/purchases"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">新建质检报告</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/logistics/purchases',
        'method' => 'POST',
        'defaults' => [
          'number'     => $checkNumber,
          'title'     => '',
          'date'    => '',
          'supplier_id' => '',
          'date'   => $date,
          'remark'     => '',
    ], ];
    ?>
    @include('backend.logistics.check.form')
  </div>
</div>
<div id="myModal" class="modal fade bs-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">采购订单</h3>
      </div>
      <div class="modal-body">
        <div class="container">
           <div class="row">
              <div class="col-md-4">
              <div id="treeview" class=""></div>
              </div>
              <div class="col-md-8">
                  <table id="subTable"></table>
              </div>      
           </div>
        </div>
    </div><!-- /.modal-content -->
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      <button type="button" id="submit_modal" class="btn btn-primary" data-dismiss="modal">提交</button>
    </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js') !!}
{!! HTML::script('plugins/bootstrap-tree/bootstrap-treeview.js') !!}

<script type="text/javascript">
$(function () {      

    var oldDatas = new Array();
    var oldDatasNumber = 0;
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

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    $('#submit_modal').click(function(){
      var datas = $('#subTable').bootstrapTable('getSelections');
      $('#tb_A').bootstrapTable('load',datas);
      $('#tb_A').bootstrapTable('uncheckAll')
      $('#tb_A > tbody > tr').attr('class','');
    }); 
});
       

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tb_A').bootstrapTable({
            uniqueId: "ID",                //每一行的唯一标识，一般为主键列
            columns: [{
               checkbox: true
            },{
               field: 'No',
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
               field: 'quantity',
               title: '采购数量'
            },{
               field: 'unit',
               title: '单位',
            }],
        }); 
    };
    return oTableInit;
  };

var ButtonInit = function () {
    var oInit = new Object();
    var postdata = {};

  

    oInit.Init = function () {
    var $modal = $('#myModal');
      $('#add_app').click(function(){
          $('.modal-title').html('采购申请单');
          $('#treeview').treeview({
            data: json_apps,
            onNodeSelected: function(event, data) {
              if (data['nodeId'] == 0) {
                $('#subTable').bootstrapTable('load',products_app);
              }else{                
                $.get("/admin/logistics/logistics/getApp/"+data['text'], function(data,status){
                  $('#subTable').bootstrapTable('load',data);
                });
              }
            },
          }); 
          $('#subTable').bootstrapTable({
              uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
              clickToSelect: true,                //是否启用点击选中行
              pagination: true,                   //是否显示分页（*）
              columns: [{
                checkbox: true
              },{
                 field: 'No',
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
              }],
              data:[{
                checkbox:true
              }],
          }); 
          $('#subTable').bootstrapTable('load',products_app);
          $modal.modal();   
      });
      $('#add_plan').click(function(){
          $('.modal-title').html('计划采购单');
          $('#treeview').treeview({
            data: json_plans,
            onNodeSelected: function(event, data) {
              if (data['nodeId'] == 0) {
                $('#subTable').bootstrapTable('load',products_plan);
              }else{                
                $.get("/admin/logistics/getAppDetail/"+data['text'], function(data,status){
                  $('#subTable').bootstrapTable('load',data);
                });
              }
            },
          }); 
          $('#subTable').bootstrapTable({
              uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
              clickToSelect: true,                //是否启用点击选中行
              pagination: true,                   //是否显示分页（*）
              columns: [{
                checkbox: true
              },{
                 field: 'No',
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
              }],
              data:[{
                checkbox:true
              }],
          }); 
          $('#subTable').bootstrapTable('load',products_plan);
          $modal.modal();   
      });
      $('#add_btn').click(function(){
          $('.modal-title').html('部品选择');
          $('#treeview').treeview({data: json_products});
          $('#treeview').treeview({
            data: json_products,
            onNodeSelected: function(event, data) {
              if (data['nodeId'] == 0) {
                $('#subTable').bootstrapTable('load',products);
              }else{                
                $.get("/admin/logistics/getProducts/"+data['text'], function(data,status){
                  $('#subTable').bootstrapTable('load',data);
                });
              }
            },
          }); 
          $('#subTable').bootstrapTable({
              uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
              clickToSelect: true,                //是否启用点击选中行
              pagination: true,                   //是否显示分页（*）
              columns: [{
                checkbox: true
              },{
                 field: 'No',
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
              }],
              data:[{
                checkbox:true
              }],
          }); 
          $('#subTable').bootstrapTable('load',products);
          $modal.modal();   
      });

      $("#btn_delete").click(function () {
        var $table = $("#tb_A");
        var arrselections = $table.bootstrapTable('getSelections');
        if (arrselections.length <= 0) {
          toastr.warning('请选择有效数据');
          return;
        }
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
          return row.id;
        });
        $table.bootstrapTable('remove', {
          field: 'id',
          values: ids
        });
      });


    };

    return oInit;
};
</script>
@stop