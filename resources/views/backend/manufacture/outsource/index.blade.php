@extends('backend.layouts.master')

@section('title', '生产模块')


@section('after-styles-end')
{!! HTML::style('plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('page-header')
    <h1>
        委外加工单
        <small>委外加工单列表</small>
        <a class="btn btn-success btn-xs " href="/admin/manufacture/outsources/create"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">委外加工单</li>
@endsection

@section('content')

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#A" data-toggle="tab">未完成</a></li>
   <li><a href="#B" data-toggle="tab">已完成</a></li>
   <li><a href="#C" data-toggle="tab">全部</a></li>
</ul>
<div class="box box-success">
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="A"> 
        <table id="tb_A"></table>
      </div>
      <div class="tab-pane fade in" id="B">
        <table id="tb_B"></table>
      </div>
      <div class="tab-pane fade in" id="C">
        <table id="tb_C"></table>
      </div>
    </div>
  </div>
</div>  
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/admin/luster/manufacture/plans" method="POST" enctype="multipart/form-data" >
          <input type="hidden" name="_method" value="PATCH">
          {{ csrf_field() }}
          <div>
            <div class="form-group">
              <label name="name" class="control-label col-md-2">状态</label>
              <div class="col-md-8">
                <select class="form-control" name="state_id" class="select">
                    <option value="90" type="text">未完成</option>
                    <option value="91" type="text">已完成</option>
                    <option value="92" type="text">中止</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      <div class="well">
        <div class="pull-left">
          <a href="#" class="btn btn-danger" data-dismiss="modal">{{ trans('strings.cancel_button') }}</a>
        </div>
        <div class="pull-right"> 
          <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>
      </div><!--well-->
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

        //2.初始化Button的点击事件
        var oButtonInit = new ButtonInit();
        oButtonInit.Init();

        var $modal = $('#myModal');
        $('.model').click(function(){
            var product_row = $(this).parent().parent();
            $modal.find('.modal-title').html(product_row.find('b.product_name').html());
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">状态</label><div class="col-md-8"><select class="form-control" name="state_id" class="select"><option value="18" type="text">未完成</option><option value="19" type="text">已完成</option><option value="20" type="text">中止</option></select></div>');
            $modal.modal();   
            $.get("/admin/manufacture/getWorksheetId",
            {
              number:product_row.find('b.worksheet_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/manufacture/outsources/"+data);
            });
        });
        $('.collect').click(function(){
            var product_row = $(this).parent().parent();
            $modal.find('.modal-title').html(product_row.find('b.product_name').html());
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">领料状态</label><div class="col-md-8"><select class="form-control" name="collect_state" class="select"><option value="可以领料" type="text">可以领料</option><option value="禁止领料" type="text">禁止领料</option></select></div>');
            $modal.modal();   
            $.get("/admin/manufacture/getWorksheetId",
            {
              number:product_row.find('b.worksheet_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/manufacture/outsources/"+data);
            });
        });

        $('a.mrp').click(function(){
          var product_row = $(this).parent().parent();
          var number = product_row.find('b.worksheet_number').html();
          var quantity = product_row.find('.quantity').html();
          window.location.href="/admin/manufacture/worksheetMrp/"+number+'/'+quantity;
        });

        $('.end_date').click(function(){
            var product_row = $(this).parent().parent();
            var end_date = product_row.find('.end_date').html();
            $modal.find('.modal-title').html('完成日期');
            $modal.find(".form-group").html('<label name="name" class="control-label col-md-2">完成日期</label><div class="col-md-8"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" name="end_date" value="'+end_date+'" class="form-control pull-left" id="endDate"></div></div>');
            $modal.modal();  

            $('#endDate').datepicker({
              dateFormat: 'yyy-mm-dd',
              language:  'zh-CN',
              todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
            }); 
            
            $.get("/admin/manufacture/getWorksheetId",
            {
              number:product_row.find('b.worksheet_number').html(),
            },
            function(data,status){
              $('form').attr('action',"/admin/manufacture/outsources/"+data);
            }); 
        });

    });

    var unfinish = <?php echo $unfinishs ?>;
    var finish = <?php echo $finishs ?>;
    var all = <?php echo $alls ?>;

    var TableInit = function () {
        var oTableInit = new Object();
        //³õÊ¼»¯Table
        oTableInit.Init = function () {
            $('#tb_A').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                // cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                pagination: true,                   //是否显示分页（*）
                rowStyle: function (row, index) {
                    //共有五种颜色['active', 'success', 'info', 'warning', 'danger'];
                    var strclass = "";
                    if (row.mrp == '<a class="mrp btn btn-success btn-xs">OK</a>') {
                        strclass = 'success';
                    }
                    else if (row.mrp == '<a class="mrp btn btn-danger btn-xs">NO</a>') {
                        strclass = 'danger';
                    }
                    else {
                        strclass = 'warning';
                    }
                    return { classes: strclass }
                },
                columns: [{
                   field: 'id',
                   title: ''
                },{
                   field: 'number',
                   title: '加工单号'
                },{
                   field: 'product_name',
                   title: '产品名称'
                },{
                   field: 'supplier',
                   title: '外发工厂'
                },{
                   field: 'remnant',
                   title: '剩余数量'
                },{
                   field: 'progress',
                   title: '完工数量进度条',
                },{
                   field: 'collect_state',
                   title: '标志',
                },{
                   field: 'state_id',
                   title: '状态',
                },{
                   field: 'mrp',
                   title: 'MRP',
                },{
                   field: 'start_date',
                   title: '开始日期'
                },{
                   field: 'end_date',
                   title: '完成日期'
                },{
                   field: 'quantity',
                   title: '计划数量'
                },{
                   field: 'finish',
                   title: '完成数量'
                }]
            }); 
            $('#tb_A').bootstrapTable('load',unfinish);
            $('#tb_B').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                // cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                pagination: true,                   //是否显示分页（*）
                columns: [{
                   field: 'id',
                   title: ''
                },{
                   field: 'number',
                   title: '加工单号'
                },{
                   field: 'plan_number',
                   title: '计划单号'
                },{
                   field: 'product_name',
                   title: '产品名称'
                },{
                   field: 'operator',
                   title: '执行人'
                },{
                   field: 'state_id',
                   title: '状态',
                },{
                   field: 'start_date',
                   title: '开始日期'
                },{
                   field: 'end_date',
                   title: '完成日期'
                },{
                   field: 'quantity',
                   title: '计划数量'
                },{
                   field: 'finish',
                   title: '完成数量'
                },]
            }); 
            $('#tb_B').bootstrapTable('load',finish);
            $('#tb_C').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                pagination: true,                   //是否显示分页（*）
                detailView: false,                   //父子表
                rowStyle: function (row, index) {
                    //共有五种颜色['active', 'success', 'info', 'warning', 'danger'];
                    var strclass = "";
                    if (row.state_id == '已完成') {
                        strclass = 'success';
                    }
                    else if (row.state_id == '已中止') {
                        strclass = 'danger';
                    }
                    else {
                        return {};
                    }
                    return { classes: strclass }
                },
                columns: [{
                   field: 'id',
                   title: ''
                },{
                   field: 'number',
                   title: '加工单号'
                },{
                   field: 'plan_number',
                   title: '计划单号'
                },{
                   field: 'product_name',
                   title: '产品名称'
                },{
                   field: 'remnant',
                   title: '剩余数量'
                },{
                   field: 'state_id',
                   title: '状态',
                },{
                   field: 'start_date',
                   title: '开始日期'
                },{
                   field: 'end_date',
                   title: '完成日期'
                },{
                   field: 'quantity',
                   title: '计划数量'
                },{
                   field: 'finish',
                   title: '完成数量'
                },]
            }); 
            $('#tb_C').bootstrapTable('load',all);
        };


    //得到查询的参数
    oTableInit.queryParams = function (params) {
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            id: 'all',
            };
            return temp;
        };

        return oTableInit;

    };


    var ButtonInit = function () {
        var oInit = new Object();
        var strrole_id = "";
        var postdata = {};
        //var arrsubmenutable = [];
        var arrmenuid = [];

        oInit.Init = function () {
            //新增数据click事件注册
            $("#btn_add").click(function () {
                $("#myModalLabel").text("新增");
                $("#myModal").find(".form-control").val("");
                $('#myModal').modal();

                postdata.ROLE_ID = "";
            });

            //编辑数据click事件注册
            $("#btn_edit").click(function () {
                var arrselections = $("#tb_roles").bootstrapTable('getSelections');
                if (arrselections.length > 1) {
                    toastr.warning('只能选择一行进行编辑');

                    return;
                }
                if (arrselections.length <= 0) {
                    toastr.warning('请选择有效数据');
                    return;
                }
                $("#myModalLabel").text("编辑");
                $("#txt_rolename").val(arrselections[0].ROLE_NAME);
                $("#txt_roledesc").val(arrselections[0].DESCRIPTION);
                $("#txt_defaulturl").val(arrselections[0].ROLE_DEFAULTURL);
                $("#txt_defaulturl_Web").val(arrselections[0].ROLE_DEFAULTURL_WEB);

                postdata.ROLE_ID = arrselections[0].ROLE_ID;
                $('#myModal').modal();
            });

            //删除数据click事件注册
            $("#btn_delete").click(function () {
                var arrselections = $("#tb_roles").bootstrapTable('getSelections');
                if (arrselections.length <= 0) {
                    toastr.warning('请选择有效数据');
                    return;
                }

                Ewin.confirm({ message: "确认要删除选择的数据吗？" }).on(function (e) {
                    if (!e) {
                        return;
                    }
                    $.ajax({
                        type: "post",
                        url: "/Role/Delete",
                        data: { "": JSON.stringify(arrselections) },
                        success: function (data, status) {
                            if (status == "success") {
                                toastr.success('提交数据成功');
                                $("#tb_roles").bootstrapTable('refresh');
                            }
                        },
                        error: function () {
                            toastr.error('Error');
                        },
                        complete: function () {

                        }

                    });
                });
            });

            //保存编辑数据click事件注册
            $("#btn_submit").click(function () {
                postdata.ROLE_NAME = $("#txt_rolename").val();
                postdata.DESCRIPTION = $("#txt_roledesc").val();
                postdata.ROLE_DEFAULTURL = $("#txt_defaulturl").val();
                postdata.ROLE_DEFAULTURL_WEB = $("#txt_defaulturl_Web").val();
                $.ajax({
                    type: "post",
                    url: "/Role/GetEdit",
                    data: { "": JSON.stringify(postdata) },
                    //contentType: "application/json; charset=utf-8",
                    //dataType: "json",
                    success: function (data, status) {
                        if (status == "success") {
                            toastr.success('提交数据成功');
                            $("#tb_roles").bootstrapTable('refresh');
                        }
                    },
                    error: function () {
                        toastr.error('Error');
                    },
                    complete: function () {

                    }

                });
            });

            //条件查询click事件注册
            $("#btn_query").click(function () {
                $("#tb_roles").bootstrapTable('refresh');
            });

            //设置权限click事件注册
            $("#btn_powerset").click(function () {
                var arrselections = $("#tb_roles").bootstrapTable('getSelections');
                if (arrselections.length > 1) {
                    toastr.warning('只能选择一行设置权限');
                    return;
                }
                if (arrselections.length <= 0) {
                    toastr.warning('请选择有效数据');
                    return;
                }

                strrole_id = arrselections[0].ROLE_ID;
                $("#myModalLabel_powerset").text("设置" + arrselections[0].ROLE_NAME + "菜单权限");
                $("#tb_powerset").bootstrapTable("destroy");//先destroy掉表格再重新加载
                $("#tb_powerset").bootstrapTable({
                    url: '/Role/GetParentMenu',
                    method: 'get',
                    detailView: true,//父子表
                    //sidePagination: "server",
                    pageSize: 10,
                    pageList: [10, 25],
                    columns: [{
                        field: 'MENU_NAME',
                        title: '菜单名称'
                    }, {
                        field: 'MENU_URL',
                        title: '菜单URL'
                    }, {
                        field: 'PARENT_ID',
                        title: '父级菜单'
                    }, {
                        field: 'MENU_LEVEL',
                        title: '菜单级别'
                    }, ],
                    onLoadSuccess: function (data) {
                        

                    },
                    onExpandRow: function (index, row, $detail) {
                        oInit.InitSubTable(index, row, $detail);
                    }
                });

                $('#myModal_powerset').modal();
            });

            //角色设置功能保存按钮click事件注册
            $("#btn_submit_powerset").click(function () {

                $.ajax({
                    type: "post",
                    url: "/Role/PowerSet",
                    data: { strRoleID: strrole_id, str_Selected_MenuId: arrmenuid.join(",") },
                    dataType: "json",
                    success: function (data, status) {
                        if (status == "success") {
                            toastr.success('设置权限成功');
                        }
                    },
                    error: function () {
                        toastr.error('Error');
                    },
                    complete: function () {

                    }

                });
            });
        };

        //初始化子表格(无线循环)
        oInit.InitSubTable = function (index, row, $detail) {
            var parentid = row.MENU_ID;
            var cur_table = $detail.html('<table></table>').find('table');
            //arrsubmenutable.push(cur_table);
            $(cur_table).bootstrapTable({
                url: '/Role/GetChildrenMenu',
                method: 'get',
                queryParams: { strParentID: parentid },
                ajaxOptions: { strParentID: parentid },
                clickToSelect: true,
                detailView: true,//父子表
                uniqueId: "MENU_ID",
                pageSize: 10,
                pageList: [10, 25],
                columns: [{
                    checkbox: true
                }, {
                    field: 'MENU_NAME',
                    title: '菜单名称'
                }, {
                    field: 'MENU_URL',
                    title: '菜单URL'
                }, {
                    field: 'PARENT_ID',
                    title: '父级菜单'
                }, {
                    field: 'MENU_LEVEL',
                    title: '菜单级别'
                }, ],
                onCheck: function (row, $element) {
                    arrmenuid.push(row.MENU_ID);
                },
                onUncheck: function (row, $element) {
                    oInit.RemoveElement(row.MENU_ID);
                },
                onCheckAll: function (rows) {
                    for (var i = 0; i < rows.length; i++) {
                        arrmenuid.push(rows[i].MENU_ID);
                    }
                },
                onUncheckAll: function (rows) {
                    for (var i = 0; i < rows.length; i++) {
                        oInit.RemoveElement(rows[i].MENU_ID);
                    }
                },
                onLoadSuccess: function (data) {
                    //设置已有菜单权限的选中
                    var arrTr = $(cur_table).find("tr");
                    for (var i = 0; i < arrTr.length; i++) {
                        var menuid = $(arrTr[i]).attr("data-uniqueid");
                        var lstFind = Enumerable.From(arrmenuid).Where("x=>x=='" + menuid + "'").ToArray();
                        if (lstFind.length > 0) {
                            $(arrTr[i]).find("input[type=checkbox]").attr("checked", "checked");
                            $(arrTr[i]).addClass("selected");
                        }
                    }
                },
                onExpandRow: function (index, row, $Subdetail) {
                    oInit.InitSubTable(index, row, $Subdetail);
                }
            });
        };

        //递归删除数组中指定元素
        oInit.RemoveElement = function (ele) {
            var ele_index = arrmenuid.indexOf(ele);
            if (ele_index > -1) {
                arrmenuid.splice(ele_index, 1);
                oInit.RemoveElement(ele);
            }
            else {
                return;
            }
        };

        return oInit;
    };
</script>
@stop
