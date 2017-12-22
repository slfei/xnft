<?php 
   $side_active = 2;
   function genUrl()
   {
       return "/center/order" ;
   }
?>
@extends('pc.components.center.center_sidebar')
@section('center-main')
@if(empty($tplData['data']))
	<div class="order-table">
		<div class="clearfix">
		 	<table class="table" cellpadding="0">
		 		<thead class="white-bg">
		 			<th>订单详情</th>
		 			<th>订单金额</th>
		 			<th class="all-status">
		 			    @if($tplData['status']==0)
		 			       全部状态
		 			    @else
		 			      @foreach($tplData['order_status'] as $statu)
                              @if($statu['status_id'] == $tplData['status'])
                                 {{$statu['status_name']}}
                              @endif
		 			      @endforeach
		 			    @endif 
		 				<i class="ion-ios-arrow-down toggle-status"></i>
			 			<div class="left-area status-list hide-status">
			 			        <li>
		 						    <a href="/center/order">全部状态</a>
		 					    </li>
			 				@foreach ($tplData['order_status'] as $status_li)
			 					<li>
			 						<a href="/center/order?status={{$status_li['status_id']}}">{{$status_li['status_name']}}</a>
			 					</li>
			 				@endforeach
			 			</div>
		 			</th>
		 			<th>交易操作</th>
		 		</thead>
		 	</table>
		 </div>
	</div>
    <div class="no-data-type text-center">
    	<div class="no-data-bg no-order">
    	</div>
    	<div>
    		暂无订单
    	</div>
    </div>
@else
<div class="order-table clearfix">
	<div class="clearfix">
	 	<table class="table" cellpadding="0" cellspacing="0">
	 		<thead class="white-bg">
	 			<th>订单详情</th>
	 			<th>订单金额</th>
	 			<th class="all-status">
	 			    @if($tplData['status']==0)
	 			       全部状态
	 			    @else
	 			      @foreach($tplData['order_status'] as $statu)
                          @if($statu['status_id'] == $tplData['status'])
                             {{$statu['status_name']}}
                          @endif
	 			      @endforeach
	 			    @endif
	 				<i class="ion-ios-arrow-down toggle-status"></i>
		 			<div class="status-list hide-status">
		 			        <li>
		 						<a href="/center/order">全部状态</a>
		 					</li>
		 				@foreach ($tplData['order_status'] as $status_li)
		 					<li>
		 						<a href="/center/order?status={{$status_li['status_id']}}">{{$status_li['status_name']}}</a>
		 					</li>
		 				@endforeach
		 			</div>
	 			</th>
	 			<th>交易操作</th>
	 		</thead>
	 		<tbody cellpadding="0" cellspacing="0">
	 			@foreach ($tplData['data'] as $order_li)
	 			<tr class="order-no">
		 			<td colspan="4">
		 				<span style="padding-right: 20px">{{$order_li['add_time']}} </span>
		 				<span>订单号 : {{$order_li['order_id']}}</span>
		 			</td>
	 			</tr>
	 			<tr class="order-detail white-bg">
	 				<td>
	 					<div class="course-img">
	 						<a href="/course/{{$order_li['course_id']}}" target="_blank">
                                <img src="{{$order_li['course_img']}}">
                            </a>
	 					</div>
	 					<div class="course-desc">
	 						<p><a href="/course/{{$order_li['course_id']}}" target="_blank" class="desHref" title="{{ $order_li['course_name'] }}">{{ $order_li['course_name'] }}</a></p>
	 						<span class="course-label">
	 							@if($order_li['institute_type']==2)
	 							   <a href="/institute/homepage/{{$order_li['institute_id']}}" target="_blank" class="desInstitute">{{ $order_li['institute'] }}</a>
	 							@else
	 							   <a href="/personal/homepage/{{$order_li['institute_id']}}" target="_blank" class="desInstitute">{{ $order_li['institute'] }}</a>
	 							@endif
	 						</span>
	 					</div>
	 				</td>
	 				<td class="center-position">￥{{$order_li['real_price']}}</td>
	 				@if($order_li['balance_status']==1)
	 				<td class="center-position">待付款</td>
                    <td class="order_option">
	 				 <a class="w-btn-primary order_btnw" href="/order/pay?order_id={{$order_li['order_id']}}">去支付</a><br/>
	 				 <a class="no-style-btn cancel-order operate_btn" id="ok_{{$order_li['order_id']}}">取消订单</a>
	 				 </td>
	 				@elseif($order_li['balance_status']==2)
	 				<td class="center-position">交易关闭</td>
                    <td class="order_option">
	 				<a class="w-btn-primary re-buy order_btnw" href="javascript:void(0)" course_id="{{$order_li['course_id']}}">再次购买</a><br/>
	 				<a class="no-style-btn cancel-order delete-order operate_btn" id="ok_{{$order_li['order_id']}}">删除订单</a>
                    </td>
	 				@elseif($order_li['balance_status']==3)
	 				<td class="center-position">交易成功</td>
                    <td class="order_option">
		 				@if($order_li['is_learn'])
		 				    <a class="w-btn-primary order_btnw" href="/course/player/{{$order_li['course_id']}}" target="_blank">开始学习</a>
		 				@endif  
		 				@if($order_li['is_refund']==1)
		 				   <br/><a class="no-style-btn cancel-order" href="/order/refundapply?order_id={{$order_li['order_id']}}">申请退款</a>
		 				@elseif($order_li['is_learn'])
		 				   <br/>
		 				   <a class="no-style-btn need-comment" href="/center/publishcomment/?course_id={{$order_li['course_id']}}&enter_type=order" target="_blank">
                                @if($order_li['is_comment'])
                                   查看评价
                                @else
                                   我要评价
                                @endif
		 				   </a>
		 				@endif
                    </td>
	 				@elseif($order_li['balance_status']==4)
	 				<td class="center-position">退款确认中</td>
                    <td class="order_option">
		                <a class="w-btn-danger order_btn" href="/order/refundprocess?order_id={{$order_li['order_id']}}">查看退款</a> <br/>
		                <a class="no-style-btn cancel-order operate_btn" id="ok_{{$order_li['order_id']}}">取消退款</a>
                    </td>
	 				@elseif($order_li['balance_status']==5)
	 				<td class="center-position">退款处理中</td>
                    <td class="order_option">
		                <a class="w-btn-danger finish-money order_btn" href="/order/refundresult?order_id={{$order_li['order_id']}}">查看退款</a>
                    </td>
	 				@elseif($order_li['balance_status']==6)
	 				<td class="center-position">退款完成</td>
                    <td class="order_option">
	 				    <a class="w-btn-danger finish-money order_btn" href="/order/refundresult?order_id={{$order_li['order_id']}}">查看退款</a>
                    </td>
	 				@endif
	 				
	 			</tr>
	 			@endforeach
	 		</tbody>
	 	</table>
 	</div>
 	@if(!empty($tplData['data']))
	 	<div class="my-pagination">
	 	@component('pc.components.pagination.index', ['data'=> [
	 	    'total' => $tplData['total'],
	 	    'page_size' => $tplData['page_size'],
	 	    'current' => $tplData['page_num']
	 	] ])
	 	@endcomponent
	 	</div>
 	@endif
</div>
@endif
@component('pc.center.cancel-modal')
@endcomponent
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/center/table.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/center/order.css">
@endsection

@section('script')
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/center/order.js"></script>
    <script type="text/javascript">
       console.log({{$tplData['status']}})
    </script>
@stop
