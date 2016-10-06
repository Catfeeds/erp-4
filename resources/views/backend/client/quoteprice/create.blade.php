@extends('backend/layouts.master')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
@stop

@section('title', '新建报价')

@section('page-header')
    <h1>
        新建报价
        <small>新建供应商报价信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/client/quoteprices"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active">新建报价</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/client/quoteprices',
        'method' => 'POST',
        'defaults' => [
            'client_id'  => '',
            'product_id' => '',
            'price'      => '',
            'indate'     => $date,
            'cycle'      => '',
            'attachment_id' => '',
    ], ];
    ?>
    @include('backend.client.quoteprice.form')
  </div>
</div>
@stop

@section('after-scripts-end')
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js') !!}
<script type="text/javascript">
  $(document).ready(function() {
    $('#indate').datepicker({
      dateFormat: 'yyy-mm-dd',
      language:  'zh-CN',
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      });
  });
</script>
@stop