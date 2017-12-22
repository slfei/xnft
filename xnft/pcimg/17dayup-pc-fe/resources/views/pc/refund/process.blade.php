@extends('pc.common')
@section('main')
    <div class="main-container clearfix process">
        <div class="section-header">
            @component('pc.components.refund.header', ['refundState' => 'process'])
            @endcomponent
        </div>
        <div class="section-content clearfix">
            <div class="refunc-type">申请已提交，请等待卖家处理。</div>
            <div class="prompting">卖家会在<span class="countdown">03天00时00秒</span>内处理，如超过时间，则自动默认申请通过!</div>
            <div class="cancel">您还可以&nbsp;:&nbsp;<a href="javascript:void(0)" class="js_cancelrefund">取消退款申请</a></div>
            <div class="line"></div>
            <div class="row">
                <div class="col-xs-6">
                    @component('pc.components.refund.application-form', ['data' => $tplData['data']['refund_info']])
                    @endcomponent
                </div>
                <div class="col-xs-5 col-xs-offset-1">
                     @component('pc.components.refund.course-detail', ['data' => $tplData['data']['order_info']])
                     @endcomponent
                </div>
            </div>
        </div>
    </div>
    <script>
        window.orderId = {!! json_encode($tplData['data']['order_info']['order_id']) !!}
        window.countDown = '{{strtotime($tplData['data']['refund_info']['add_time'])+3*24*60*60}}'
    </script>

@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/refund/process.css">
@endsection
@section('script')
    <script src="/build/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/refund/process.js"></script>
@stop
