@extends('backend.layouts.master')

@section('title', '生产计划')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        编辑加工领料
        <small>编辑加工领料明细</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/collects"><b>返 回</b></a>
    </h1>
@endsection


    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑加工领料 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/collects/'.$collect->id ),
        '_method'  => 'PATCH',
        'method'   => 'POST',
        'defaults' => [
          'number'      => $collect->number,
          'date'        => $collect->date,
          'supplier_id' => $collect->supplier_id,
          'remark'      => $collect->remark,
    ], ];
    ?>
    @include('backend.manufacture.collect.form')  
  </div>
</div>
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
             title: '出库数量'
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