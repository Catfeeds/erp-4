<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- The user image in the navbar-->
  <img src="{!! asset(access()->user()->avatar) !!}" class="user-image" alt="User Image"/>
  <!-- hidden-xs hides the username on small devices so only the image appears. -->
  <span class="hidden-xs">{{ access()->user()->name }}</span>
</a>
<ul class="dropdown-menu">
  <!-- The user image in the menu -->
  <li class="user-header">
    <img src="{!! asset(access()->user()->avatar) !!}" class="img-circle" alt="User Image" />
    <p>
      {{ access()->user()->name }} - {{ trans('roles.web_developer') }}
      <small>{{ trans('strings.member_since') }} {{ access()->user()->created_at }}</small>
    </p>
  </li>
  <!-- Menu Body -->
  <li style="padding-bottom: 35px" class="modal-body">
    <div class="col-xs-2 text-center">
      <buntton><a href="{!! route('backend.luster.system.theme','blue') !!}" style="background-color: #3c8dbc" class="btn btn-default btn-flat"></a></buntton>
    </div>
    <div class="col-xs-2 text-center">
      <buntton><a href="{!! route('backend.luster.system.theme','red') !!}" style="background-color: #dd4b39" class="btn btn-default btn-flat"></a></buntton>
    </div>
    <div class="col-xs-2 text-center">
      <buntton><a href="{!! route('backend.luster.system.theme','black') !!}" style="background-color: #fff " class="btn btn-default btn-flat"></a></buntton>
    </div>
    <div class="col-xs-2 text-center">
      <buntton ><a href="{!! route('backend.luster.system.theme','purple') !!}" style="background-color: #605ca8" class="btn btn-default btn-flat"></a></buntton>
    </div>
    <div class="col-xs-2 text-center">
      <buntton ><a href="{!! route('backend.luster.system.theme','green') !!}" style="background-color: #00a65a" class="btn btn-default btn-flat"></a></buntton>
    </div>
    <div class="col-xs-2 text-center">
      <buntton ><a href="{!! route('backend.luster.system.theme','yellow') !!}" style="background-color: #f39c12" class="btn btn-default btn-flat"></a></buntton>
    </div>
  </li>
  <!-- Menu Footer-->
  <li class="user-footer">
    <div class="pull-left">
      <a href="{!! route('backend.luster.system.user','information') !!}" class="btn btn-default btn-flat">信息</a>
    </div>
    <div class="pull-right">
      <a href="{!!url('auth/logout')!!}" class="btn btn-default btn-flat">{{ trans('navs.logout') }}</a>
    </div>
  </li>
</ul>