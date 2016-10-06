@extends('backend.layouts.master')

@section('title', '生产计划')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        新建加工领料
        <small>新建加工领料明细</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/collects"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">新建加工领料</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/collects',
        'method' => 'POST',
        'defaults' => [
          'number'     => $collectNumber,
          'worksheet_id' => '',
          'date'     => $date,
          'remark'     => '',
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
    $('#table').bootstrapTable({
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
           field: 'need',
           title: '需求数量'
        },{
           field: 'total',
           title: '库存数量',
        },{
           field: 'unit',
           title: '单位',
        }]
    });    
    $('#date').datepicker({
      dateFormat: 'dd/mm/yy',
      language:  'zh-CN',
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
    });    

});
 
function getData(name){
    $.ajax({url:"/admin/manufacture/getWorksheetProduct/"+name.value,
      success:function(result){
        $('#table').bootstrapTable('load',result);
    }});

}

</script>
@stop