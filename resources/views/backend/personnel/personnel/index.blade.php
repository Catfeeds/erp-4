@extends('backend.layouts.master')

@section('title', '员工列表')

@section('page-header')
    <h1>
        人员管理
        <small>人员信息</small>
        <a class="btn btn-success btn-xs " href="{{ URL('admin/personnel/personnels/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.personnel')
    <li class="active">人员管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <ul id="myTab" class="nav nav-tabs">
       <li class="active"><a href="#personnel" data-toggle="tab">员工</a></li>
       <li><a href="#client" data-toggle="tab">客户</a></li>
       <li><a href="#all" data-toggle="tab">所有人员</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="personnel">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 姓名 </th>
            <th> 客户 </th>
            <th class="hidden-xs"> 性别 </th>
            <th> 电话 </th>
            <th> 邮箱 </th>
            <th class="hidden-xs"> QQ </th>
            <th class="hidden-xs"> 微信</th>
            <!-- <th>　操作 </th> -->
          </thead>
          <tbody>
            @foreach ($personnel as $key=>$contact)
            <tr>
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $contact->name }} </td>
              <td> {{ $contact->client  }} </td>
              <td class="hidden-xs"> {{ $contact->gender  }} </td>
              <td> {{ $contact->telephone }} </td>
              <td> {{ $contact->email }} </td>
              <td class="hidden-xs"> {{ $contact->qq }} </td>
              <td class="hidden-xs"> {{ $contact->wechat }} </td>
              <!-- <td>{!! $contact->actionbuttons !!}</td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in " id="client">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 姓名 </th>
            <th> 客户 </th>
            <th class="hidden-xs"> 性别 </th>
            <th> 电话 </th>
            <th> 邮箱 </th>
            <th class="hidden-xs"> QQ </th>
            <th class="hidden-xs"> 微信</th>
            <!-- <th>　操作 </th> -->
          </thead>
          <tbody>
            @foreach ($client as $key =>$contact)
            <tr>
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $contact->name }} </td>
              <td> {{ $contact->client  }} </td>
              <td class="hidden-xs"> {{ $contact->gender  }} </td>
              <td> {{ $contact->telephone }} </td>
              <td> {{ $contact->email }} </td>
              <td class="hidden-xs"> {{ $contact->qq }} </td>
              <td class="hidden-xs"> {{ $contact->wechat }} </td>
              <!-- <td>{!! $contact->actionbuttons !!}</td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in " id="all">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th class="check-header hidden-xs">序号</th>
            <th> 姓名 </th>
            <th> 客户 </th>
            <th class="hidden-xs"> 性别 </th>
            <th> 电话 </th>
            <th> 邮箱 </th>
            <th class="hidden-xs"> QQ </th>
            <th class="hidden-xs"> 微信</th>
            <!-- <th>　操作 </th> -->
          </thead>
          <tbody>
            @foreach ($all as $key => $contact)
            <tr>
              <td class="check hidden-xs">{{ $key+1 }}</td>
              <td> {{ $contact->name }} </td>
              <td> {{ $contact->client  }} </td>
              <td class="hidden-xs"> {{ $contact->gender  }} </td>
              <td> {{ $contact->telephone }} </td>
              <td> {{ $contact->email }} </td>
              <td class="hidden-xs"> {{ $contact->qq }} </td>
              <td class="hidden-xs"> {{ $contact->wechat }} </td>
              <!-- <td>{!! $contact->actionbuttons !!}</td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop 