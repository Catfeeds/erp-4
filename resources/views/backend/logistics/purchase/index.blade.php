@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header') 
    <h1>
        采购订单
        <small>采购订单列表</small>
        <a class="btn btn-success btn-xs no-print" href="{{ URL('admin/logistics/purchases/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">采购订单</li>
@endsection

@section('content')
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#A" data-toggle="tab">未完成</a></li>
   <li><a href="#B" data-toggle="tab">已完成</a></li>
   <li><a href="#C" data-toggle="tab">全部</a></li>
</ul>
<div class="box box-success">
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="A"> 
        <table id="tb_A"></table>
      </div>
      <div class="tab-pane fade in" id="B">
        <table id="tb_B"></table>
      </div>
      <div class="tab-pane fade in" id="C">
        <table id="tb_C"></table>
      </div>
    </div>
  </div>
</div>  
  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/admin/logistics/purchases" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
            <div>
              <div class="form-group">
                <label name="name" class="control-label col-md-2">状态</label>
                <div class="col-md-8">
                  <select class="form-control" name="state_id" class="select">
                      <option value="69" type="text">待入库</option>
                      <option value="70" type="text">已入库</option>
                      <option value="71" type="text">待收票</option>
                      <option value="72" type="text">已收票</option>
                      <option value="73" type="text">完成</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        <div class="well">
          <div class="pull-left">
            <a href="#" class="btn btn-danger" data-dismiss="modal">{{ trans('strings.cancel_button') }}</a>
          </div>
          <div class="pull-right"> 
            <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
          </div>
          <div class="clearfix"></div>
        </div><!--well-->
      </form>
      </div><!-- /.modal-content -->
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
        //1.初始化Table
        var oTable = new TableInit();
        oTable.Init();

        var $modal = $('#myModal');
        $('.stateStock').click(function(){
            $modal.find('.modal-title').html('入库状态');
            var row = $(this).parent().parent();
            $modal.find('.modal-title').html(row.find('b.product_name').html());
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">状态</label><div class="col-md-8"><select class="form-control" name="state_stock" class="select"><option value="71" type="text">待入库</option><option value="72" type="text">部分入库</option><option value="73" type="text">完全入库</option>');
            $modal.modal();   
            $.get("/admin/logistics/getPurchaseId",
            {
              number:row.find('.purchase_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/logistics/purchases/"+data);
            });
        });
        $('.statePayment').click(function(){
            $modal.find('.modal-title').html('付款状态');
            var row = $(this).parent().parent();
            $modal.find('.modal-title').html(row.find('b.product_name').html());
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">状态</label><div class="col-md-8"><select class="form-control" name="state_payment" class="select"><option value="260" type="text">待付款</option><option value="261" type="text">已付款</option>');
            $modal.modal();   
            $.get("/admin/logistics/getPurchaseId",
            {
              number:row.find('.purchase_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/logistics/purchases/"+data);
            });
        });
        $('.arrivalDate').click(function(){
            var row = $(this).parent().parent();
            var end_date = row.find('.arrivalDate').html();
            $modal.find('.modal-title').html('计划到货日期');
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">完成日期</label><div class="col-md-8"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" name="arrival_date" value="'+end_date+'" class="form-control pull-left" id="endDate"></div></div>');
            $modal.modal();  

            $('#endDate').datepicker({
              dateFormat: 'yyy-mm-dd',
              language:  'zh-CN',
              todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
            }); 
            $.get("/admin/logistics/getPurchaseId",
            {
              number:row.find('.purchase_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/logistics/purchases/"+data);
            });
        });

    });

    var unfinish = <?php echo $unfinishs ?>;
    var finish = <?php echo $finishs ?>;
    var all = <?php echo $alls ?>;

    var TableInit = function () {
        var oTableInit = new Object();
        //初始化Table
        oTableInit.Init = function () {
            $('#tb_A').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                pagination: true,                   //是否显示分页（*）
                detailView: true,                   //父子表
                //注册加载子表的事件。注意下这里的三个参数！
                onExpandRow: function (index, row, $detail) {
                    oTableInit.InitSubTable(index, row, $detail);
                },
                columns: [{
                   field: 'No',
                   title: 'No',
                },{
                   field: 'number',
                   title: '订单编号'
                },{
                   field: 'title',
                   title: '标题',
                },{
                   field: 'supplier',
                   title: '供应商'
                },{
                   field: 'creator',
                   title: '采购员',
                },{
                   field: 'total',
                   title: '采购总数',
                },{
                   field: 'arrivalDate',
                   title: '计划到货日期'
                },{
                   field: 'stateStock',
                   title: '入库状态',
                },{
                   field: 'statePayment',
                   title: '付款状态',
                },{
                   field: 'remark',
                   title: '备注',
                },{
                   field: 'show',
                   title: '详情',
                }]
            }); 
            $('#tb_A').bootstrapTable('load',unfinish);
            $('#tb_B').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                pagination: true,                   //是否显示分页（*）
                columns: [{
                   field: 'No',
                   title: 'No'
                },{
                   field: 'number',
                   title: '订单编号'
                },{
                   field: 'title',
                   title: '标题'
                },{
                   field: 'supplier',
                   title: '供应商'
                },{
                   field: 'creator',
                   title: '采购员',
                },{
                   field: 'total',
                   title: '采购总数',
                },{
                   field: 'arrivalDate',
                   title: '计划到货日期'
                },{
                   field: 'stateStock',
                   title: '入库状态',
                },{
                   field: 'statePayment',
                   title: '付款状态',
                },{
                   field: 'remark',
                   title: '备注',
                },{
                   field: 'show',
                   title: '详情',
                }]
            }); 
            $('#tb_B').bootstrapTable('load',finish);
            $('#tb_C').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                pagination: true,                   //是否显示分页（*）
                detailView: false,                   //父子表
                rowStyle: function (row, index) {
                    //共有五种颜色['active', 'success', 'info', 'warning', 'danger'];
                    var strclass = "";
                    if (row.state_id == '已完成') {
                        strclass = 'success';
                    }
                    else if (row.state_id == '已中止') {
                        strclass = 'danger';
                    }
                    else {
                        return {};
                    }
                    return { classes: strclass }
                },
                columns: [{
                   field: 'No',
                   title: 'No'
                },{
                   field: 'number',
                   title: '订单编号'
                },{
                   field: 'title',
                   title: '标题'
                },{
                   field: 'supplier',
                   title: '供应商'
                },{
                   field: 'creator',
                   title: '采购员',
                },{
                   field: 'total',
                   title: '采购总数',
                },{
                   field: 'arrivalDate',
                   title: '计划到货日期'
                },{
                   field: 'stateStock',
                   title: '入库状态',
                },{
                   field: 'statePayment',
                   title: '付款状态',
                },{
                   field: 'remark',
                   title: '备注',
                },{
                   field: 'show',
                   title: '详情',
                }]
            }); 
            $('#tb_C').bootstrapTable('load',all);
        };

    //初始化子表格
        oTableInit.InitSubTable = function (index, row, $detail) {
            // var parentid = row.id;
            var cur_table = $detail.html('<table></table>').find('table');
            $(cur_table).bootstrapTable({
                url: '/admin/logistics/logistics/purchase-json',
                method: 'get',         
                queryParams: {'id':row.id}, //传递参数（*）
                striped: true,
                cache: false,
                sortable: true,
                columns: [{
                   field: 'No',
                   title: 'No'
                },{
                   field: 'product_number',
                   title: '产品编号'
                },{
                   field: 'product_name',
                   title: '产品名称'
                },{
                   field: 'remnant',
                   title: '剩余数量'
                },{
                   field: 'quantity_buy',
                   title: '采购数量',
                },{
                   field: 'quantity_stock',
                   title: '入库数量'
                },{
                   field: 'remark',
                   title: '备注'
                }],
            });
        };

        return oTableInit;

    };
</script>
@stop