<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menus.language-picker.language') }} <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
  <li>{!! link_to('lang/cn', trans('menus.language-picker.langs.cn')) !!}</li>
  <li>{!! link_to('lang/en', trans('menus.language-picker.langs.en')) !!}</li>
</ul>