@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        新建票据
        <small>新建票据内容</small>
        <a class="btn btn-danger btn-xs " href="/admin/office/bills"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">新建票据</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/office/memos',
        'method' => 'POST',
        'defaults' => [
          'title'   => '', 
          'content' => '',
    ], ];
    ?>
    @include('backend.luster.office.memo.form')
  </div>
</div>
@stop