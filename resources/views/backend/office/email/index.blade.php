@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        邮件列表
        <small>内部邮件列表</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/emails/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">邮件列表</li>
@endsection

@section('content') 

<div class="box box-success">
  <div class="box-body">
    <ul id="myTab" class="nav nav-tabs">
       <li class="active">
          <a href="#in" data-toggle="tab">收件箱</a></li>
       <li><a href="#out" data-toggle="tab">发件箱</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
       <div class="tab-pane fade in active" id="in">
        <table class=" table table-bordered table-hover" >
          <thead>
            <tr>
              <th class="check-header hidden-xs">序号</th>
              <th class="hidden-xs"> 主题 </th>
              <th> 收件人 </th>
              <th class="hidden-xs"> 内容 </th>
              <th> 操作 </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ins as $key => $content)
            <tr>
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $content->title }} </td>
              <td> {{ $content->toUser->name  or 'to'}} </td>
              <td class="hidden-xs"> {{ $content->content }} </td>
              <td>{!! $content->actionbuttons !!}</td>
            </tr>
            @endforeach
          </tbody>   
        </table>
        </div>
       <div class="tab-pane fade" id="out">
        <table class=" table table-bordered table-hover" >
          <thead>
            <tr>
              <th class="check-header hidden-xs">序号</th>
              <th class="hidden-xs"> 主题 </th>
              <th> 收件人 </th>
              <th class="hidden-xs"> 内容 </th>
              <th> 操作 </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($outs as $content)
            <tr>
              <td class="check hidden-xs">{{ $content->id }}</td>
              <td> {{ $content->title }} </td>
              <td> {{ $content->toUser->name or 'from' }} </td>
              <td class="hidden-xs"> {{ $content->content }} </td>
              <td>{!! $content->actionbuttons !!}</td>
            </tr>
            @endforeach
          </tbody>   
        </table>
      </div>
    </div>
  </div>
</div>
@stop 