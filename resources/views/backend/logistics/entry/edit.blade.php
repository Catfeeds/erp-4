@extends('backend.layouts.master')

@section('title', '进 销 存')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        编辑采购入库
        <small>编辑采购入库明细</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/entrys"><b>返 回</b></a>
    </h1>
@endsection


    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active"> 编辑采购入库 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/logistics/entrys/'.$entry->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'number'      => $entry->number,
          'date'        => $entry->date,
          'supplier_id' => $entry->supplier_id,
          'remark'      => $entry->remark,
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
        <h3 class="modal-title">部品信息</h3>
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

});

var records = <?php echo $records ?>;
var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
      $('#tb_A').bootstrapTable({
          columns: [{
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
             title: '入库数量'
          },{
             field: 'unit',
             title: '单位',
          }]
      }); 
      $('#tb_A').bootstrapTable('load',records);
    };
    return oTableInit;
  };
</script>
@stop