@extends('frontend.layouts.master')

@section('content')
<div class="content">   
    <ul class="nav nav-tabs">
    <li class="active"><a href="#suttle" data-toggle="tab">部品重量</a></li>
    <li><a href="#process_time" data-toggle="tab">工时统计</a></li>
    <li><a href="#other" data-toggle="tab">其它</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="suttle">
      @foreach($parts as $content)
        @if(!($content->suttle == 0))
          <div class="btn btn-success" style="margin:5px 0 0 0"> <img class="img-rounded img-responsive" src="{{ $content->hasOnePicture['logo'] }}" alt="Product image">      
            <h4 class="text-center" style="margin:2px">{{$content->suttle}}<small>克/{{$content->unit}}</small></h4>            
            <h5 class="text-center" style="margin:2px ; color:#428bca">{{ $content->name }}</h5>
          </div>
        @endif          
      @endforeach
    </div>
    <div class="tab-pane" id="process_time">
      加工时间
    </div>
    <div class="tab-pane " id="other">
    ...
    </div>
</div>
@endsection