<?php
   $title = "机构_搜索_伟东云学堂";

   $keywords = "机构搜素,机构名称,机构信息";

   $description = "机构搜索让您可以通过机构名称搜索到您想要找的机构";
?>

@extends('pc.common')
@section('main')
<div class="main-container institute">
    <div class="section-nav">
        根据关键词@if($tplData['filter']['q'])<span class="keyword">{{$tplData['filter']['q']}}</span>@endif搜索到<span class="">{{$tplData['total']}}</span>个机构</a>
    </div>
    @if($tplData['total'])
    <div class="clearfix section-filter">
        <ul class="pull-left list-unstyle list-inline left">
            <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==0) active @endif" sort-type="0">综合排序</a></li>
            <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==1) active @endif" sort-type="1">评分<span class="ion-arrow-down ion-arrow-downactive"></span></a></li>
            <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==2) active @endif" sort-type="2">课程数<span class="ion-arrow-down ion-arrow-downactive"></span></a></li>
            <li><a href="javascript:void(0)" class="goto @if($tplData['filter']['sort_type']==3) active @endif" sort-type="3">学生数<span class="ion-arrow-down ion-arrow-downactive"></span></a></li>
        </ul>
    </div>
    <div class="section-list">
        @forEach($tplData['data'] as $key=>$item)
        <div class="row-list">
            <div class="row">
                <div class="col-xs-9 left">
                    @component('pc.components.search.media', ['data' => $item]) @endcomponent
                </div>
                <div class="col-xs-3 right">
                    @if($item['consult'])
                    <a href="{{$item['consult']}}" class="consult" target="_blank">在线咨询</a>
                    @else
                    <a href="javascript:void(0)" class="consult-disabled">在线咨询</a>
                    @endif
                </div>
            </div>
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
    <script>
        window.FILTER = {!! json_encode($tplData['filter']) !!}
    </script>
    @else
    <div class="section-undefined">
        <img src="/build/img/search/institute-1.png" alt="..."/>
        <p>
            暂无“<span href="" class="">{{$tplData['filter']['q']}}</span>”相关的机构哦，搜索其他机构试试吧！
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
@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('bodyClass')
@if(count($tplData['data']) == 0)
class="white-bg"
@endif
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="/build/css/pc.css">
<link rel="stylesheet" type="text/css" href="/build/css/page/search/common.css">
<link rel="stylesheet" type="text/css" href="/build/css/page/search/institute.css">
@endsection
@section('script')
<script src="/build/lib/bootstrap/bootstrap.min.js"></script>
<script src="/build/js/page/search/institute.js"></script>
@stop
