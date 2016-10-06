@extends('backend.layouts.master')

@section('title', '生产计划')

@section('after-styles-end')
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
         加工退料
        <small>加工退料详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/manufacture/retours"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">加工退料信息</li>
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
        <td>{{ $retour->number }}</td>
      </tr>
      <tr>
        <td>产品名称</td>
        <td>{{ $retour->worksheet->plan->product->name }}</td>
      </tr>
      <tr>
        <td>日期</td>
        <td>{{ $retour->date }}</td>
      </tr>
      <tr>
        <td>退料总数</td>
        <td>{{ $retour->total }}</td>
      </tr>
      <tr>
        <td>执行人</td>
        <td>{{ $retour->handler->name }}</td>
      </tr>
    </tbody>
  </table>
  </table>
    <h4 style="color:orange" >部品明细</h4>
    <table id="table">
    </table>
  </div>
</div>
@stop


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}

<script type="text/javascript">
  $(function () {      
      var records = <?php echo $records ?>;
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
      $('#table').bootstrapTable('load',records);
  });
</script>
@stop