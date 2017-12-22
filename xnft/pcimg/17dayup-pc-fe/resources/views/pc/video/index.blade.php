<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tplData['course_name'] }} - 伟东云学堂</title>
    <link rel="icon" href="/build/img/fav.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/build/css/base.css">
    <link rel="stylesheet" type="text/css" href="/build/lib/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="//17dayup-passport-dev.bj.bcebos.com/passport.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/video/index.css">
</head>
<body>
<?php
    function timeChange($timeStr) {
        $arr = explode(':', $timeStr);
        if (count($arr) == 3) {
            $hours = intval($arr[0]);
            $minutes = intval($arr[1]);
            $minutes = $hours * 60 + $minutes;
            $minutes = $minutes < 10 ? '0'.$minutes : $minutes;
            return implode(':', [$minutes, $arr[2]]);
        }
        return $timeStr;
    }
?>
<div class="content" id="content">
    <div class="topbar">
        <a class="back pull-left" title="返回" href="/course/{{ $tplData['course_id'] }}">
            <i class="ion-android-arrow-back"></i>
        </a>
        <span class="course-title">
            {{ $tplData['course_name'] }}
        </span>
        <div class="pull-right">
            <a class="link m-r-60" href="/center/publishcomment/?course_id={{$tplData['course_id']}}&enter_type=play" target="_blank">评价课程</a>
            <a class="link m-r-60" href="/help/feedback" target="_blank">意见反馈</a>
            @if($tplData['user_info']['is_login'])
                <div class="pull-right user-info clearfix">
                <a class="notice m-r-60 pull-left" href="/center/notice" target="_blank">
                    <i class="ion-android-textsms"></i>
                    <span class="num js_msgNum"></span>
                </a>
                <div class="user-center">
                    <a href="/center/course">
                        <span class="avatar">
                            @if(isset($tplData['user_info']['avatar_url']))
                                <img src="{{$tplData['user_info']['avatar_url']}}">
                            @else
                                <i class="ion-person"></i>
                            @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu ucenter-dropdown-menu">
                        @if(isset($tplData['user_info']['is_enter']) && $tplData['user_info']['is_enter'])
                        <li>
                            <a class="" href="//{{$biz_host}}/institute/index" target="_blank">教学管理</a>
                        </li>
                        @endif
                        <li>
                            <a class="" href="/center/course" target="_blank">我的课表</a>
                        </li>
                        <li>
                            <a class="" href="/center/order" target="_blank">我的订单</a>
                        </li>
                        <li>
                            <a class="" href="/center/collection" target="_blank">我的收藏</a>
                        </li>
                        <li>
                            <a class="" href="/center/edit" target="_blank">设置中心</a>
                        </li>
                        <li>
                            <a class="logout" href="javascript:;">退出</a>
                        </li>
                    </ul>
                </div>
            </div>
            @else
                <div class="user-info pull-right">
                    <div href="javascript:;" id="J-header-login" class="login-wrap">
                        <a class="login">登录</a>
                        <span class="padding">|</span>
                        <a class="register">注册</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if(!$tplData['is_sign'])
        <div class="no-sign-tip">
            <div class="pull-left">
                报名课程可完整学习<br>并记录学习进度
            </div>
            <div class="pull-right">
                <a href="/course/{{$tplData['course_id']}}" target="_blank" class="btn">报名学习</a>
                <a class="close-btn"><i class="ion-android-close"></i></a>
            </div>
        </div>
    @endif

    @if ($tplData['course_status'] == 3)
        <div class="pay-tip">
            <div class="title">该课程申请退款中，无法学习！</div>
            <div class="course-name">
                《{{ $tplData['course_name'] }}》
            </div>
            <div class="price">
                ￥{{ $tplData['cur_price'] }}
            </div>
            <a class="w-btn-primary" target="_blank" href="/course/{{$tplData['course_id']}}">报名学习</a>
        </div>
    @else
        @if ($tplData['type'] == 2)
            <div class="pay-tip">
                <div class="title">购买后即可开课哦！</div>
                <div class="course-name">
                    《{{ $tplData['course_name'] }}》
                </div>
                <div class="price">
                    ￥{{ $tplData['cur_price'] }}
                </div>
                <a class="w-btn-primary" target="_blank" href="/course/{{$tplData['course_id']}}">报名学习</a>
            </div>
        @endif

        @if ($tplData['type'] == 1 && !$tplData['is_sign'])
            <div class="pay-tip">
                <div class="title">报名后才可观看哦！</div>
                <a class="w-btn-primary" target="_blank" href="/course/{{$tplData['course_id']}}">报名学习</a>
            </div>
        @endif
    @endif

    <div class="course-catalog">
        <div class="catalog-btn">
            <i class="icon-catalog"></i>
            <br>
            目录
        </div>
        <div class="chapter-wrap">
        @foreach($tplData['course_catalog'] as $i => $section)
            <div class="chapter-list">
                <div class="chapter-list-titler nowrap">{{ $i + 1 }}.{{ $section['title'] }}</div>

                @foreach($section['_child'] as $item)
                    <div class="chapter-item clearfix" data-id="{{ $item['id'] }}">
                        <span class="nowrap pull-left" style="max-width: 180px">{{ $item['title'] }}</span>
                        <span class="duration pull-left">({{ timeChange($item['media']['timelong']) }})</span>
                    </div>
                @endforeach
            </div>
        @endforeach
        </div>
    </div>

    <div id="player">
        <div class="player-container"></div>
        <div class="player-control">

        </div>
    </div>

</div>
    <script>
        window.PASSPORT_HOST = "{{ $passport_host }}";
        window.BIZ_HOST = "{{ $biz_host }}";
        window.WWW_HOST = "{{ $www_host }}";
        window.COURSEId = {!!json_encode($tplData['course_id'])!!}

    </script>
    <script src="/build/lib/jquery/dist/jquery.min.js"></script>
    <script src="//17dayup-passport-dev.bj.bcebos.com/passport.js"></script>
<!--[if !IE]><!-->
    <script src="/build/lib/baidu-t5player/player/videojs/video.min.js"></script>
    <script src="/build/lib/baidu-t5player/player/videojs/videojs-contrib-hls.min.js"></script>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.11.1/videojs-contrib-hls.js"></script>--}}
    <script src="/build/lib/baidu-t5player/player/videojs/videojs-contrib-quality-levels.min.js"></script>
<!--<![endif]-->
    <script src="/build/lib/baidu-t5player/player/cyberplayer.js"></script>
    <script>
        window.COURSE_INFO = {!!
           json_encode($tplData)
        !!};
    </script>
    <script src="/build/js/page/video/index.js"></script>
</body>
</html>


