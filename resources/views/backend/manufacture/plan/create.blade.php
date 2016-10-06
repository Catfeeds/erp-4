@extends('backend.layouts.master')

@section('title', '生产计划')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
@stop

@section('page-header')
    <h1>
        新建生产计划
        <small>新建生产计划</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/plans"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture') 
    <li class="active">新建生产计划</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/manufacture/plans',
        'method' => 'POST',
        'defaults' => [
          'number' => $planNumber, 
          'product_id' => '', 
          'quantity' => '',
          'start_date' =>$nowDate,
          'end_date' =>'',
    ], ];
    ?>
    @include('backend.manufacture.plan.form')
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