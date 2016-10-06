@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        备忘录信息
        <small>备忘录详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/office/memos"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">备忘录信息</li>
@endsection

@section('content')
    <?php
    $form = [
      '标题'     => $memo->title, 
      '内容'     => $memo->content,
    ];
    ?>
  @include('backend.layouts.show')
@stop