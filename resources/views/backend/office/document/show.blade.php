@extends('backend.layouts.master')

@section('title', '文档管理')

@section('page-header')
    <h1>
        文件信息
        <small>文件详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/office/documents"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">文件信息</li>
@endsection

@section('content')
  <?php 
	$form = [   
		'名称'     => $document->name, 
		'编号'     => $document->number,
		'关联项目' => $document->project,
		'URL'      => $document->url,
		'版本号'   => $document->version,
		'备注'     => $document->remark,
	];  
  ?>
  @include('backend.layouts.show')
@stop