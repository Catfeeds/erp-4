<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-bell-o"></i>
  <!-- <span class="label label-warning">0</span> -->
</a>
<ul class="dropdown-menu">
  <li class="header">{{ trans_choice('strings.you_have.notifications', 1) }}</li>
  <li>
    <!-- Inner Menu: contains the notifications -->
    <ul class="menu">
      <li><!-- start notification -->
        <a href="#">
          <i class="fa fa-users text-aqua">今天有 5 个新成员加入</i> 
        </a>
      </li><!-- end notification -->
    </ul>
  </li>
  <li class="footer"><a href="#">{{ trans('strings.see_all.notifications') }}</a></li>
</ul>