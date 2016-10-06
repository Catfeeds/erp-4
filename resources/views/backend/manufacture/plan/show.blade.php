@extends('backend.layouts.master')


@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('title', '生产计划')

@section('page-header')
    <h1>
        生产计划
        <small>生产计划列表</small>
        <a class="btn btn-danger btn-xs " href="/admin/manufacture/plans"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">生产计划</li>
@endsection

@section('content') 
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#A" data-toggle="tab">生产计划</a></li>
   <li><a href="#B" data-toggle="tab">生产进度</a></li>
   <li><a href="#C" data-toggle="tab">相关附件</a></li>
   <li><a href="#D" data-toggle="tab">生产工序</a></li>
</ul>
<div class="box box-success">
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="A">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th> 名称 </th>
            <th> 内容 </th>
          </thead>
          <tbody>
          <tr><td> 单据编号 </td><td>{{ $plan->number }}</td></tr>
          <tr><td> 产品编码 </td><td>{{ $plan->product->number }}</td></tr>
          <tr><td> 产品名称 </td><td>{{ $plan->product->name }}</td></tr>
          <tr><td> 计划数量 </td><td>{{ $plan->quantity.$plan->product->unit->name }}</td></tr>
          <tr><td> 完成数量 </td><td>{{ $plan->finish.$plan->product->unit->name }}</td></tr>
          <tr><td> 剩余数量 </td><td>{{ $plan->quantity - $plan->finish.$plan->product->unit->name }}</td></tr>
          <tr><td> 开始日期 </td><td>{{ $plan->start_date }}</td></tr>
          <tr><td> 结束日期 </td><td>{{ $plan->end_date }}</td></tr>
          <tr><td> 创建人 </td><td>{{ $plan->creator->name }}</td></tr>
          <tr><td> 备注 </td><td>{{ $plan->remark }}</td></tr>
          <tr><td> 发布状态 </td><td>{{ $plan->issue_state }}</td></tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in " id="B">
        <table class=" table table-bordered table-hover" >
          <thead>
            <th> No </th>
            <th> 产品编号 </th>
            <th> 产品名称 </th>
            <th> 生产进度指示条 </th>
            <th> 剩余数量 </th>
            <th> 计划数量 </th>
            <th> 完成数量 </th>
            <th> 完工日期 </th>
          </thead>
          <tbody>
            @foreach($childrenPlan  as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->product->number }}</td>
              <td>{{ $value->product->name }}</td>
              <td>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ round(($value->finish/$value->quantity),2)*100 }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round(($value->finish/$value->quantity),2)*100 }}%;">
                    {{ round(($value->finish/$value->quantity),2)*100 }}%
                  </div>
                </div>
              </td>
              <td style="font-size:16px;color:#337ab7">{{ $value->quantity - $value->finish }}</td>
              <td>{{ $value->quantity }}</td>
              <td>{{ $value->finish }}</td>
              <td>{{ $value->end_date }}</td>
            </tr>
            @endforeach
          </tbody>
      </table>
      </div>
      <div class="tab-pane fade in " id="C">
      </div>
      <div class="tab-pane fade in " id="D">
      </div>
    </div>
  </div>
</div>
@stop 

