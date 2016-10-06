@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        内部邮件
        <small>内部邮件信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/emails"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 内部邮件 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/office/emails/'.$email->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'title'    => $email->title, 
          'to'       => $email->to, 
          'content'  => $email->content,
    ], ];
    ?>
    @include('backend.office.email.form')
  </div>
</div>
@stop