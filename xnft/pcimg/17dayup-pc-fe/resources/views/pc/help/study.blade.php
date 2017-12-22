@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-study">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">如何学习</div>
            <div class="content">
                <div class="introduce">退款流程：</div>
                <div class="rule div-block-max">
                    <div class="rule-title">1. 登录伟东云学堂，进入课程详情页点击【报名学习】</div>
                    <div class="rule-content div-block-normal">
                        <img src="/build/img/help/apply-study.png" />
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">2. 如果课程免费课程，课程报名成功后，可以在报名成功提示页点击【我的课表】进入课表看课，如果课程为付费课程，需要先去支付，在支付成功提示页点击【返回】进入报名成功页面，点击【我的课表】进入我的课表看课。</div>
                    <div class="rule-content div-block-normal">
                         <img src="/build/img/help/apply-success.png" />
                    </div>
                    <div class="rule-content div-block-normal">
                         <img src="/build/img/help/pay-success.png" />
                    </div>
                    <div class="rule-content div-block-normal">
                         <img src="/build/img/help/class.png" />
                    </div>
                </div>
                <div class="rule">
                    <div class="rule-title">3. 已添加报名的课程，也可以在课程详情页，点击课程目录进行看课</div>
                    <div class="rule-content div-block-normal">
                         <img src="/build/img/help/course-list.png" />
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
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/study.css">
@endsection
