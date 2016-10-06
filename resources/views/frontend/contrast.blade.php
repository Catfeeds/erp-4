@extends('frontend.layouts.master')

@section('content')
<div class="content">   
    <ul class="nav nav-tabs">
    <li class="active"><a href="#summary" data-toggle="tab">汇总</a></li>
    <li><a href="#DW324" data-toggle="tab">莱思特</a></li>
    <li><a href="#FESTO_1" data-toggle="tab">FESTO_1</a></li>
    <li><a href="#FESTO_2" data-toggle="tab">FESTO_2</a></li>
    <li><a href="#SMC" data-toggle="tab">SMC</a></li>
    <li><a href="#MAC" data-toggle="tab">MAC</a></li>
    <li><a href="#structure" data-toggle="tab">结构</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="summary">
      <img src="../luster/电磁阀对比/summary.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="DW324">
      <img src="../luster/电磁阀对比/DW324a.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="FESTO_1">
      <img src="../luster/电磁阀对比/FESTO_1.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="FESTO_2">
      <img src="../luster/电磁阀对比/FESTO_2.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="SMC">
      <img src="../luster/电磁阀对比/SMC.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="MAC">
      <img src="../luster/电磁阀对比/MAC.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="tab-pane" id="structure">

    <div class="box box-success">
      <img src="../luster/电磁阀对比/结构图_整阀.png" class="img-responsive" alt="Responsive image">
      <img src="../luster/电磁阀对比/结构图_K2.png" class="img-responsive" alt="Responsive image">
    </div>
</div>
@endsection