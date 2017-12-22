<?php
   $title = $tplData['course_name']."_伟东云学堂";

   $keywordStr = '';

   foreach($tplData['category_chip'] as $value){
     $keywordStr .='，'.$value['name'];
   }

   $keywords = $tplData['course_name'].$keywordStr;

   $description = "伟东云学堂涵盖了国学文化、亲子早教、基础教育、留学语言、IT互联网、职业技能、兴趣爱好以及国际教育等多个领域教育产品，为国内外互联网用户提供了专业优质的教育资源搜索、在线学习、教育资讯以及在线交易等全方位的教育互联网服务。";
?>

@extends('pc.common')
@section('main')
<div class="main-container detail">
    <ul class="list-unstyled list-inline section-nav">
        <li class=""><a href="/course/discovery">全部课程</a><span class="ion-ios-arrow-right ico"></span></li>
        @if($tplData['category_chip'])
        @forEach($tplData['category_chip'] as $category)
        <li class="dropdown lt">
            <a class="" href="/course/discovery/{{$category['category_id']}}">

                {{$category['name']}}
            </a>
            <span class="ion-ios-arrow-right ico"></span>
        </li>
        @endforEach
        @endif
    </ul>
    <div class="clearfix content-block section-course">
        <div class="pull-left left" style="background-image:url({{$tplData['course_img']}})">
            @if($tplData['is_listen']==1)
            <div class="audition clearfix">
                <a href="/course/player/{{$tplData['course_id']}}" class="" target="_blank">
                    <img src="/build/img/course/play.png" alt=""/>
                </a>
            </div>
            @endif
        </div>
        <div class="pull-left right">
            <div class="share_collertcion">
               <span class="share js_share">
                    <div class="share_area">
                        <div class="share_space"></div>
                        <div class="share_bg">
                           <div id="share" class="social-share"></div>
                        </div>
                    </div>
               </span>
               <span class="collection js_collection @if($tplData['collection']) collectionActive @endif " data-id="{{$tplData['course_id']}}"></span>
            </div>
            <div class="title">{{$tplData['course_name']}}</div>
            <p class="description">{{$tplData['sentence']}}</p>

            <div class="price">
                @if($tplData['cur_price']==0)
                <span class="cur-free color-dimgray">免费</span>
                @else
                <span class="cur-price">￥{{$tplData['cur_price']}}</span>
                @endif
                @if($tplData['cur_price']<$tplData['price'])
                <span class="original-price">￥{{$tplData['price']}}</span>
                <p class="tag">
                    <span class="tag-text">惠</span>
                    <span class="discounts">优惠活动：限时打折</span>
                </p>
                @endif
            </div>
            <div class="action action-top">
                <a href="/course/player/{{$tplData['course_id']}}" class="success hide"
                                   target="_blank">开始学习</a>
                @if($tplData['is_sign']==1)
                <a href="javascript:void(0)" class="apply">报名学习</a>
                @elseif($tplData['is_sign']==2)
                <a href="/course/player/{{$tplData['course_id']}}" class="success"
                   target="_blank">开始学习</a>
                @else
                <div class="finish">报名结束</div>
                @endif
                @if($tplData['consult'])
                <a href="{{$tplData['consult']}}" class="consult" target="_blank">在线咨询</a>
                @else
                <a href="javascript:void(0)" class="consult-disabled disabled">在线咨询</a>
                @endif
            </div>
            <div class="promise">
                服务承诺：
                @if($tplData['is_refund']==1)
                <span class="refund">开课前随时退</span>
                @else
                无
                @endif
            </div>
        </div>
    </div>
    <div id="md"></div>
    <div class="section-fix">
        <div class="section-fix-main">
            <ul id="tab" class="list-unstyled list-inline">
                <li id="tab1" value="1" class="active"><a href="#md">课程概述</a></li>
                <li id="tab2" value="2"><a href="#md">课程目录</a></li>
                <li id="tab3" value="3"><a href="#md">学员评论<span>({{$tplData['comment']['all_comment_num']}})</span></a></li>
            </ul>
            <div class="action action-bottom">
                <a href="/course/player/{{$tplData['course_id']}}" class="success hide"
                                                   target="_blank">开始学习</a>

                @if($tplData['is_sign']==1)
                <a href="javascript:void(0)" class="apply">报名学习</a>
                @elseif($tplData['is_sign']==2)
                <a href="/course/player/{{$tplData['course_id']}}" class="success"
                   target="_blank">开始学习</a>
                @else
                <div class="finish">报名结束</div>
                @endif
                @if($tplData['consult'])
                <a href="{{$tplData['consult']}}" class="consult" target="_blank">在线咨询</a>
                @else
                <a href="javascript:void(0)" class="consult-disabled disabled">在线咨询</a>
                @endif
            </div>
        </div>
    </div>
    <div class="clearfix content-block section-presentation">
        <div class="pull-left left">
            <ul id="tab" class="list-unstyled list-inline">
                <li id="tab1" value="1" class="active">课程概述</li>
                <li id="tab2" value="2">课程目录</li>
                <li id="tab3" value="3">学员评论<span>({{$tplData['comment']['all_comment_num']}})</span></li>
            </ul>
            <div id="container">
                <div id="content1">
                    <div class="rich-text intro">
                        {!! $tplData['intro'] !!}
                    </div>
                    @if($tplData['course_material'])
                    <div class="material-tilte">
                        <span class="material-tilte-bg"></span> <span>相关资料下载</span>&nbsp;<span class="material-tilte-tip">(报名后可下载)</span>
                    </div>
                    <ul class="list-unstyled list-inline material-content">
                        @foreach($tplData['course_material'] as $material)
                        <li><span class="material-name" title="{{$material['name']}}">{{$material['name']}}</span><a class="material-download js_download" href="JavaScript:;" target="_blank" data-courseid="{{$tplData['course_id']}}">下载</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div id="content2">
                    @foreach($tplData['course_catelog'] as $i=>$catelog)
                    <div class="chapter">
                        <div class="title">
                            <span>第{{$i+1<10?('0'.($i+1)):($i+1)}}章：{{$catelog['title']}}</span>
                        </div>
                        <ul class="list-unstyle">
                            @foreach($catelog['_child'] as $j=>$child)
                            <li class="section">
                                <a href="/course/player/{{$tplData['course_id']}}?#section_id={{$child['id']}}"
                                   target="_blank">
                                    <span class="playimg"></span>
                                    <span style="margin-left: 6px;">
                                    @if($child['class_type']==1) [录播] @else [直播] @endif
                                    </span>
                                    <span>{{$child['title']}}</span>
                                    <span class="time">({{$child['media']['timelong']}})</span>
                                    @if($tplData['is_listen']==1 && $i==0 && $j==0)
                                      <span class="listen_icon">可试听</span>
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div id="content3">
                    <ul class="list-unstyle list-inline clearfix tab ">
                        <li class="praise">
                            <div class="value">{{$tplData['comment']['praise']}}</div>
                            <p class="character">好评度 </p>
                        </li>
                        <li class="witchComment" value="0">
                            <span class="ion-circle-filled active"></span>
                            <span>全部评价({{$tplData['comment']['all_comment_num']}})</span>
                        </li>
                        <li class="witchComment" value="3">
                            <span class="ion-circle-outline"></span>
                            <span>好评({{$tplData['comment']['good_comment_num']}})</span>
                        </li>
                        <li class="witchComment" value="2">
                            <span class="ion-circle-outline"></span>
                            <span>中评({{$tplData['comment']['in_comment_num']}})</span>
                        </li>
                        <li class="witchComment" value="1">
                            <span class="ion-circle-outline"></span>
                            <span>差评({{$tplData['comment']['low_comment_num']}})</span>
                        </li>
                    </ul>
                    <div class="nocomment @if($tplData['comment']['comment_list']) hide @endif"></div>
                    <div class="tab-content">
                        <ul class="list-unstyle list-inline list-comment">
                            @foreach($tplData['comment']['comment_list'] as $comment)
                            <li class="border-bottom">
                                <div class="media">
                                    <div class="media-left">
                                        <img class="img-circle" src="{{$comment['avatar_url']}}">

                                        <div title="{{$comment['nick_name']}}">{{$comment['nick_name_sub']}}</div>
                                    </div>
                                    <div class="media-body">
                                        <div class="modal-title">
                                            <div class="star star{{$comment['star']}}"></div>
                                            <p>{{$comment['text_content']}}</p>
                                        </div>
                                        <div class="time">{{$comment['date']}}</div>
                                        @if($comment['answer'])
                                        <ul class="list-unstyle revert">
                                            <li>
                                                <span class="user"><a href="/{{$comment['answer']['from_type']}}/homepage/{{$comment['answer']['from_id']}}" target="_blank">{{$comment['answer']['ins_show_name']}}</a></span>
                                                回复:
                                                <span>{{$comment['answer']['text']}}</span>

                                                <div class="revert-time">{{$comment['answer']['created_at']}}</div>
                                            </li>
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center">
                            <ul class="pagination">
                                <li class="hide lt"><a href="javascript:void(0)">&lt;</a></li>
                                <li class="number active"><a href="javascript:void(0)" data-i="first">1</a></li>
                                <li class="number"><a href="javascript:void(0)">2</a></li>
                                <li class="number"><a href="javascript:void(0)">3</a></li>
                                <li class="number"><a href="javascript:void(0)">4</a></li>
                                <li class="number"><a href="javascript:void(0)">5</a></li>
                                <li class="number"><a href="javascript:void(0)" data-i="last">6</a></li>
                                <li class="gt"><a href="javascript:void(0)">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-left right">
            @if(isset($tplData['teacher']))
            <div class="teacher">
                <div class="title">课程讲师</div>
                @foreach($tplData['teacher'] as $teacher)
                <div class="media media-hover" onclick="goto({{$teacher['id']}},'teacher')">
                    <div class="media-left">
                        <img class="img-circle" src="{{$teacher['avatar']}}">
                    </div>
                    <div class="media-body">
                        <div class="modal-title" title="{{$teacher['name']}}">
                            {{$teacher['name']}}
                        </div>
                        <p class="text-justify">{{$teacher['sentence']}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @if($tplData['institute'])
            <div class="institute">
                <div class="title">所属机构</div>
                <div class="media" onclick="goto({{$tplData['institute']['institute_id']}},'institute',{{$tplData['institute']['from_type']=='institute'||$tplData['institute']['from_type']==2?2:1}})">

                    <div class="media-left">
                        <img class="img-circle" src="{{$tplData['institute']['logo']}}">
                    </div>
                    <div class="media-body">
                        <div class="modal-title" title="{{$tplData['institute']['ins_show_name']}}">
                            {{$tplData['institute']['ins_show_name']}}
                        </div>
                        <p class="text-justify">
                            {{$tplData['institute']['short_des']}}
                        </p>
                    </div>
                    <div class="row data">
                        <div class="col-xs-4 institute-data">
                            <div class="">好评度</div>
                            <div class="">{{$tplData['institute']['praise']}}</div>
                        </div>
                        <div class="col-xs-4 institute-data">
                            <div class="">课程数</div>
                            <div class="">{{$tplData['institute']['course_num']}}</div>
                        </div>
                        <div class="col-xs-4 institute-data">
                            <div class="">学生数</div>
                            <div class="">{{$tplData['institute']['student_num']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($tplData['relevant'])
            <div class="relevant">
                <div class="title">推荐课程</div>
                @forEach($tplData['relevant'] as $key=>$item)
                <div class="media media-hover" onclick="goto({{$item['course_id']}},'relevant')">
                    <div class="media-left">
                        <img src="{{$item['course_img']}}">
                    </div>
                    <div class="media-body">
                        <div class="modal-title">
                            {{$item['course_name']}}
                        </div>
                        <p>
                            @if($item['price']==0)
                            <span class="free">免费</span>
                            @else
                            <span class="price">￥{{$item['price']}}</span>
                            @endif

                        </p>
                    </div>
                </div>
                @endforEach
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    window.courseId = {!!json_encode($tplData['course_id'])!!}
    window.comment = {!!json_encode($tplData['comment'])!!}
</script>
@stop
@section('lib')
<link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="/build/css/pc.css">
<link rel="stylesheet" type="text/css" href="/build/css/page/course/detail.css">
<link rel="stylesheet" type="text/css" href="/build/lib/share/css/share.min.css">
@endsection
@section('script')
<script src="/build/lib/bootstrap/bootstrap.min.js"></script>
<script src="/build/lib/toast/jquery.toast.min.js"></script>
<script src="/build/lib/baiduTemplate/baiduTemplate.js"></script>
<script src="/build/lib/share/js/jquery.share.min.js"></script>
<script id='t:_1234-abcd-1' type="text/template">
    <%for(var i=0;i<comment_list.length;i++){%>
    <li class="border-bottom">
        <div class="media">
            <div class="media-left">
                <img class="img-circle" src="<%=comment_list[i]['avatar_url']%>">
                <div title="<%=comment_list[i]['nick_name']%>"><%=comment_list[i]['nick_name_sub']%></div>
            </div>
            <div class="media-body">
                <div class="modal-title">
                    <div class="star star<%=comment_list[i]['star']%>"></div>
                    <p><%=comment_list[i]['text_content']%></p>
                </div>
                <div class="time"><%=comment_list[i]['date']%></div>
                <%if(comment_list[i]['answer'].length){%>
                <ul class="list-unstyle revert">
                    <li>
                        <span class="user"><%=comment_list[i]['answer']['ins_show_name']%></span>
                        回复:
                        <span><%=comment_list[i]['answer']['text']%></span>

                        <div class="revert-time"><%=comment_list[i]['created_at']%></div>
                    </li>
                </ul>
                <%}%>
            </div>
        </div>
    </li>
    <%}%>
</script>
<script src="/build/js/page/course/detail.js"></script>
<script type="text/javascript">
    $('#share').share({
        sites: ['weibo','qzone','wechat'],
        title: "{{$tplData['course_name']}}_伟东云学堂",
        description: "我正在伟东云学堂学习【{{$tplData['course_name']}}】，非常好的学习体验，你要来试试吧！",
        image : "{{$tplData['course_img']}}"
    });
</script>
@stop
