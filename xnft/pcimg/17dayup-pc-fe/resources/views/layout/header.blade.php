

<header class="g-header">
    <input type="hidden" name="loginType" value="{{isset($tplData['user_info'])}}">
    <div class="main-container clearfix">
        <div class="header-nav pull-left">
            <a class="logo" href="//{{ $www_host }}"></a>
            <a class="header-nav-item header-active-index" href="//{{ $www_host }}">首页</a>
            <a class="header-nav-item header-active-course" href="//{{ $www_host }}/course/discovery">在线课程</a>
            <a class="header-nav-item header-active-news" href="//{{ $www_host }}/news/discovery">资讯头条</a>
            <a class="header-nav-item header-active-institute" href="//{{ $www_host }}/activity/join">入驻平台</a>
        </div>
        <div class="pull-right">
            <form class="c-search pull-left" id="J-search-form">
                <div class="search-box">
                    <div class="left search-type-select" id="J-search-type-select">
                        <span class="search-type selected" data-type="course">
                            课程
                            <i class="ion-ios-arrow-down"></i>
                        </span>
                        <span class="search-type" data-type="institute">
                            机构
                            <i class="ion-ios-arrow-down"></i>
                        </span>
                    </div>
                    <div class="right js-search">
                        <i class="icon ion-ios-search ico"></i>
                    </div>
                    <div class="search-wrap">
                        <input type="text" class="search-input" placeholder="请输入搜索关键词"/>
                    </div>
                </div>
                <div class="dropdown-menu sug-dropdown-menu">

                </div>
            </form>
            <div class="header-login pull-right">
                <div id="nd-loginTrue" class="user-info pull-right @if(isset($tplData['user_info']) && $tplData['user_info']['is_login']) t @else hide @endif">
                    <a class="notice" href="//{{$www_host}}/center/notice">
                        <i class="ion-android-textsms"></i>
                        <span class="num js_msgNum"></span>
                    </a>
                    <div class="user-center">
                        <a href="//{{$www_host}}/center/course">
                        <span class="avatar">
                            <img id="nd-face" src=" @if(isset($tplData['user_info']) && $tplData['user_info']['is_login']) {{$tplData['user_info']['avatar_url']}} @endif">
                        </span>
                        </a>
                        <ul class="dropdown-menu ucenter-dropdown-menu">
                            <li id="nd-institute" class="@if(isset($tplData['user_info']['is_enter']) && $tplData['user_info']['is_enter']) @else hide @endif">
                                <a class="" href="//{{$biz_host}}/institute/index">教学管理</a>
                            </li>
                            <li>
                                <a class="" href="//{{$www_host}}/center/course">我的课表</a>
                            </li>
                            <li>
                                <a class="" href="//{{$www_host}}/center/order">我的订单</a>
                            </li>
                            <li>
                                <a class="" href="//{{$www_host}}/center/collection">我的收藏</a>
                            </li>
                            <li>
                                <a class="" href="//{{$www_host}}/center/edit">设置中心</a>
                            </li>
                            <li>
                                <a id="g-header-logout" class="logout" href="javascript:;">退出</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="nd-loginFalse" class="user-info pull-right @if(!isset($tplData['user_info'])) hide @elseif($tplData['user_info']['is_login']) hide @else  @endif">
                    <div id="J-header-login">
                        <a class="login" href="javascript:;">登录</a><span class="padding">|</span><a class="register" href="javascript:;">注册</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
