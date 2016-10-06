@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        信息管理
        <small>信息记录</small>
        <a class="btn btn-success btn-xs" href="{{ URL('admin/office/messages/create') }}"><b>新 建</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">信息管理</li>
@endsection

@section('content')
@include('backend.luster.office.messenger.includes.partials.header-buttons')
<div class="box box-success">
    <div class="box-body">
        <div class="container">
            @if (Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {!! Session::get('error_message') !!}
                </div>
            @endif
            @if($threads->count() > 0)
                @foreach($threads as $thread)
                <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                <div id="thread_list_{{$thread->id}}" class="media alert {!!$class!!}">
                    <h4 >{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                    <p id="thread_list_{{$thread->id}}_text">{!! str_limit($thread->latestMessage->body, 50) !!}</p>
                    <p><small><strong>相关人员:</strong> {!! $thread->participantsString(Auth::id(), ['name']) !!}</small></p>
                </div>
                @endforeach
            @else
                <p>Sorry, no threads.</p>
            @endif
        </div>
    </div>
</div>
@stop 