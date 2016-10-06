@extends('backend.layouts.master')


@section('after-styles-end')
{!! HTML::style('plugins/bootstrap-table/bootstrap-table.css') !!}
@stop

@section('title', '生产计划')

@section('page-header')
    <h1>
        生产计划
        <small>生产计划列表</small>
        <a class="btn btn-success btn-xs " href="/admin/luster/manufacture/plans/create"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.luster.manufacture.includes.breadcrumbs')
    <li class="active">生产计划</li>
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
@stop 


@section('after-scripts-end')
{!! HTML::script('/plugins/bootstrap-table/bootstrap-table.js') !!}
{!! HTML::script('/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js') !!}
<script type="text/javascript">
    $(function () {
        //1.初始化Table
        var oTable = new TableInit();
        oTable.Init();

        //2.初始化Button的点击事件
        var oButtonInit = new ButtonInit();
        oButtonInit.Init();

    });

    var data = <?php echo $alls ?>;

    var TableInit = function () {
        var oTableInit = new Object();
        //初始化Table
        oTableInit.Init = function () {
            $('#tb_A').bootstrapTable({
                striped: true,                      //是否显示行间隔色
                // cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                pagination: true,                   //是否显示分页（*）
                detailView: true,                   //父子表
                //注册加载子表的事件。注意下这里的三个参数！
                onExpandRow: function (index, row, $detail) {
                    oTableInit.InitSubTable(index, row, $detail);
                },
                columns: [{
                   field: 'number',
                   title: '计划单号'
                },{
                   field: 'product_number',
                   title: '产品编号'
                },{
                   field: 'product_name',
                   title: '产品名称'
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
                },{
                   field: 'remnant',
                   title: '剩余数量'
                },]
            }); 
            $('#tb_A').bootstrapTable('load',data);

        };

        //得到查询的参数
        oTableInit.queryParams = function (params) {
            var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                // limit: params.limit,   //页面大小
                // offset: params.offset,  //页码
                id: 'all',
            };
            return temp;
        };

  
        //初始化子表格(无线循环)
        oTableInit.InitSubTable = function (index, row, $detail) {
            // var parentid = row.id;
            var cur_table = $detail.html('<table></table>').find('table');
            $(cur_table).bootstrapTable({
                url: '/admin/luster/manufacture/planJson',
                method: 'get',         
                queryParams: {'id':row.id}, //传递参数（*）
                striped: true,
                cache: false,
                pagination: true,
                sortable: true,
                detailView: true,//父子表
                columns: [{
                   field: 'number',
                   title: '计划单号'
                },{
                   field: 'product_number',
                   title: '产品编号'
                },{
                   field: 'product_name',
                   title: '产品名称'
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
                },{
                   field: 'remnant',
                   title: '剩余数量'
                },],
                //无线循环取子表，直到子表里面没有记录
                onExpandRow: function (index, row, $Subdetail) {
                    oTableInit.InitSubTable(index, row, $Subdetail);
                }
            });
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
                //var arr_selected_menu = [];
                //for (var i = 0; i < arrsubmenutable.length; i++) {
                //    //如果对应的子表不存在
                //    if ($(arrsubmenutable[i]).length <= 0) {
                //        continue;
                //    }
                //    var arrtr = $(arrsubmenutable[i]).find('tr[class=selected]');
                //    for (var j = 0; j < arrtr.length; j++) {
                //        arr_selected_menu.push($(arrsubmenutable[i]).bootstrapTable("getRowByUniqueId", $(arrtr[j]).attr("data-uniqueid")));
                //    }

                //}

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