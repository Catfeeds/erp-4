@extends('backend/layouts.master')

@section('title', '客户列表')

@section('after-styles-end')
	<link rel="stylesheet" type="text/css" href="/calendar/calendar-year/bootstrap-3.3.5/css/bootstrap.min.css" />
	<!-- <link rel="stylesheet" type="text/css" href="/calendar/css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="/calendar/calendar-year/css/bootstrap-year-calendar.min.css">
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
<div class="box box-danger">
  <div class="box-body">
	<div id="calendar"></div>	
	<div class="modal modal-fade" id="event-modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title">
	          Event
	        </h4>
	      </div>
	      <div class="modal-body">
	        <input type="hidden" name="event-index" value="">
	        <form class="form-horizontal">
	          <div class="form-group">
	            <label for="min-date" class="col-sm-4 control-label">Name</label>
	            <div class="col-sm-7">
	              <input name="event-name" type="text" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label for="min-date" class="col-sm-4 control-label">Location</label>
	            <div class="col-sm-7">
	              <input name="event-location" type="text" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label for="min-date" class="col-sm-4 control-label">Dates</label>
	            <div class="col-sm-7">
	              <div class="input-group input-daterange" data-provide="datepicker">
	                <input name="event-start-date" type="text" class="form-control" value="2012-04-05">
	                <span class="input-group-addon">to</span>
	                <input name="event-end-date" type="text" class="form-control" value="2012-04-19">
	              </div>
	            </div>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="save-event">
	          Save
	        </button>
	      </div>
	    </div>
	  </div>
	</div>
	

@section('after-scripts-end')
	<script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
	<script type="text/javascript" src="/calendar/calendar-year/bootstrap-3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/calendar/calendar-year/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/calendar/calendar-year/js/bootstrap-year-calendar.min.js"></script>
	<script type="text/javascript" src="/calendar/calendar-year/js/bootstrap-popover.js"></script>
	<script type="text/javascript">
		function editEvent(event) {
		    $('#event-modal input[name="event-index"]').val(event ? event.id : '');
		    $('#event-modal input[name="event-name"]').val(event ? event.name : '');
		    $('#event-modal input[name="event-location"]').val(event ? event.location : '');
		    $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
		    $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
		    $('#event-modal').modal();
		}

		function deleteEvent(event) {
		    var dataSource = $('#calendar').data('calendar').getDataSource();

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
		        startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
		        endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
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
		    $('#calendar').calendar({ 
		        enableContextMenu: true,
		        enableRangeSelection: true,
		        contextMenuItems:[
		            {
		                text: 'Update',
		                click: editEvent
		            },
		            {
		                text: 'Delete',
		                click: deleteEvent
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
		        dataSource: [
		            {
		                id: 0,
		                name: 'Google I/O',
		                location: 'San Francisco, CA',
		                startDate: new Date(2015, 1, 29),
		                endDate: new Date(2015, 4, 29)
		            },
		            {
		                id: 1,
		                name: 'Microsoft Convergence',
		                location: 'New Orleans, LA',
		                startDate: new Date(2015, 2, 16),
		                endDate: new Date(2015, 2, 19)
		            },
		            {
		                id: 2,
		                name: 'Microsoft Build Developer Conference',
		                location: 'San Francisco, CA',
		                startDate: new Date(2015, 3, 29),
		                endDate: new Date(2015, 4, 1)
		            },
		            {
		                id: 3,
		                name: 'Apple Special Event',
		                location: 'San Francisco, CA',
		                startDate: new Date(2015, 8, 1),
		                endDate: new Date(2015, 8, 1)
		            },
		            {
		                id: 4,
		                name: 'Apple Keynote',
		                location: 'San Francisco, CA',
		                startDate: new Date(2015, 8, 9),
		                endDate: new Date(2015, 8, 9)
		            },
		            {
		                id: 5,
		                name: 'Chrome Developer Summit',
		                location: 'Mountain View, CA',
		                startDate: new Date(2015, 10, 17),
		                endDate: new Date(2015, 10, 18)
		            },
		            {
		                id: 6,
		                name: 'F8 2015',
		                location: 'San Francisco, CA',
		                startDate: new Date(2015, 2, 25),
		                endDate: new Date(2015, 2, 26)
		            },
		            {
		                id: 7,
		                name: 'Yahoo Mobile Developer Conference',
		                location: 'New York',
		                startDate: new Date(2015, 7, 25),
		                endDate: new Date(2015, 7, 26)
		            },
		            {
		                id: 8,
		                name: 'Android Developer Conference',
		                location: 'Santa Clara, CA',
		                startDate: new Date(2015, 11, 1),
		                endDate: new Date(2015, 11, 4)
		            },
		            {
		                id: 9,
		                name: 'LA Tech Summit',
		                location: 'Los Angeles, CA',
		                startDate: new Date(2015, 10, 17),
		                endDate: new Date(2015, 10, 17)
		            }
		        ]
		    });
		    
		    $('#save-event').click(function() {
		        saveEvent();
		    });
		});
	</script>

  </div>    
</div>
@endsection
@stop