@extends('backend.layouts.master')

@section('title', '系统管理')

@section('page-header')
    <h1>
        数据填充
        <small>>>>></small>
        <span style="color: blue">{{$ucfirst}}</span>
        <small>数据模型</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.system')
    <li class="active">数据填充</li>
@endsection

@section('content')
<!-- @include('backend.luster.logistics.product.includes.partials.header-buttons') -->
<div class="box box-success">
  <div class="box-body">
  @foreach ($contents as $content)
    @if ($ucfirst == 'Thread' || $ucfirst == 'Message' || $ucfirst == 'Participant' )
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$role_model = 'Cmgmyr\Messenger\Models\{{$ucfirst}}'; <br>      
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}} = new $role_model; <br>
      @for ($i=0; $i<$col;$i++ )
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}}->{{$column[$i]}} = '{{$content->$column[$i]}}'; <br>
      @endfor    
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}}->save(); <br> <br>
    @else
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$role_model = 'App\Models\Luster\{{$ucfirst}}'; <br>      
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}} = new $role_model; <br>
      @for ($i=0; $i<$col;$i++ )
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}}->{{$column[$i]}} = '{{$content->$column[$i]}}'; <br>
      @endfor    
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp${{$ucfirst}}->save(); <br> <br>
    @endif
  @endforeach
  </div>
</div>
@stop 

