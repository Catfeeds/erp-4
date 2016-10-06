@extends('backend.layouts.master')


@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('title', '采购申请')

@section('page-header')
    <h1>
        采购申请
        <small>采购申请列表</small>
        <a class="btn btn-danger btn-xs " href="/admin/logistics/applications"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">采购申请</li>
@endsection

@section('content')
<div class="box box-info">
  <div class="box-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>名称</th>
        <th>内容</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>编号</td>
        <td>{{ $application->number }}</td>
      </tr>
      <tr>
        <td>申请日期</td>
        <td>{{ $application->start_date }}</td>
      </tr>
      <tr>
        <td>结束日期</td>
        <td>{{ $application->end_date }}</td>
      </tr>
      <tr>
        <td>状态</td>
        <td>{{ $application->state->name }}</td>
      </tr>
      <tr>
        <td>申请人</td>
        <td>{{ $application->creator->name }}</td>
      </tr>
      <tr>
        <td>备注</td>
        <td>{{ $application->remark }}</td>
      </tr>
    </tbody>
  </table>
    <h4 style="color:orange" >部品明细</h4>
    <table id="table"></table>
  </div>
</div>
@stop


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}

<script type="text/javascript">
  $(function () {      
      var details = <?php echo $details ?>;
      $('#table').bootstrapTable({
          columns: [{
             field: 'No',
             title: 'No'
          },{
             field: 'number',
             title: '编号'
          },{
             field: 'name',
             title: '名称'
          },{
             field: 'standard',
             title: '规格'
          },{
             field: 'quantity',
             title: '数量'
          },{
             field: 'unit',
             title: '单位'
          }]
      }); 
      $('#table').bootstrapTable('load',details);
  });
</script>
@stop
