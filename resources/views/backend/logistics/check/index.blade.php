@extends('backend.layouts.master')

@section('title', '进销存管理')

@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header') 
    <h1>
        质检报告
        <small>质检报告列表</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.logistics')
    <li class="active">质检报告</li>
@endsection

@section('content')
<div class="box box-success">
    <div id="toolbar" class="btn-group">
      <button id="btn_add" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
      </button>
      <button id="btn_edit" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
      </button>
      <button id="btn_delete" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
      </button>
    </div>
    <table id="tb_A"></table>
</div>  
@stop 


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js') !!}
<script type="text/javascript">
    $(function () {       
      //1.初始化Table
      var oTable = new TableInit();
      oTable.Init();

        $("#btn_add").click(function () {
          window.location.href="/admin/logistics/checks/create"; 
        });
    });

    var all = <?php echo $alls ?>;

    var TableInit = function () {
      var oTableInit = new Object();
      //初始化Table
      oTableInit.Init = function () {
          $('#tb_A').bootstrapTable({
          // url: '/Home/GetDepartment',         //请求后台的URL（*）
          // method: 'get',                      //请求方式（*）
          toolbar: '#toolbar',                //工具按钮用哪个容器
          striped: true,                      //是否显示行间隔色
          cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
          pagination: true,                   //是否显示分页（*）
          // queryParams: oTableInit.queryParams,//传递参数（*）
          search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
          strictSearch: true,
          showColumns: true,                  //是否显示所有的列
          showRefresh: true,                  //是否显示刷新按钮
          minimumCountColumns: 2,             //最少允许的列数
          clickToSelect: true,                //是否启用点击选中行
          uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
          columns: [{
             field: 'No',
             title: 'No',
          },{
             field: 'number',
             title: '编号'
          },{
             field: 'product',
             title: '部品名称'
          },{
             field: 'supplier',
             title: '来源'
          },{
             field: 'total',
             title: '总数量',
          },{
             field: 'accept',
             title: '良品数',
          },{
             field: 'accept',
             title: '不良率',
          },{
             field: 'date',
             title: '质检日期'
          },{
             field: 'remark',
             title: '备注',
          },{
             field: 'show',
             title: '详情',
          }]
        }); 
        $('#tb_A').bootstrapTable('load',all);
      };
      //得到查询的参数
      oTableInit.queryParams = function (params) {
          var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
              limit: params.limit,   //页面大小
              offset: params.offset,  //页码
              departmentname: $("#txt_search_departmentname").val(),
              statu: $("#txt_search_statu").val()
          };
          return temp;
      };

        return oTableInit;
    };

</script>
@stop