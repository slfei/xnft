<?php

?>
<div class="course-detail">
    <div class="div-padding-min">订单详情:</div>
    <div class="row div-padding-min">
        <div class="col-xs-6 order_col_img"><img class="img-responsive" src="{{$data['course_img']}}" alt="" style="width: 100px; height: 56px;"/></div>
        <div class="col-xs-6 titel">{{$data['course_name']}}</div>
    </div>
    <div class="div-padding-min color_gray">订单号 : {{$data['order_id']}}</div>
    <div class="div-padding-min color_gray">订单金额 : ￥{{$data['cur_price']}}</div>
    <div class="div-padding-min color_gray">订单支付方式 : @if($data['pay_type']==1) 微信 @else 支付宝  @endif</div>
</div>
