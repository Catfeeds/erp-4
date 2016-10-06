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
<div class="box box-success">
	 <div class="box-body">
	  	<table class="table table-bordered table-condensed">
		  	<caption>SystemController生成</caption>
		    <td><a class="btn btn-success "  href="/admin/system/databases/createcontroller">计算</a></td>
	  	</table>
	 </div>
</div>
<div class="box box-success">
	 <div class="box-body">
	  	<table class="table table-bordered table-condensed">
		  	<caption>系统数据库</caption>
		  	<tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Permission">Permission</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/PermissionDependency">Permission_dependency</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/PermissionGroup">Permission_group</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Role">Role</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/User">User</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/UserProvider">Rser_provicers</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/AssignedRole">AssignedRole</a></td>
		    </tr>
		    <tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/PermissionUser">PermissionUser</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/PermissionRole">PermissionRole</a></td>
		    </tr>
	  	</table>
	 </div>
</div>
<div class="box box-success">
	 <div class="box-body">
	  	<table class="table table-bordered table-condensed">
		  	<caption>system数据库</caption>
		  	<tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Bill">Bill</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Check">Check</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Classification">Classification</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Client">Client</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Defect">Defect</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Defective">Defective</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Document">Document</a></td>
		    </tr>
		    <tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Equipment">Equipment</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Flit">Flit</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Flitrecord">Flitrecord</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Stock">Stock</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Invoice">Invoice</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Jerque">Jerque</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Message">Message</a></td>
		    </tr>
		    <tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Participant">Participant</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Personnel">Personnel</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Picture">Picture</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Plan">Plan</a></td><br>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Process">Process</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Product">Product</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Purchase">Purchase</a></td>
		    </tr>
		    <tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Quoteprice">Quoteprice</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Receive">Receive</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Record">Record</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Schedule">Schedule</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Service">Service</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Storehouse">Storehouse</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Stucture">Stucture</a></td>
		    </tr>
		    <tr>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Task">Task</a></td>
		    <td><a class="btn btn-success "  href="/admin/system/databases/Thread">Thread</a></td>
		    <td></td>
		    <td></td>
		    </tr>
	  	</table>
	 </div>
</div>

@stop 