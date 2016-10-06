@extends('backend.layouts.master')

@section('title', '系统管理')

@section('page-header')
    <h1>
        数据填充
        <small>数据填充</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.system')
    <li class="active">数据填充</li>
@endsection

@section('content')
  <?php
  $form = [    
   	'assigned_roles',
    'bills',
    'carriers',
    'checks',
    'classifications',
    'clients',
    'defectives',
    'defects',
    'documents',
    'equipments',
    'flitrecords',
    'flits',
    'invoices',
    'jerques',
    'messages',
    'participants',
    'password_resets',
    'permissions',
    'permission_dependencies',
    'permission_groups',
    'permission_role',
    'permission_user',
    'personnels',
    'pictures',
    'plans',
    'processes',
    'products',
    'purchases',
    'quoteprices',
    'receives',
    'roles',
    'records',
    'schedules',
    'services',
    'stockrecords',
    'stocks',
    'storehouses',
    'stuctures',
    'tasks',
    'threads',
    'users',
    'user_providers',
        ];
  ?>
  <div class="box box-info">
	  <div class="box-body">
	    <form class="form-horizontal" role="form">  
	      @foreach($form as $key=>$value)
	      	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspcase '{{ studly_case(str_singular($value)) }}':<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$contents = {{ studly_case(str_singular($value)) }}::all();<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$plan = {{ studly_case(str_singular($value)) }}::all()->first()->toArray();<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$column = array_keys($plan);<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$col = count($column);<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$ucfirst = '{{ studly_case(str_singular($value)) }}';<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspreturn view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));<br>
    			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak;<br><br>
	      @endforeach
	      </tbody>
	    </table>
	 </div>
</div>

@stop 