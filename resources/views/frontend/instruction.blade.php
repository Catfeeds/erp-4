@extends('frontend.layouts.master')

@section('content')
<div class="content">   
    <ul class="nav nav-tabs">
    <li class="active"><a href="#suttle" data-toggle="tab">全部</a></li>
    <li><a href="#process_time" data-toggle="tab">线圈</a></li>
    <li><a href="#fazuoti" data-toggle="tab">阀座体</a></li>
    <li><a href="#danfa" data-toggle="tab">单阀</a></li>
    <li><a href="#fazuo" data-toggle="tab">阀座</a></li>
    <li><a href="#dongtiexin" data-toggle="tab">动铁芯</a></li>
    <li><a href="#dongtiemao" data-toggle="tab">动铁帽</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="suttle">
    <img src="../luster/DW_324结构图/电磁阀结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="process_time">
    <img src="../luster/DW_324结构图/线圈组件结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane " id="fazuoti">
    <img src="../luster/DW_324结构图/阀座体结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane " id="danfa">
    <img src="../luster/DW_324结构图/单阀结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane " id="fazuo">
    <img src="../luster/DW_324结构图/阀座结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane " id="dongtiexin">
    <img src="../luster/DW_324结构图/动铁芯结构图.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane " id="dongtiemao">
    <img src="../luster/DW_324结构图/动铁帽结构图.png" class="img-responsive" alt="Responsive image">
    </div>
</div>
@endsection