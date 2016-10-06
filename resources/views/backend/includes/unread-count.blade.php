<?php 

$user_id = Illuminate\Support\Facades\Auth::User()->id;
$unread = Cmgmyr\Messenger\Models\Participant::where('last_read' , null)->where('user_id' , $user_id)->get();
$count = Cmgmyr\Messenger\Models\Participant::where('last_read' , null)->where('user_id' , $user_id)->count();


?>