@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        编辑票据记录
        <small>编辑票据信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/bills"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 编辑票据记录 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/office/bills/'.$bill->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'bill'    => $bill->bill, 
          'client'  => $bill->client, 
          'content' => $bill->content,
          'type'    => $bill->type,
          'money'   => $bill->money,
          'number'  => $bill->number, 
          'drawer'  => $bill->drawer,
          'remark'  => $bill->remark,
    ], ];
    ?>
    @include('backend.office.bill.form')
  </div>
</div>
@stop