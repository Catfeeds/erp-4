@extends('backend.layouts.master')

@section('title', '设备管理')

@section('page-header')
    <h1>
        编辑设备信息
        <small>编辑设备信息</small>
        <a class="btn btn-warning btn-xs" href="/admin/equipment/equipments"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.equipment')
    <li class="active"> 编辑设备信息 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">
  <?php
    $form = ['url' => URL('/admin/equipment/equipments/'.$equipment->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
            'number'     => $equipment->number ,
            'name'       => $equipment->name ,
            'type'       => $equipment->type ,
            'department' => $equipment->department ,
            'worker'     => $equipment->worker,
            'norm'       => $equipment->norm ,
            'num'        => $equipment->num ,
            'price'      => $equipment->price ,
            'money'      => $equipment->money ,
            'unit'       => $equipment->unit ,
            'address'    => $equipment->address ,
            'bill'       => $equipment->bill ,
            'remark'     => $equipment->remark ,
            'reator'     => $equipment->reator ,
    ], ];
    ?>
    @include('backend.equipment.equipment.form')
  </div>
</div>
@stop