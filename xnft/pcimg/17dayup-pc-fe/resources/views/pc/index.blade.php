<?php
   $title = "伟东云学堂-带梦想远航";

   $keywords = "在线课程,在线教育,在线学习,国学文化,亲子早教,家庭教育,幼儿教学,幼儿兴趣,基础教育,小学阶段,初中阶段,高中阶段,考研,出国留学,实用英语,日语,韩语,前端开发,后端开发,产品运营,平面设计,公职考试,财会金融,健康运动,瑜伽课程";

   $description = "伟东云学堂涵盖了国学文化、亲子早教、基础教育、留学语言、IT互联网、职业技能、兴趣爱好以及国际教育等多个领域教育产品，为国内外互联网用户提供了专业优质的教育资源搜索、在线学习、教育资讯以及在线交易等全方位的教育互联网服务。";
?>

@extends('pc.common')

@section('main')

    <div class="section-banner">
        <div class="main-container">
            <ul class="banner-nav" id="J-category-list">
                @foreach($tplData['category_list'] as $i => $item)
                    <li data-category-id="{{$item['category_id'] + $i}}" class="clearfix">
                        <a href="/course/discovery/{{$item['category_id']}}">
                            {{ $item['name'] }}
                        </a>
                        <a class="pull-right">
                            <i class="ion-ios-arrow-right"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="banner-nav-child" id="J-child-cat-list">
                @foreach($tplData['category_list'] as $i=>$item)
                    <div class="sub-category-list" data-category-id="{{$item['category_id'] + $i}}">
                        <ul>
                            @foreach($item['_child'] as $cate)
                                <li class="sub-category-item">
                                    <a class="title" href="/course/discovery/{{$cate['category_id']}}" target="_blank">
                                        {{ $cate['name'] }}
                                    </a>
                                    @if(isset($cate['_child']))
                                    @foreach($cate['_child'] as $node)
                                    <a class="node" href="/course/discovery/{{ $node['category_id'] }}" target="_blank">
                                        {{ $node['name'] }}
                                    </a>
                                    @endforeach
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        @component('pc.components.slider.slider', ['data' => $tplData['index_banner_list']])
        @endcomponent
    </div>

    <div class="main-container">
        <div class="main-category-list clearfix">
            <div class="category-item active" data-i="0">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-1"></i>
                    <div class="name">国学文化体验课</div>
                </a>
            </div>
            <div class="category-item" data-i="1">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-2"></i>
                    <div class="name">亲子早教体验课</div>
                </a>
            </div>
            <div class="category-item" data-i="2">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-3"></i>
                    <div class="name">基础教育体验课</div>
                </a>
            </div>
            <div class="category-item" data-i="3">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-4"></i>
                    <div class="name">留学语言体验课</div>
                </a>
            </div>
            <div class="category-item" data-i="4">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-5"></i>
                    <div class="name">IT互联网体验课</div>
                </a>
            </div>
            <div class="category-item" data-i="5">
                <a href="javascript:void(0)">
                    <i class="icon icon-category-6"></i>
                    <div class="name">其他类别体验课</div>
                </a>
            </div>
        </div>
        @foreach($tplData['free_course_list'] as $i=>$freeList)
        <div class="row main-category-content @if(!$i==0) hide @else show @endif" value="{{$i}}">
            @foreach($freeList['free_course'] as $course)
            <div class="col-xs-4 clearfix col-xs-padding">
                <img class="img-bg" src="{{$course['course_img']}}" alt=""/>
                <div class="shade-container">
                    <div class="shade"><a href="/course/{{$course['course_id']}}" target="_blank"></a></div>
                    <a class="goto" href="/course/player/{{$course['course_id']}}" target="_blank" ><img src="/build/img/play.png" alt=""/></a>
                    <div class="description clearfix">
                        <div>
                            <span class="pull-left omit_area1"><a href="/course/{{$course['course_id']}}" target="_blank">{{$course['course_name']}}</a></span>
                            <span class="pull-right omit_area2"><a href="@if($course['from_type']=='institute'||$course['from_type']==2) /institute/homepage/{{$course['from_id']}} @else /personal/homepage/{{$course['from_id']}}@endif" target="_blank">{{$course['from_name']}}</a></span>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
        @endforeach
    </div>

   @foreach($tplData['course_list'] as $key=>$item)
       @component('pc.components.course.index_course_block', ['data' => $item, 'key' => $key])@endcomponent
   @endforeach

   <div class="content-block">
       <div class="main-container">
           <div class="section-news">
               <div class="clearfix">
                   <div class="pull-left title">
                       <i class="icon icon-news-block"></i>
                       最新教育资讯
                   </div>
                   <ul class="pull-right list-unstyled list-inline right">
                       @foreach($tplData['hot_news_cat'] as $hotNews)
                       <li><a href="{{$hotNews['url']}}" target ="_blank">{{$hotNews['name']}}</a></li>
                       @endforeach
                       <li><a href="/news/discovery" target ="_blank">更多<span class="ion-ios-arrow-right ico"></span></a></li>
                   </ul>
               </div>
               <?php
                    $news_in_block = array_slice($tplData['news_list'], 0, 3);
                    $news_in_line = array_slice($tplData['news_list'], 3);
               ?>
               <div class="row-news-block clearfix">
                   @foreach($news_in_block as $item)
                       <div class="col-xs-4">
                               @component('pc.components.news.news', ['data' => $item])@endcomponent
                       </div>
                   @endforeach
               </div>
               <div class="row-news-inline clearfix">
                   @foreach($news_in_line as $item)
                       <div class="col-xs-4 news-inline">
                           <a href="/news/{{$item['news_id']}}" target="_blank" class="clearfix" title="{{ $item['news_title'] }}">
                               <div class="pull-left content-title nowrap">{{ $item['news_title'] }}</div>
                           </a>
                           <span class="pull-right update-at">{{ explode(' ', $item['created_at'])[0] }}</span>
                       </div>
                   @endforeach
               </div>
           </div>

           <div class="section-topics">
               <div class="clearfix">
                    <div class="pull-left title">
                        <i class="icon icon-topic-block"></i>
                        精彩话题不停歇
                    </div>
                    <ul class="pull-right list-unstyled list-inline right">
                      @foreach($tplData['circle_hot_topic'] as $circleHot)
                      <li><a href="{{$circleHot['url']}}" target ="_blank">{{$circleHot['name']}}</a></li>
                      @endforeach
                      <li><a href="https://www.51jianjiao.com/circle/topic/list" target="_blank">更多<span class="ion-ios-arrow-right ico"></span></a></li>
                    </ul>
               </div>
               <div class="content clearfix">
                   @foreach($tplData['circle_hot_question'] as $item)
                       @component('pc.components.topic.index_topic_item', ['data' => $item])@endcomponent
                   @endforeach
               </div>
           </div>

           <div class="section-relative-products main-container">
               <div class="title">
                   <div class="line"></div>
                   <div class="text">产品中心</div>
               </div>
               <div class="product-list">
                   @if(count($tplData['product_list'])>8)
                   <a class="prev"></a>
                   <a class="next"></a>
                   @endif
                   <div class="scroller clearfix">
                        <div class="wrapper" style="width:{{count($tplData['product_list']) * 150}}px;">
                            @foreach($tplData['product_list'] as $i => $item)
                                <div class="product-item">
                                    <a href="{{ $item['url'] }}" target="_blank" class="@if($item['url']=='javascript:;')productHover @endif">
                                        <img src="{{ $item['image'] }}" width="126" height="126" alt="">
                                        <p class="name">
                                            {{ $item['name'] }}
                                        </p>
                                    </a>
                                    
                                </div>
                            @endforeach
                        </div>
                   </div>
               </div>
           </div>

       </div>
   </div>
<script>
    window.productsCount = {!! json_encode(count($tplData['product_list'])) !!}
</script>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/index.css">
@endsection
@section('script')
    <script src="/build/js/page/index.js"></script>
@stop

