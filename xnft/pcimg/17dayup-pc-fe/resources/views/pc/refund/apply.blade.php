@extends('pc.common')
@section('main')
    <div class="main-container clearfix apply">
        <div class="section-header">
            @component('pc.components.refund.header', ['refundState' => 'apply'])
            @endcomponent
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-xs-6 reason">
                    <div class="row div-padding" style="line-height: 34px;">
                        <div class="col-xs-3">退款原因&nbsp;:</div>
                        <div class="col-xs-9">
                            <select class="form-control">
                                <option>请选择</option>
                                <option value="1">买错课了</option>
                                <option value="2">没时间学</option>
                                <option value="3">想换一个别的课程</option>
                                <option value="4">其他</option>
                            </select>
                        </div>
                    </div>
                    <div class="row div-padding">
                        <div class="col-xs-3">退款金额&nbsp;:</div>
                        <div class="col-xs-9 price">
                            ￥{{$tplData['data']['cur_price']}}
                        </div>
                    </div>
                    <div class="row div-padding instruction">
                        <div class="col-xs-3">退款说明&nbsp;:</div>
                        <div class="col-xs-9">
                            <textarea rows="3" class="form-control" placeholder="200字以内" maxlength="200"></textarea>
                        </div>
                    </div>
                    <div class="row div-padding">
                        <!--<div class="col-xs-2"></div>-->
                        <div class="col-xs-offset-3 col-xs-10 action">
                            <a href="javascript:void(0)" class="ok">提交申请</a>
                            <a href="/center/order" class="cancel">取消申请</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xs-offset-1 apply_right">
                     @component('pc.components.refund.course-detail', ['data' => $tplData['data']])
                     @endcomponent
                </div>
            </div>
        </div>
    </div>
    <script>
        window.orderId = {!! json_encode($tplData['data']['order_id']) !!}
    </script>

@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/refund/apply.css">
@endsection
@section('script')
    <script src="/build/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/refund/apply.js"></script>
@stop
