@extends('backend.layouts.master')

@section('title', '设备管理')

@section('page-header')
    <h1>
        设备信息
        <small>设备详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/equipment/equipments !!}"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.equipment')
    <li class="active">设备信息</li>
@endsection

@section('content')
    <?php
    $form = [
      '编号'      =>  $equipment->number,
      '名称'      =>  $equipment->name,
      '类型'      =>  $equipment->AssetsType->name ,
      '使用部门'  =>  $equipment->department ,
      '管理员'    =>  $equipment->manager->name,
      '规格'      =>  $equipment->norm ,
      '数量'      =>  $equipment->num ,
      '单价'      =>  $equipment->price ,
      '总额'      =>  $equipment->money ,
      '单位'      =>  $equipment->unit ,
      '存放位置'  =>  $equipment->address,
      '票据'      =>  $equipment->bill,
      '备注'      =>  $equipment->remark,
      '创建人'    =>  $equipment->hasonecreator->name,
    ];
    ?>
  @include('backend.layouts.show')
@stop