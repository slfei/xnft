@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-refund">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">退款规则</div>
            <div class="content">
                <div class="introduce">退款流程：</div>
                <div class="rule div-block-max">
                    <div class="rule-title">1.用户向课程发布者支付课程费用后，如课程发布者发布的课程不存在违反法律法规规定及伟东云学堂相关规定，亦不存在按伟东云学堂相关规定可以退费的情况下，用户在报名成功后，均不得申请退款；</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">2.用户向课程发布者支付课程费用后，如课程发布者发布的课程存在违反法律法规规定及伟东云学堂相关规定而发生退费的，则用户同意按如下规则退费：</div>
                    <div class="rule-content">
                        <div class="div-block-normal">（1）如果用户购买的是录播课程或含有录播课程，此课程具有退课服务且在购课20天内，如用户未观看课程则可申请退款，若用户已经观看，则无法申请退款；</div>
                        <div class="div-block-normal">（2）如果用户购买的是直播课程，且购买当时已经开课，由于用户可以观看已经开课课程的回放内容，因此，可以回放的课程视为用户已经学习的课程而不予退费，即，用户可以要求退费的比例为尚未开课的课程除以课程发布者发布的所有课程；</div>
                    </div>
                </div>
                <div class="rule">
                    <div class="rule-title">3.若用户购买的课程不是通过伟东云学堂提供的支付方式完成支付的，用户与课程发布者之间就款项支付、退款等任何事项，由用户与课程发布者自行协商解决，用户无权向伟东云学堂主张任何权利或要求伟东云学堂承担任何责任。</div>
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
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/refund.css">
@endsection
