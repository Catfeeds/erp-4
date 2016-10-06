@extends('frontend.layouts.master')

@section('content')

    <div class="row">
      <hr>
      <h2>Data</h2>
      <div class="col-sm-4">
        <h2>JSON Data-12</h2>
        <div id="tree" class=""></div>
      </div>
    </div>

@endsection

@section('after-scripts-end')

<script src="/plugins/bootstraptree/js/bootstrap_treeview.js"></script>
<script type="text/javascript">

      $(function() {

        var defaultData = [
          {
            text: '父菜单 1',
            href: 'www.baidu.com',
            tags: ['3'],
            nodes: [
              {
                text: '子菜单 1',
                href: 'www.baidu.com',
                tags: ['2'],
                nodes: [
                  {
                    text: '孙目录 1',
                    href: 'www.baidu.com',
                    tags: ['0']
                  },
                  {
                    text: '孙目录 2',
                    href: 'www.baidu.com',
                    tags: ['0']
                  }
                ]
              },
              {
                text: '子菜单 2',
                href: 'http:://www.baidu.com',
                tags: ['0']
              }
            ]
          },
          {
            text: '父菜单 2',
            href: '#parent2',
            tags: ['0']
          },
          {
            text: '父菜单 3',
            href: '#parent3',
             tags: ['23']
          },
          {
            text: '父菜单 4',
            href: '#parent4',
            tags: ['23333333333']
          },
          {
            text: '父菜单 5',
            href: '#parent5'  ,
            tags: ['0']
          }
        ];

        var $tree = $('#tree').treeview({
          leavls:1,
          showTags:true,
          enableLinks: true,
          data: defaultData
          });
            //最后一次触发节点Id
        var lastSelectedNodeId = null;
        //最后一次触发时间
        var lastSelectTime = null;
        
        //自定义业务方法
        function customBusiness(data){
          alert("双击获得节点名字： "+data.text);
        }

        function clickNode(event, data) {
          if (lastSelectedNodeId && lastSelectTime) {
            var time = new Date().getTime();
            var t = time - lastSelectTime;
            if (lastSelectedNodeId == data.nodeId && t < 300) {
              customBusiness(data);
            }
          }
          lastSelectedNodeId = data.nodeId;
          lastSelectTime = new Date().getTime();
        }
        
        //自定义双击事件
        function customDblClickFun(){
          //节点选中时触发
          $('#tree').on('nodeSelected', function(event, data) {
            clickNode(event, data)
          });
          //节点取消选中时触发
          $('#tree').on('nodeUnselected', function(event, data) {
            clickNode(event, data)
          });
        }
        $('#tree').dblclick( function () { alert("Hello World!"); });
        $(document).ready(function() {
          // customDblClickFun();
        });
      });
</script>
@stop

