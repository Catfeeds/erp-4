@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        通讯录
        <small>通讯录列表</small>
        <!-- <a class="btn btn-success " href="{{ URL('admin/luster/contacts/create') }}"><b>新 建</b></a> -->
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">通讯录</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
    <ul id="myTab" class="nav nav-tabs">
       <li class="active">
          <a href="#inside" data-toggle="tab">员工通讯录</a></li>
       <li><a href="#outside" data-toggle="tab">客户通讯录</a></li>
       <li><a href="#all" data-toggle="tab">所有人员</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="inside">
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
            @foreach ($insides as $contact)
            <tr>
              <td class="check hidden-xs">{{ $contact->id }}</td>
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
      <div class="tab-pane fade in " id="outside">
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
            @foreach ($outsides as $contact)
            <tr>
              <td class="check hidden-xs">{{ $contact->id }}</td>
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
            @foreach ($contacts as $contact)
            <tr>
              <td class="check hidden-xs">{{ $contact->id }}</td>
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