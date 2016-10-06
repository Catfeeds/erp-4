<?php 

$user_id = Illuminate\Support\Facades\Auth::User()->id;
$unreads = Cmgmyr\Messenger\Models\Participant::where('last_read' , null)->where('user_id' , $user_id)->get();
$count = Cmgmyr\Messenger\Models\Participant::where('last_read' , null)->where('user_id' , $user_id)->count();


?>


<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-envelope-o"></i>
  @if ($count > 0)
  <span class="label label-success">{{$count}}</span>
  @endif
</a>
<ul class="dropdown-menu">
	<li class="header">{{ trans_choice('strings.you_have.messages', $count , ['number' => $count]) }}</li>
	@foreach ($unreads as $key=>$message)
		<li>
		    <!-- inner menu: contains the messages -->
		    <ul class="menu">
		      	<li><!-- start message -->
		        <a href="/admin/luster/messages/{{ $message->thread->id or ''}}">
		          <div class="pull-left">
		            <!-- User Image -->
		            <img src="/img/{!! $message->user->avatar !!}" class="img-circle" alt="User Image"/>
		          </div>
		          <!-- Message title and timestamp -->
		          <h4>
		            {!! $message->user->name !!}
		            <small><i class="fa fa-clock-o"></i> {!! $message->created_at->diffForHumans() !!}</small>
		          </h4>
		          <!-- The message -->
		          <p>{!! $message->thread->subject or ''!!}</p>
		        </a>
		      	</li><!-- end message -->
		    </ul><!-- /.menu -->
		</li>
	 @endforeach
	<li class="footer"><a href="/admin/luster/messages">{{ trans('strings.see_all.messages') }}</a></li>
</ul>