<?php

?>
<div class="application">
    <div class="div-padding">退款编号&nbsp;:&nbsp;{{$data['refund_id']}}</div>
    <div class="div-padding">申请时间&nbsp;:&nbsp;{{$data['add_time']}}</div>
    <div class="div-padding price">退款金额&nbsp;:&nbsp;<span>￥{{$data['refund_money']}}</span></div>
    <div class="div-padding">
        退款原因&nbsp;:
        @if($data['reason']==1)
        买错课了
        @elseif($data['reason']==2)
        没时间学
        @elseif($data['reason']==3)
        想换一个别的课程
        @elseif($data['reason']==4)
        其他
        @endif
    </div>
    <div class="div-padding">退款说明&nbsp;:&nbsp;{{$data['refund_reason']}}</div>
</div>