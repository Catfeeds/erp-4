@extends('backend/layouts.master')

@section('title', '协作办公')

@section('after-styles-end')<!-- 
	<link rel="stylesheet" href="/plugins/bootstrap-calendar/components/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" href="/plugins/bootstrap-calendar/components/bootstrap3/css/bootstrap-theme.min.css"> -->
	<link rel="stylesheet" href="/plugins/bootstrap-calendar/css/calendar.css">
@endsection

@section('page-header')
    <h1>
        日程安排
        <small>日程安排</small>
    </h1>
@endsection


@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">日程管理</li>
@endsection
@section('content')
<div class="box box-success">
  <div class="box-body">
	<div class="container">
		<div class="page-header">
			<div class="pull-right form-inline">
				<div class="btn-group">
					<button class="btn btn-primary" data-calendar-nav="prev"><< </button>
					<button class="btn btn-default" data-calendar-nav="today">今天</button>
					<button class="btn btn-primary" data-calendar-nav="next"> >></button>
				</div>
				<div class="btn-group">
					<button class="btn btn-warning" data-calendar-view="year">年</button>
					<button class="btn btn-warning active" data-calendar-view="month">月</button>
					<button class="btn btn-warning" data-calendar-view="week">周</button>
					<button class="btn btn-warning" data-calendar-view="day">日</button>
				</div>
			</div>

			<h3></h3>
			<small>要查看示例事件定位到2013年3月</small>
		</div>

		<div class="row">
			<div class="col-md-9">
				<div id="calendar"></div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<select id="first_day" class="form-control">
						<option value="" selected="selected">每周的第一天</option>
						<option value="2">星期日</option>
						<option value="1">星期一</option>
					</select>
					<select id="language" class="form-control">
						<option value="">选择语言（默认值：-US）</option>
						<option value="bg-BG">Bulgarian</option>
						<option value="zh-CN">简体中文</option>
					</select>
					<label class="checkbox">
						<input type="checkbox" value="#events-modal" id="events-in-modal"> 在模态窗口中打开事件
					</label>
					<label class="checkbox">
						<input type="checkbox" id="format-12-hours"> 12小时格式
					</label>
					<label class="checkbox">
						<input type="checkbox" id="show_wb" checked> 显示周
					</label>
					<label class="checkbox">
						<input type="checkbox" id="show_wbn" checked> 显示周数
					</label>
				</div>

				<h4>事件</h4>
				<small>该列表填充动态事件</small>
				<ul id="eventlist" class="nav nav-list"></ul>
			</div>
		</div>

		<div class="clearfix"></div>
		<br><br>
		<div id="disqus_thread"></div>

		<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">事件</h3>
					</div>
					<div class="modal-body" style="height: 400px">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>  
	</div>
  </div>
</div>
@stop
@section('after-scripts-end')<!-- 
	<script type="text/javascript" src="/plugins/bootstrap-calendar/components/jquery/jquery.min.js"></script> -->
	<script type="text/javascript" src="/plugins/bootstrap-calendar/components/underscore/underscore-min.js"></script><!-- 
	<script type="text/javascript" src="/plugins/bootstrap-calendar/components/bootstrap3/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="/plugins/bootstrap-calendar/components/jstimezonedetect/jstz.min.js"></script>
	<script type="text/javascript" src="/plugins/bootstrap-calendar/js/language/bg-BG.js"></script>	
	<script type="text/javascript" src="/plugins/bootstrap-calendar/js/language/zh-CN.js"></script>

	<script type="text/javascript" src="/plugins/bootstrap-calendar/js/calendar.js"></script>
	<script type="text/javascript" src="/plugins/bootstrap-calendar/js/app.js"></script>

<script type="text/javascript">
	
</script>
@endsection
