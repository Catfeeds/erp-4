@extends('backend.layouts.master')

@section('title', '备忘录')

@section('page-header')
    <h1>
        备忘录
        <small>备忘录</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/memos/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">备忘录</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <table class=" table table-bordered table-hover" >
      <thead>
        <tr>
          <th class="check-header hidden-xs">序号</th>
          <th class="hidden-xs"> 标题 </th>
          <th class="hidden-xs"> 内容 </th>
          <th> 操作 </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($memos as $content)
        <tr>
          <td class="check hidden-xs">{{ $content->id }}</td>
          <td class="hidden-xs " > {{ $content->title }} </td>
          <td class="hidden-xs"> {{ $content->content }} </td>
          <td>{!! $content->actionbuttons !!}</td>
        </tr>
        @endforeach
      </tbody>   
    </table>
  </div>
</div>
@stop 