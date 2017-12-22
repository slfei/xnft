<?php
     $titleUnvisible  =  isset($titleUnvisible) ? $titleUnvisible : false;
     $show_title  =  isset($show_title) ? $show_title : false;
?>

<div class="wt-thumbnail">
    <div class="thumbnail" >
        <a href="/course/{{ isset($data['course_id']) ? $data['course_id'] : '' }}" target="_blank"><img src="{{$data['course_img']}}" alt="..."></a>
        <div class="caption @if($show_title) collection-caption @endif">
            @if(!$titleUnvisible || $show_title)
            <div class="title">
                <span class="span1" title="{{$data['course_name']}}"><a href="/course/{{ isset($data['course_id']) ? $data['course_id'] : '' }}" target="_blank">{{$data['course_name']}}</a></span>
    
                <!-- <span class="span2">{{$data['course_name']}}</span> -->
            </div>
            @endif
             @if(!$show_title)
            <p class="description @if(!$titleUnvisible) grey @endif">@if(isset($data['sentence'])) {{ $data['sentence'] }} @endif</p>
            @endif
            <p class="other">
                @if($data['type']=='1')
                    <span class="free">免费</span>
                @else
                    @if($data['cur_price']<$data['price'])
                      <span class="price">￥{{$data['cur_price']}}</span>&nbsp;<span class="nowprice">￥{{$data['price']}}</span>
                    @else
                      <span class="price">￥{{$data['price']}}</span>
                    @endif
                @endif
                <span class="pull-right lecturer">
                    <a href="@if($data['from_type']=='institute'||$data['from_type']==2) /institute/homepage/{{$data['from_id']}} @else /personal/homepage/{{$data['from_id']}}@endif" target="_blank">{{$data['from_name']}}</a>

                </span>
            </p>
        </div>
    </div>
</div>
