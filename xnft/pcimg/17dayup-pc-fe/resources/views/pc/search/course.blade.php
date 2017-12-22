<?php
   $title = "课程_搜索_伟东云学堂";

   $keywords = "课程搜索,课程名称,视频课程";

   $description = "课程搜索让您可以通过课程名称搜索到您想看到的课程，满足您的学习需求";
?>

@extends('pc.common')
@section('main')
	<div class="main-container course">
		<ul class="section-nav list-unstyled list-inline">
		   <li class=""><a href="/course/discovery" target="_blank">全部课程</a><span class="ion-ios-arrow-right ico"></span></li>
		   <li class="">{{$tplData['filter']['q']}} </li>
		   @if($tplData['total'])
		   <li class="pull-right">共{{$tplData['total']}}个课程</li>
		   @endif
		</ul>
		<div class="section-filter clearfix content-block">
		   <ul class="pull-left list-unstyle list-inline left">
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['type']==0) active @endif" value="all">全部</a></li>
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['type']==1) active @endif" value="free">免费</a></li>
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['type']==2) active @endif" value="discount">折扣</a></li>
		       <li><a href="javascript:void(0)" class="goto listen ico @if($tplData['filter']['listen']==1) ion-checkbox-outline active @else ion-checkbox-outline-blank  @endif"></a>可试听 </li>
		   </ul>
		   <ul class="pull-right list-unstyle list-inline right">
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==0) active @endif" value="synthesise">综合排序</a></li>
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==1) active @endif" value="good">好评度&nbsp<span class="@if($tplData['filter']['sort_type']==1)ion-arrow-downactive @else ion-arrow-down @endif"></span></a></li>
		       <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==2) active @endif" value="hot">人气&nbsp<span class="@if($tplData['filter']['sort_type']==2)ion-arrow-downactive @else ion-arrow-down @endif"></span></a></li>
		       <li class="price">
		           <a href="javascript:void(0)" class="goto">
		               <div class="" style="display: inline-block;">价格</div>
		               <div class="triangle" style="">
		                   <div class="triangle-to-top  @if($tplData['filter']['sort_type']==3 && $tplData['filter']['sort']==1) activeTop @endif" ></div>
		                   <div class="triangle-to-bottom @if($tplData['filter']['sort_type']==3 && $tplData['filter']['sort']==0) activeBottom @endif"></div>
		               </div>
		           </a>
		       </li>
		       <li class="price-range">
		            <input type="text" @if($tplData['filter']['start']) value="{{$tplData['filter']['start']}}" @endif placeholder="￥" class="start"/>
		            <span>-</span>
		            <input type="text" @if($tplData['filter']['hight']) value="{{$tplData['filter']['hight']}}" @endif placeholder="￥" class="end"/>
		            <button type="button" class="btn btn-xs btn-primary sure-goto" >确定</button>
		       </li>
		   </ul>
		</div>
		@if($tplData['total'])
		   <div class="row content-block section-list">
		       @forEach($tplData['data'] as $key=>$item)
		       <div class="col-xs-3 col-padding">
		       @component('pc.components.course.item', ['data' => $item])@endcomponent
		       </div>
		       @endforEach
		   </div>
		   <div class="section-pagination">
		       @component('pc.components.pagination.index', ['data'=> [
                   'total' => $tplData['total'],
                   'page_size' => $tplData['page_size'],
                   'current' => $tplData['page_num']
               ] ])
               @endcomponent
		   </div>

		@else
			<div class="section-undefined">
                <img src="/build/img/search/course-1.png" alt="..."/>
                <p>
                    没有找到与<span href="" class="">&nbsp;{{$tplData['filter']['q']}}&nbsp;</span>相关的课程！我是教育机构，我要
                    @if($tplData['user_info']['is_login'])
                      @if($tplData['user_info']['enter_type'] =='institute')
                         <a href="//{{$biz_host}}/institute/index" class="">申请开课&gt;</a>
                      @else
                         <a href="//{{ $www_host }}/activity/join" class="">申请入驻&gt;</a>
                      @endif
                    @else
                       <span class="js_login" style="cursor: pointer;">登录</span>
                    @endif
                </p>
            </div>
            <div class="section-recommend">
                <div class="title">推荐课程</div>
                <div class="content">
                    @forEach($tplData['relevant'] as $key=>$item)
                    <div class="col-5">
                         @component('pc.components.course.item', ['data' => $item, 'titleUnvisible' => true])@endcomponent
                    </div>
                    @endforEach
                </div>
            </div>
		@endif
	</div>
	<script>
        window.FILTER = {!! json_encode($tplData['filter']) !!}
    </script>
@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/search/common.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/search/course.css">
@endsection
@section('script')
    <script src="/build/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/build/js/page/search/course.js"></script>
@stop
