@extends('backend/layouts.master')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
@stop

@section('title', '报价列表')

@section('page-header')
    <h1>
        编辑报价
        <small>编辑报价信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/client/quoteprices"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 编辑报价 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/client/quoteprices/'.$quoteprice->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
            'client_id'     => $quoteprice->client_id,
            'product_id'    => $quoteprice->product_id,
            'price'      => round($quoteprice->price,2),
            'indate'       => $quoteprice->indate,
            'cycle'      => $quoteprice->cycle,
            'attachment_id' => $quoteprice->attachment,
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