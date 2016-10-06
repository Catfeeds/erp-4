@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        新建邮件
        <small>创建内部邮件</small>
        <a class="btn btn-danger btn-xs " href="/admin/office/emails"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">新建邮件</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/office/emails',
        'method' => 'POST',
        'defaults' => [
          'title'   => '', 
          'to'  => '',
          'content' => '',
    ], ];
    ?>
    @include('backend.office.email.form')
  </div>
</div>
@stop