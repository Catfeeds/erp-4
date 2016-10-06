@extends('backend.layouts.master')

@section('title', '生产模块')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
@stop

@section('page-header')
    <h1>
        新建委外加工单
        <small>新建委个加工单</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/outsources"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture') 
    <li class="active">新建加工单</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/outsources',
        'method' => 'POST',
        'defaults' => [
          'number' => $worksheetNumber, 
          'parent_id' => '', 
          'product_id' => '', 
          'quantity' => '',
          'factory' => '',
          'start_date' => $nowDate,
          'end_date' =>'',
    ], ];
    ?>
    @include('backend.manufacture.outsource.form')
  </div>
</div>
@stop

@section('after-scripts-end')
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js') !!}
<script type="text/javascript">
  $(document).ready(function() {
    $('#begin_at').datepicker({
      dateFormat: 'dd/mm/yy',
      language:  'zh-CN',
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      });
    $('#end_at').datepicker({
      dateFormat: 'yyy-mm-dd',
      language:  'zh-CN',
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      });
  });
</script>
@stop