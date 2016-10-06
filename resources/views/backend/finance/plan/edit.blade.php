@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        编辑还款计划
        <small>编辑还款计划信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/finance/plans"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.finance')
    <li class="active"> 编辑还款计划 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/finance/plans/'.$plan->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'client'  => $plan->client, 
          'title'   => $plan->title, 
          'date'    => $plan->date,
          'money'   => $plan->money,
          'creator' => $plan->creator,
          'state'    => $plan->state,
          'type'    => $plan->type,
    ], ];
    ?>
    @include('backend.finance.plan.form')
  </div>
</div>
@stop