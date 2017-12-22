<div class="tab-switch clearfix">
	<a class="center-titleo tab_active center-active" id="tab1" href="javascript:void(0)">
		{{$data['tab-one']}}
	</a>
	<a class="center-titleo" id="tab2" href="javascript:void(0)">
		{{$data['tab-two']}}
	</a>
	<a class="center-titleo" id="tab3" href="javascript:void(0)">
	@if($data['tab-three'])
		修改密码
	@else
		设置密码
	@endif
	</a>
</div>
