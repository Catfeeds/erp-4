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
              $('form').attr('action',"/admin/manufacture/worksheets/"+data);
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
              $('form').attr('action',"/admin/manufacture/worksheets/"+data);
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
              $('form').attr('action',"/admin/manufacture/worksheets/"+data);
            }); 
        });

    });

    var unfinish = <?php echo $unfinishs ?>;
    var finish = <?php echo $finishs ?>;
    var all = <?php echo $alls ?>;

    var TableInit = function () {
        var oTableInit = new Object();
        //初始化Table
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
                   field: 'remnant',
                   title: '剩余数量'
                },{
                   field: 'progress',
                   title: '完工数量进度条',
                },{
                   field: 'show',
                   title: '详情',
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
                },]
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

</script>