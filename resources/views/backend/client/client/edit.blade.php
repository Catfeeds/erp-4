@extends('backend.layouts.master')

@section('title', '客户列表')

@section('page-header')
    <h1>
        编辑客户
        <small style="color: blue">>>>>{{ $client->short }}</small>
        <a class="btn btn-warning btn-xs no-print" href="/admin/client/clients"><b>返 回</b></a>
    </h1>
@endsection

    {!! Session::flash('currentPage',  Session::get('currentPage') ) !!}

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.client')
    <li class="active"> 编辑客户 </li>
@endsection

@section('content')
<div class="box box-warning">
  <div class="box-body">    
  <?php
    $form = ['url' => URL('/admin/client/clients/'.$client->id ),
        '_method' => 'PATCH',
        'method' => 'POST',
        'defaults' => [
            'company'   => $client->company,
            'name'      => $client->name,
            'telephone' => $client->telephone,
            'fax'       => $client->fax,
            'address'   => $client->address,
            'email'     => $client->email,
            'netword'   => $client->netword,
            'bank'      => $client->bank,
            'account'   => $client->account,
            'remark'    => $client->remark,
            'type'      => $client->type_id,
            'source'    => $client->source_id,
    ], ];
    ?>
    @include('backend.client.client.form')
  </div>
</div>
@stop