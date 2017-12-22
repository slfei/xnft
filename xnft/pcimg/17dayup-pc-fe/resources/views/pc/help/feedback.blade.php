@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-feedback">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">意见反馈</div>
            <div class="content">
                <div class="row type">
                    <div class="col-xs-1">您要：</div>
                    <div class="col-xs-10">
                        <a href="javascript:void(0)"><span class="ion-ios-circle-filled ico active" value="0"></span><span class="text">功能介绍</span></a>
                        <a href="javascript:void(0)"><span class="ion-ios-circle-outline ico" value="1"></span><span class="text">bug</span></a>
                    </div>
                </div>
                <div class="row div-block">
                    <div class="col-xs-1">联系：</div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control phone" placeholder="请输入手机号/邮箱/QQ号等"/>
                    </div>
                </div>
                <div class="row div-block">
                    <div class="col-xs-1">留言：</div>
                    <div class="col-xs-7">
                        <textarea rows="8" class="form-control suggest"  placeholder="请在这里写下您的宝贵意见"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-9">
                        <a href="javascript:void(0)" class="submit">提交</a>
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
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/feedback.css">
@endsection
@section('script')
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/help/feedback.js"></script>
@stop

