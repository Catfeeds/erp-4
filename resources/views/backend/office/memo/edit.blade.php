@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        编辑备忘录
        <small>编辑备忘录</small>
        <a class="btn btn-warning btn-xs" href="/admin/office/memos"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active"> 编辑备忘录 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/office/memos/'.$memo->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
          'title'    => $memo->title, 
          'content' => $memo->content,
    ], ];
    ?>
    @include('backend.luster.office.memo.form')
  </div>
</div>
@stop