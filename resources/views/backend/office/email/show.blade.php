@extends('backend.layouts.master')

@section('title', '财务管理')

@section('page-header')
    <h1>
        票据信息
        <small>票据详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/office/emails"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">邮件信息</li>
@endsection

@section('content')
    <?php
    $form = [
      '主题'    => $email->title, 
      '收件人'  => $email->to,
      '内容'    => $email->content,
    ];
    ?>
  @include('backend.layouts.show')
@stop