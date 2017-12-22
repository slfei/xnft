<?php 
   $side_active = 6;
   $data = [['id'=>0,'name'=>'购课优惠券','price'=>'99','rule'=>'满80元可用','daterule'=>'限2018年6月10日前可用'],['id'=>1,'name'=>'购课优惠券','price'=>'199','rule'=>'满80元可用','daterule'=>'限2018年6月10日前可用'],['id'=>3,'name'=>'购课优惠券','price'=>'88','rule'=>'满80元可用','daterule'=>'限2018年6月10日前可用'],['id'=>2,'name'=>'购课优惠券','price'=>'5','rule'=>'满80元可用','daterule'=>'限2018年6月10日前可用']]
?>
@extends('pc.components.center.center_sidebar')
@section('center-main')
<div class="user-coupon">
	<div class="coupon-title">
		<h3>优惠券</h3>
	</div>
	<div class="coupon-main">
		@if(empty($data))
		    <div class="no-data-type text-center">
		    	<div class="no-data-bg no-coupon">
		    	</div>
		    	<div>
		    		暂无优惠券
		    	</div>
		    </div>
		@else
		<div class="clearfix">
		@foreach ($data as $item)
			<div class="item-bg clearfix">
				<div class="coupon_head pull-left">
						 {{$item['price']}}
				</div>
				<div class="rule_content pull-left">
					<div class="subtitle">
						{{$item['rule']}}
					</div>
					<div class="coupon_date">
						{{$item['daterule']}}
					</div>
					<div class="userarea" title="适用范围:适用范围：国学、语言类课程">
						适用范围:适用范围：国学、语言类课程
					</div>
				</div>
			</div>
		@endforeach
		</div>
		@endif
	</div>
</div>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/page/center/coupon.css">
@endsection

@section('script')
	<script src="/build/js/page/center/coupon.js"></script>
@stop
