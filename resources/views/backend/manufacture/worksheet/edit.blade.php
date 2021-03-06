@extends('backend.layouts.master')
@section('title', '生产模块')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
@stop

@section('page-header')
    <h1>
        加工单
        <small>编辑加工单</small>
        <a class="btn btn-warning btn-xs" href="/admin/manufacture/worksheets"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active"> 编辑联系人 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/manufacture/worksheets/'.$worksheet->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'number' => $worksheet->number, 
          'parent_id' => $worksheet->parent_id, 
          'product_id' => $worksheet->product_id, 
          'quantity' => $worksheet->quantity,
          'start_date' =>$worksheet->start_date,
          'end_date' =>$worksheet->end_date,
    ], ];
    ?>
    @include('backend.manufacture.worksheet.form')
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