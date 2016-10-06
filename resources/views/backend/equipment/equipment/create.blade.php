@extends('backend.layouts.master')

@section('title', '设备管理')

@section('page-header')
    <h1>
        新增设备
        <small>新增设备信息</small>
        <a class="btn btn-danger btn-xs " href="/admin/equipment/equipments"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs') 
    <li class="active">新增设备</li>
@endsection

@section('content')
<div class="box box-danger">
  <div class="box-body">
    <?php
    $form = ['url' => '/admin/equipment/equipments',
        'method' => 'POST',
        'defaults' => [
            'number'     => '' ,
            'name'       => '' ,
            'type'       => '' ,
            'department' => '' ,
            'worker'     => '',
            'norm'       => '' ,
            'num'        => '' ,
            'price'      => '' ,
            'money'      => '' ,
            'unit'       => '' ,
            'address'    => '' ,
            'bill'    => '' ,
            'remark'     => '' ,
            'reator'     => '' ,
    ], ];
    ?>
    @include('backend.equipment.equipment.form')
  </div>
</div>
@stop