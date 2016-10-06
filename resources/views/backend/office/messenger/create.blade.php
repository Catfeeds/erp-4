@extends('backend.layouts.master')

@section('title', '协同办公')

@section('page-header')
    <h1>
        新建信息
        <small>新建信息内容</small>
        <a class="btn btn-danger btn-xs " href="/admin/office/bills"><b>返 回</b></a>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.office')
    <li class="active">新建信息</li>
@endsection

@section('content')
<div class="box box-success">
    <div class="box-body">
        <div class="container">
            {!! Form::open(['route' => 'messages.store']) !!}
            <div class="col-md-6">
                <!-- Subject Form Input -->
                <div class="form-group">
                    {!! Form::label('subject', '主题', ['class' => 'control-label']) !!}
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Message Form Input -->
                <div class="form-group">
                    {!! Form::label('message', '内容', ['class' => 'control-label']) !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                </div>

                @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{!!$user->name!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->name!!}</label>
                    @endforeach
                </div>
                @endif

                <!-- Submit Form Input -->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop