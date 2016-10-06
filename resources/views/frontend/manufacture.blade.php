@extends('frontend.layouts.master')
@section('after-styles-end')
<style type="text/css">
  .tree {
      min-height:20px;
      padding:19px;
      margin-bottom:20px;
      background-color:#fbfbfb;
      border:1px solid #999;
      -webkit-border-radius:4px;
      -moz-border-radius:4px;
      border-radius:4px;
      -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
      -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
      box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
  }
  .tree li {
      list-style-type:none;
      margin:0;
      padding:10px 5px 0 5px;
      position:relative
  }
  /*上下级连线*/
  .tree li::before, .tree li::after {
      content:'';
      left:-20px;
      position:absolute;
      right:auto
  }
  .tree li::before {
      border-left:1px solid #999;
      bottom:50px;
      height:100%;
      top:0;
      width:1px
  }
  .tree li::after {
      border-top:1px solid #999;
      height:20px;
      top:25px;
      width:25px
  }
  .tree li span {
      -moz-border-radius:5px;
      -webkit-border-radius:5px;
      border:1px solid #999;
      border-radius:5px;
      display:inline-block;
      padding:3px 8px;
      text-decoration:none
  }
  .tree li.parent_li>span {
      cursor:pointer
  }
  .tree>ul>li::before, .tree>ul>li::after {
      border:0
  }
  .tree li:last-child::before {
      height:25px
  }
  .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
      background:#eee;
      border:1px solid #94a0b4;
      color:#000
  }
</style>
@stop
@section('content')
<div class="tree well">
    <ul>
        <li>
            <span class="btn brn-success"><i class="glyphicon glyphicon-minus"></i> Parent</span> <a href="">Goes somewhere</a>
            <ul>
                <li>
                  <span><i class="glyphicon glyphicon-minus"></i> Child</span> <a href="">Goes somewhere</a>
                    <ul>
                        <li>
                          <span><i class="glyphicon glyphicon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                        <li>
                          <span><i class="glyphicon glyphicon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                        <li>
                          <span><i class="glyphicon glyphicon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>

@endsection

@section('after-scripts-end')
<script type="text/javascript">
  $(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', '关闭');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', '展开').find(' > i').removeClass('glyphicon glyphicon-minus').addClass('glyphicon glyphicon-plus');
        } else {
            children.show('fast');
            $(this).attr('title', '关闭').find(' > i').removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-minus');
        }
        e.stopPropagation();
    });
});
</script>
@stop

