@extends('backend.layouts.master')

@section('after-styles-end')
  @include('backend.includes.css.tree')
@stop

@section('title', '生产管理')

@section('page-header')
    <h1>
        MRP运算
        <small>>>>><span style="color: blue">{{ $product->name }}</span></small><span style="color: red"> {{ $product->need }} </span><small>{{ $product->unit->name }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    @include('backend.includes.breadcrumbs.manufacture')
    <li class="active">MRP运算</li>
@endsection

@section('content')
<div>
  <ul id="myTab" class="nav nav-tabs">
     <li class="active"><a href="#A" data-toggle="tab">毛需求-树</a></li>
     <li><a href="#B" data-toggle="tab">毛需求-表</a></li>
     <li><a href="#C" data-toggle="tab">生产建议</a></li>
     <li><a href="#D" data-toggle="tab">采购建议</a></li>
  </ul>
</div>
<div class="box box-success">
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="A">
        <div class="tree">
          <ul>
            <li>
            <span ><i class="glyphicon glyphicon-minus"></i> {{ $product->name }} </span> <i style="color:#337ab7" >毛需求：{{ $product->need.$product->unit->name}}</i>            
              <ul>
                @foreach($needTree as $content)
                  @if(isset($content['son']))
                    <li>
                      <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                      <ul>
                        @foreach($content['son'] as $content)
                          @if(isset($content['son']))
                            <li>
                              <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                              <ul>
                              @foreach($content['son'] as $content)
                                @if(isset($content['son']))
                                  <li>
                                    <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                    <ul>
                                    @foreach($content['son'] as $content)
                                      @if(isset($content['son']))
                                        <li>
                                          <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                          <ul>
                                          @foreach($content['son'] as $content)
                                            @if(isset($content['son']))
                                              <li>
                                                <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                <ul>
                                                @foreach($content['son'] as $content)
                                                  @if(isset($content['son']))
                                                    <li>
                                                      <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                      <ul>
                                                      @foreach($content['son'] as $content)
                                                        @if(isset($content['son']))
                                                          <li>
                                                            <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                            <ul>
                                                            @foreach($content['son'] as $content)
                                                              @if(isset($content['son']))
                                                                <li>
                                                                  <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                  <ul>
                                                                  @foreach($content['son'] as $content)
                                                                    @if(isset($content['son']))
                                                                      <li>
                                                                        <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                        <ul>
                                                                        @foreach($content['son'] as $content)
                                                                          @if(isset($content['son']))
                                                                            <li>
                                                                              <span><i class="glyphicon glyphicon-minus"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                              <ul>
                                                                              @foreach($content['son'] as $content)
                                                                                <li>
                                                                                  <span><i class="glyphicon glyphicon-leaf"></i>遍历级别不足,请通知管理员</span> <a href="">发送邮件</a>
                                                                                </li>
                                                                              @endforeach 
                                                                              </ul>
                                                                            </li>
                                                                          @else
                                                                            <li>
                                                                              <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                            </li>
                                                                          @endif
                                                                        @endforeach 
                                                                        </ul>
                                                                      </li>
                                                                    @else
                                                                      <li>
                                                                        <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                      </li>
                                                                    @endif
                                                                  @endforeach 
                                                                  </ul>
                                                                </li>
                                                              @else
                                                                <li>
                                                                  <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                                </li>
                                                              @endif
                                                            @endforeach 
                                                            </ul>
                                                          </li>
                                                        @else
                                                          <li>
                                                            <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                          </li>
                                                        @endif
                                                      @endforeach 
                                                      </ul>
                                                    </li>
                                                  @else
                                                    <li>
                                                      <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                                    </li>
                                                  @endif
                                                @endforeach 
                                                </ul>
                                              </li>
                                            @else
                                              <li>
                                                <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                              </li>
                                            @endif
                                          @endforeach 
                                          </ul>
                                        </li>
                                      @else
                                        <li>
                                          <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                        </li>
                                      @endif
                                    @endforeach 
                                    </ul>
                                  </li>
                                @else
                                  <li>
                                    <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                                  </li>
                                @endif
                              @endforeach 
                              </ul>
                            </li>
                          @else
                            <li>
                              <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                            </li>
                          @endif
                        @endforeach 
                      </ul>
                    </li>
                  @else
                    <li>
                      <span><i class="glyphicon glyphicon-leaf"></i>{{ $content->children->name }}</span> <i style="color:#337ab7" >毛需求：{{ $content->need.$content->children->unit->name }}</i>
                    </li>
                  @endif
                @endforeach 
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="tab-pane fade in " id="B">
        <table class=" table table-bordered table-hover " >
          <thead>
            <th> 序号 </th>
            <th class="hidden-xs"> 编号 </th>
            <th> 名称 </th>
            <th class="hidden-xs"> 毛需求 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 类型 </th>    
          </thead>
          <tbody>
            <p hidden>{{ $i = 1 }}</p>
            @foreach ($needTree as $content)
              <tr>
                <td>{{ $i++ }}</td>
                <td class="hidden-xs">{{ $content->children->number }}</td>
                <td>{{ $content->children->name }}</td>
                <td class="hidden-xs">{{ $content->need }}</td>
                <td>{{ $content->children->unit->name }}</td>
                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td>
              </tr>   
              @if(isset($content['son']))
                @foreach ($content['son'] as $content)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td class="hidden-xs">{{ $content->children->number }}</td>
                    <td>{{ $content->children->name }}</td>
                    <td class="hidden-xs">{{ $content->need }}</td>
                    <td>{{ $content->children->unit->name }}</td>
                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td> 
                  </tr>   
                  @if(isset($content['son']))
                    @foreach ($content['son'] as $content)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td class="hidden-xs">{{ $content->children->number }}</td>
                        <td>{{ $content->children->name }}</td>
                        <td class="hidden-xs">{{ $content->need }}</td>
                        <td>{{ $content->children->unit->name }}</td>
                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td> 
                      </tr>    
                      @if(isset($content['son']))
                        @foreach ($content['son'] as $content)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td class="hidden-xs">{{ $content->children->number }}</td>
                            <td>{{ $content->children->name }}</td>
                            <td class="hidden-xs">{{ $content->need }}</td>
                            <td>{{ $content->children->unit->name }}</td>
                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td> 
                          </tr>  
                          @if(isset($content['son']))
                            @foreach ($content['son'] as $content)
                              <tr>
                                <td>{{ $i++ }}</td>
                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                <td>{{ $content->children->name }}</td>
                                <td class="hidden-xs">{{ $content->need }}</td>
                                <td>{{ $content->children->unit->name }}</td>
                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td>  
                              </tr>   
                              @if(isset($content['son']))
                                @foreach ($content['son'] as $content)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                    <td>{{ $content->children->name }}</td>
                                    <td class="hidden-xs">{{ $content->need }}</td>
                                    <td>{{ $content->children->unit->name }}</td>
                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td> 
                                  </tr>    
                                  @if(isset($content['son']))
                                    @foreach ($content['son'] as $content)
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="hidden-xs">{{ $content->children->number }}</td>
                                        <td>{{ $content->children->name }}</td>
                                        <td class="hidden-xs">{{ $content->need }}</td>
                                        <td>{{ $content->children->unit->name }}</td>
                                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td>
                                      </tr> 
                                      @if(isset($content['son']))
                                        @foreach ($content['son'] as $content)
                                          <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="hidden-xs">{{ $content->children->number }}</td>
                                            <td>{{ $content->children->name }}</td>
                                            <td class="hidden-xs">{{ $content->need }}</td>
                                            <td>{{ $content->children->unit->name }}</td>
                                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td>  
                                          </tr>   
                                          @if(isset($content['son']))
                                            @foreach ($content['son'] as $content)
                                              <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                                <td>{{ $content->children->name }}</td>
                                                <td class="hidden-xs">{{ $content->need }}</td>
                                                <td>{{ $content->children->unit->name }}</td>
                                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td>  
                                              </tr>    
                                              @if(isset($content['son']))
                                                @foreach ($content['son'] as $content)
                                                  <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                                    <td>{{ $content->children->name }}</td>
                                                    <td class="hidden-xs">{{ $content->need }}</td>
                                                    <td>{{ $content->children->unit->name }}</td>
                                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name }} </td> 
                                                  </tr>  
                                                @endforeach
                                              @endif
                                            @endforeach
                                          @endif 
                                        @endforeach
                                      @endif 
                                    @endforeach
                                  @endif
                                @endforeach
                              @endif 
                            @endforeach
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                  @endif 
                @endforeach
              @endif
            @endforeach  
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade in " id="C">
        <table class=" table table-bordered table-hover " >
          <thead>
            <th> 序号 </th>
            <th class="hidden-xs"> 编号 </th>
            <th> 名称 </th>
            <th class="hidden-xs">生产数量 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 类型 </th>    
          </thead>
          <tbody>
            <p hidden>{{ $i = 1 }}</p>
            @foreach ($needTree as $content)
              @if($content->children->type_id == 37)
              <tr>
                <td>{{ $i++ }}</td>
                <td class="hidden-xs">{{ $content->children->number }}</td>
                <td>{{ $content->children->name }}</td>
                <td class="hidden-xs">{{ $content->need }}</td>
                <td>{{ $content->children->unit->name }}</td>
                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
              </tr>
              @endif  
                @if(isset($content['son']))
                  @foreach ($content['son'] as $content)
                    @if( $content->children->type_id == 37)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td class="hidden-xs">{{ $content->children->number }}</td>
                      <td>{{ $content->children->name }}</td>
                      <td class="hidden-xs">{{ $content->need }}</td>
                      <td>{{ $content->children->unit->name }}</td>
                      <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                    </tr>  
                    @endif 
                    @if(isset($content['son']))
                    @foreach ($content['son'] as $content)
                      @if( $content->children->type_id == 37)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td class="hidden-xs">{{ $content->children->number }}</td>
                        <td>{{ $content->children->name }}</td>
                        <td class="hidden-xs">{{ $content->need }}</td>
                        <td>{{ $content->children->unit->name }}</td>
                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                      </tr>   
                      @endif 
                      @if(isset($content['son']))
                        @foreach ($content['son'] as $content)
                          @if( $content->children->type_id == 37)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td class="hidden-xs">{{ $content->children->number }}</td>
                            <td>{{ $content->children->name }}</td>
                            <td class="hidden-xs">{{ $content->need }}</td>
                            <td>{{ $content->children->unit->name }}</td>
                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                          </tr>
                          @endif 
                          @if(isset($content['son']))
                            @foreach ($content['son'] as $content)
                              @if( $content->children->type_id == 37)
                              <tr>
                                <td>{{ $i++ }}</td>
                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                <td>{{ $content->children->name }}</td>
                                <td class="hidden-xs">{{ $content->need }}</td>
                                <td>{{ $content->children->unit->name }}</td>
                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                              </tr>
                              @endif   
                              @if(isset($content['son']))
                                @foreach ($content['son'] as $content)
                                  @if( $content->children->type_id == 37)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                    <td>{{ $content->children->name }}</td>
                                    <td class="hidden-xs">{{ $content->need }}</td>
                                    <td>{{ $content->children->unit->name }}</td>
                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                                  </tr>
                                  @endif    
                                  @if(isset($content['son']))
                                    @foreach ($content['son'] as $content)
                                      @if( $content->children->type_id == 37)
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="hidden-xs">{{ $content->children->number }}</td>
                                        <td>{{ $content->children->name }}</td>
                                        <td class="hidden-xs">{{ $content->need }}</td>
                                        <td>{{ $content->children->unit->name }}</td>
                                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>    
                                      </tr>
                                      @endif 
                                      @if(isset($content['son']))
                                        @foreach ($content['son'] as $content)
                                          @if( $content->children->type_id == 37)
                                          <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="hidden-xs">{{ $content->children->number }}</td>
                                            <td>{{ $content->children->name }}</td>
                                            <td class="hidden-xs">{{ $content->need }}</td>
                                            <td>{{ $content->children->unit->name }}</td>
                                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                                          </tr>
                                          @endif   
                                          @if(isset($content['son']))
                                            @foreach ($content['son'] as $content)
                                              @if( $content->children->type_id == 37)
                                              <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                                <td>{{ $content->children->name }}</td>
                                                <td class="hidden-xs">{{ $content->need }}</td>
                                                <td>{{ $content->children->unit->name }}</td>
                                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>    
                                              </tr> 
                                              @endif   
                                              @if(isset($content['son']))
                                                @foreach ($content['son'] as $content)
                                                  @if( $content->children->type_id == 37)
                                                  <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                                    <td>{{ $content->children->name }}</td>
                                                    <td class="hidden-xs">{{ $content->need }}</td>
                                                    <td>{{ $content->children->unit->name }}</td>
                                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                                                  </tr> 
                                                  @endif  
                                                @endforeach
                                              @endif
                                            @endforeach
                                          @endif 
                                        @endforeach
                                      @endif 
                                    @endforeach
                                  @endif
                                @endforeach
                              @endif 
                            @endforeach
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                  @endif 
                @endforeach
              @endif
            @endforeach  
          </tbody>
        </table>
      </div>      
      <div class="tab-pane fade in " id="D">
        <table class=" table table-bordered table-hover " >
          <thead>
            <th> 序号 </th>
            <th class="hidden-xs"> 编号 </th>
            <th> 名称 </th>
            <th class="hidden-xs">采购数量 </th>
            <th> 单位 </th>
            <th class="hidden-xs"> 类型 </th>    
          </thead>
          <tbody>
            <p hidden>{{ $i = 1 }}</p>
            @foreach ($needTree as $content)
              @if($content->total < $content->need && $content->children->type_id == 36)
              <tr>
                <td>{{ $i++ }}</td>
                <td class="hidden-xs">{{ $content->children->number }}</td>
                <td>{{ $content->children->name }}</td>
                <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                <td>{{ $content->children->unit->name }}</td>
                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
              </tr>
              @endif  
                @if(isset($content['son']))
                  @foreach ($content['son'] as $content)
                    @if($content->total < $content->need && $content->children->type_id == 36)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td class="hidden-xs">{{ $content->children->number }}</td>
                      <td>{{ $content->children->name }}</td>
                      <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                      <td>{{ $content->children->unit->name }}</td>
                      <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                    </tr>  
                    @endif 
                    @if(isset($content['son']))
                    @foreach ($content['son'] as $content)
                      @if($content->total < $content->need && $content->children->type_id == 36)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td class="hidden-xs">{{ $content->children->number }}</td>
                        <td>{{ $content->children->name }}</td>
                        <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                        <td>{{ $content->children->unit->name }}</td>
                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                      </tr>   
                      @endif 
                      @if(isset($content['son']))
                        @foreach ($content['son'] as $content)
                          @if($content->total < $content->need && $content->children->type_id == 36)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td class="hidden-xs">{{ $content->children->number }}</td>
                            <td>{{ $content->children->name }}</td>
                            <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                            <td>{{ $content->children->unit->name }}</td>
                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                          </tr>
                          @endif 
                          @if(isset($content['son']))
                            @foreach ($content['son'] as $content)
                              @if($content->total < $content->need && $content->children->type_id == 36)
                              <tr>
                                <td>{{ $i++ }}</td>
                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                <td>{{ $content->children->name }}</td>
                                <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                <td>{{ $content->children->unit->name }}</td>
                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                              </tr>
                              @endif   
                              @if(isset($content['son']))
                                @foreach ($content['son'] as $content)
                                  @if($content->total < $content->need && $content->children->type_id == 36)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                    <td>{{ $content->children->name }}</td>
                                    <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                    <td>{{ $content->children->unit->name }}</td>
                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                                  </tr>
                                  @endif    
                                  @if(isset($content['son']))
                                    @foreach ($content['son'] as $content)
                                      @if($content->total < $content->need && $content->children->type_id == 36)
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="hidden-xs">{{ $content->children->number }}</td>
                                        <td>{{ $content->children->name }}</td>
                                        <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                        <td>{{ $content->children->unit->name }}</td>
                                        <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>    
                                      </tr>
                                      @endif 
                                      @if(isset($content['son']))
                                        @foreach ($content['son'] as $content)
                                          @if($content->total < $content->need && $content->children->type_id == 36)
                                          <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="hidden-xs">{{ $content->children->number }}</td>
                                            <td>{{ $content->children->name }}</td>
                                            <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                            <td>{{ $content->children->unit->name }}</td>
                                            <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>   
                                          </tr>
                                          @endif   
                                          @if(isset($content['son']))
                                            @foreach ($content['son'] as $content)
                                              @if($content->total < $content->need && $content->children->type_id == 36)
                                              <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="hidden-xs">{{ $content->children->number }}</td>
                                                <td>{{ $content->children->name }}</td>
                                                <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                                <td>{{ $content->children->unit->name }}</td>
                                                <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>    
                                              </tr> 
                                              @endif   
                                              @if(isset($content['son']))
                                                @foreach ($content['son'] as $content)
                                                  @if($content->total < $content->need&& $content->children->type_id == 36)
                                                  <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td class="hidden-xs">{{ $content->children->number }}</td>
                                                    <td>{{ $content->children->name }}</td>
                                                    <td class="hidden-xs">{{ $content->need - $content->total }}</td>
                                                    <td>{{ $content->children->unit->name }}</td>
                                                    <td class="hidden-xs">{{ App\Models\System\Option::find($content->children->type_id)->name}}</td>  
                                                  </tr> 
                                                  @endif  
                                                @endforeach
                                              @endif
                                            @endforeach
                                          @endif 
                                        @endforeach
                                      @endif 
                                    @endforeach
                                  @endif
                                @endforeach
                              @endif 
                            @endforeach
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                  @endif 
                @endforeach
              @endif
            @endforeach  
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop 

@section('after-scripts-end')
<script type="text/javascript">
  $(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', '关闭');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', '展开').find(' > i').removeClass('glyphicon glyphicon-minus').addClass('glyphicon glyphicon-plus');
        } else {
            children.show('fast');
            $(this).attr('title', '关闭').find(' > i').removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-minus');
        }
        e.stopPropagation();
    });
});
</script>
@stop

