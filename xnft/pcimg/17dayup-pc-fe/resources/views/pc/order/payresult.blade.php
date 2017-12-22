@extends('pc.common')
@section('main')
    <div class="main-container pay-result">
        <div class="section-order">
            <div class="div-padding textc-center success">
                <div class="">
                    <span class="pull-left ion-checkmark-circled ico">
                    </span><span class="pull-left text">支付成功</span>
                </div>
            </div>
            <div class="div-padding">订单号&nbsp;:&nbsp;<span class="gray">{{$tplData['data']['result']['order_id']}}</span></div>
            <div class="div-padding">订单商品&nbsp;:&nbsp;<span class="gray">{{$tplData['data']['result']['course_name']}}</span></div>
            <div class="div-padding">实付金额&nbsp;:&nbsp;<span class="gray">￥{{$tplData['data']['result']['money']}}</span></div>
            <div class="div-padding">支付方式&nbsp;:&nbsp;<span class="gray">{{$tplData['data']['result']['pay_way']}}</span></div>
            <div class="div-padding">购买时间&nbsp;:&nbsp;<span class="gray">{{$tplData['data']['result']['time']}}</span></div>
            <div class="div-padding text-center back"><a href="/course/registration?courseid={{$tplData['data']['result']['course_id']}}">返回</a></div>
        </div>
    </div>
@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/order/payresult.css">
@endsection
@section('script')
    <script src="/build/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/order/payresult.js"></script>
@stop
