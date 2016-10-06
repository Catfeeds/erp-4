@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('after-styles-end')
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        质检报告明细
        <small>质检报告记录详细信息</small>
        <a class="btn btn-info btn-xs" href="/admin/logistics/purchases"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">质检报告明细</li>
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
        <td>主题</td>
        <td>{{ $purchase->title }}</td>
      </tr>
      <tr>
        <td>订单编号</td>
        <td>{{ $purchase->number }}</td>
      </tr>
      <tr>
        <td>创建日期</td>
        <td>{{ $purchase->created_at }}</td>
      </tr>
      <tr>
        <td>计划到货日期</td>
        <td>{{ $purchase->arrival_date }}</td>
      </tr>
      <tr>
        <td>供应商</td>
        <td>{{ $purchase->supplier->name }}</td>
      </tr>
      <tr>
        <td>采购总数量</td>
        <td>{{ $purchase->total }}</td>
      </tr>
      <tr>
        <td>入库状态</td>
        <td>{{ $purchase->stateStock }}</td>
      </tr>
      <tr>
        <td>付款状态</td>
        <td>{{ $purchase->statePayment }}</td>
      </tr>
      <tr>
        <td>执行人</td>
        <td>{{ $purchase->handler->name }}</td>
      </tr>
      <tr>
        <td>备注</td>
        <td>{{ $purchase->remark }}</td>
      </tr>
    </tbody>
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
      var records = <?php echo $details ?>;
      $('#table').bootstrapTable({
          columns: [{
             field: 'No',
             title: 'No'
          },{
             field: 'product_number',
             title: '编号'
          },{
             field: 'product_name',
             title: '名称'
          },{
             field: 'product_standard',
             title: '规格'
          },{
             field: 'remnant',
             title: '未到数量'
          },{
             field: 'quantity_buy',
             title: '采购数量'
          },{
             field: 'quantity_stock',
             title: '入库数量'
          },{
             field: 'unit',
             title: '单位'
          }]
      }); 
      $('#table').bootstrapTable('load',records);
  });
</script>
@stop