@extends('backend/layouts.master')

@section('title', '协作办公')

@section('after-styles-end')
	<link rel="stylesheet" type="text/css" href="/plugins/bootstrap-year-calendar/css/bootstrap-year-calendar.min.css">
	<style type="text/css">
		#calendar{
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
	</style>
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
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
<!-- calendar -->
	<div id="calendar"></div>	

<!-- 弹出模态框 -->
	<form class="form-horizontal" action="/admin/office/schedules" method="POST">
   	 	{{ csrf_field() }}
    	<input type="hidden" name="_method" value="POST">
		<div class="modal modal-fade" id="event-modal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">
		          事件/项目
		        </h4>
		      </div>
		      <div class="modal-body">
		        <input type="hidden" name="event-index" value="">
		          <div class="form-group">
		            <label for="min-date" class="col-sm-4 control-label">名称</label>
		            <div class="col-sm-7">
		              <input name="event-name" type="text" placeholder="事件/项目名称" class="form-control">
		            </div>
		          </div>
		          <div class="form-group">
		            <label for="min-date" class="col-sm-4 control-label">地点</label>
		            <div class="col-sm-7">
		              <input name="event-location" type="text" placeholder="地点" class="form-control">
		            </div>
		          </div>
				  <div class="form-group">
				    <label  class="control-label col-sm-4">备注</label>
				    <div class="col-md-7">
				      <textarea name="remark"  class="form-control" placeholder="备注" type="text"></textarea>
				    </div>
				  </div>
		          <div class="form-group">
		            <label for="min-date" class="col-sm-4 control-label">日期</label>
		            <div class="col-sm-7">
		              <div class="input-group input-daterange" data-provide="datepicker">
		                <input name="event-start-date" type="text" class="form-control" value="2012-04-05">
		                <span class="input-group-addon">至</span>
		                <input name="event-end-date" type="text" class="form-control" value="2012-04-19">
		              </div>
		            </div>
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		        <button type="submit" class="btn btn-primary" id="save-event">
		          保存
		        </button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
@stop

@section('after-scripts-end')
	<script type="text/javascript" src="/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/plugins/bootstrap-year-calendar/js/bootstrap-year-calendar.js"></script>
	<script type="text/javascript" >
	var datajson = <?php echo $dataSource; ?>;
	for (var i = datajson.length - 1; i >= 0; i--) {
		 	datajson[i].name = datajson[i].title;
		 	datajson[i].startDate = new Date(datajson[i].start);
		 	datajson[i].endDate = new Date(datajson[i].end);
		}

		function editEvent(event) {
		    $('#event-modal input[name="event-index"]').val(event ? event.id : '');
		    $('#event-modal input[name="event-name"]').val(event ? event.name : '');
		    $('#event-modal input[name="event-location"]').val(event ? event.location : '');
		    $('#event-modal input[name="event-start-date"]').datetimepicker('update', event ? event.startDate : '');
		    $('#event-modal input[name="event-end-date"]').datetimepicker('update', event ? event.endDate : '');
		    $('#event-modal').modal();
		}

		function deleteEvent(event) {
		    var dataSource = $('#calendar').data('calendar').getDataSource();

		    alert($(dataSource).html() );
		    for(var i in dataSource) {
		        if(dataSource[i].id == event.id) {
		            dataSource.splice(i, 1);
		            break;
		        }
		    }
		    
		    $('#calendar').data('calendar').setDataSource(dataSource);
		}

		function saveEvent() {
		    var event = {
		        id: $('#event-modal input[name="event-index"]').val(),
		        name: $('#event-modal input[name="event-name"]').val(),
		        location: $('#event-modal input[name="event-location"]').val(),
		        startDate: $('#event-modal input[name="event-start-date"]').datetimepicker('getDate'),
		        endDate: $('#event-modal input[name="event-end-date"]').datetimepicker('getDate')

		    }
		    var dataSource = $('#calendar').data('calendar').getDataSource();
		    if(event.id) {
		        for(var i in dataSource) {
		            if(dataSource[i].id == event.id) {
		                dataSource[i].name = event.name;
		                dataSource[i].location = event.location;
		                dataSource[i].startDate = event.startDate;
		                dataSource[i].endDate = event.endDate;
		            }
		        }
		    }
		    else
		    {
		        var newId = 0;
		        for(var i in dataSource) {
		            if(dataSource[i].id > newId) {
		                newId = dataSource[i].id;
		            }
		        }
		        
		        newId++;
		        event.id = newId;
		    
		        dataSource.push(event);
		    }
		    
		    $('#calendar').data('calendar').setDataSource(dataSource);
		    $('#event-modal').modal('hide');
		}

		$(function() {
   			 var redDateTime = new Date(new Date().getFullYear(),
   			 							new Date().getMonth(),
   			 							new Date().getDate()).getTime();
		    $('#calendar').calendar({ 
		        customDayRenderer: function(element, date) {
		            if(date.getTime() == redDateTime) {
                		$(element).css('font-weight', 'bold');
		                $(element).css('background-color', 'red');
		                $(element).css('color', 'white');
		                $(element).css('border-radius', '15px');
		            }
		        },
				language: 'cn',
		        enableContextMenu: true,
		        enableRangeSelection: true,
		        contextMenuItems:[
		            {
		                text: 'Update',
		                click: editEvent
		            }
		        ],
		        selectRange: function(e) {
		            editEvent({ startDate: e.startDate, endDate: e.endDate });
		        },
		        mouseOnDay: function(e) {
		            if(e.events.length > 0) {
		                var content = '';
		                
		                for(var i in e.events) {
		                    content += '<div class="event-tooltip-content">'
		                                    + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
		                                    + '<div class="event-location">' + e.events[i].location + '</div>'
		                                + '</div>';
		                }
		            
		                $(e.element).popover({ 
		                    trigger: 'manual',
		                    container: 'body',
		                    html:true,
		                    content: content
		                });
		                
		                $(e.element).popover('show');
		            }
		        },
		        mouseOutDay: function(e) {
		            if(e.events.length > 0) {
		                $(e.element).popover('hide');
		            }
		        },
		        dayContextMenu: function(e) {
		            $(e.element).popover('hide');
		        },
		        dataSource: datajson
		    });
		    
		    $('#update-language').click(function() {
		        $('#calendar').data('calendar').setLanguage($('#language').val());
		    });
		    $('#save-event').click(function() {
		        saveEvent();
		    });
		});

	</script>

  </div>    
</div>
@endsection