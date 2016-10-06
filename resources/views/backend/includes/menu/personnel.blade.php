@extends('backend/layouts.master')

@section('title', '人力资源')

@section('after-styles-end')
  @include('backend.includes.menu.partials.after-styles-end')
@endsection

@section('page-header')
    <h1>
        人事管理
        <small>人事管理主界面</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">人事管理</li>
@endsection

@section('content')
<div class="box box-success">
  <div class="box-body">
        <h4>人事管理</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-support fa-3x"></i>
      <p> 部门管理</p>
      </a> <a class="btn btn-default" href="/admin/personnel/personnels" role="button"><i class="fa fa-user fa-3x text-green"></i>
      <p> 人事资料</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-user-plus fa-3x"></i>
      <p> 职位管理</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x"></i>
      <p> 民族</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x"></i>
      <p> 职称</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-circle-o fa-3x"></i>
      <p> 宿舍安排</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-graduation-cap fa-3x"></i>
      <p> 学历管理</p>
      </a>
        <h4>人事变动</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-download fa-3x"></i>
      <p> 员工扣款记录</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-play-circle-o fa-3x"></i>
      <p> 员工离职</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-lock fa-3x"></i>
      <p> 员工复职</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-volume-down fa-3x"></i>
      <p> 人员调动</p>
      </a>
        <h4>工资管理</h4>
      <a class="btn btn-default" href="#" role="button"><i class="fa fa-refresh fa-3x"></i>
      <p> 工资计算科目</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-road fa-3x"></i>
      <p> 月薪管理</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-trash-o fa-3x"></i>
      <p> 工资所得税</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-inbox fa-3x"></i>
      <p> 计件工资</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-barcode fa-3x"></i>
      <p> 计时工资</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-bookmark fa-3x"></i>
      <p> 新增工资表</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-bold fa-3x"></i>
      <p> 工资表</p>
      </a> <a class="btn btn-default" href="#" role="button"><i class="fa fa-list fa-3x"></i>
      <p> 工资转账盘</p>
      </a>
  </div>
</div>

@stop