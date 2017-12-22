@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-study">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">学习进度</div>
            <div class="content">
                <div class="rule div-block-max">
                    <div class="rule-title">1.  用户报名课程后，在个人中的【我的课表】中可查看已报名课程列表</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/speed1.png">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">2.  如果用户观看了课程，则可在课程列表中显示当前的课程的学习进度</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/speed2.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/speed.css">
@endsection
