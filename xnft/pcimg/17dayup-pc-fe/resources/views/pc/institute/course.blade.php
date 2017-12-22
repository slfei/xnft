<?php 
   $insti = 2;
?>
@extends('pc.institute.common-header')
@section('institute-main')
<div>
	<div class="sort-head clearfix">
		<a class="@if($tplData['type']=='0') course_active @endif" href="/institute/courselist/{{$tplData['institute_info']['id']}}?type=0&is_listen={{$tplData['is_listen']}}">全部</a>
		<a class="@if($tplData['type']=='1') course_active @endif" href="/institute/courselist/{{$tplData['institute_info']['id']}}?type=1&is_listen={{$tplData['is_listen']}}">免费</a>
		<a class="@if($tplData['type']=='2') course_active @endif" href="/institute/courselist/{{$tplData['institute_info']['id']}}?type=2&is_listen={{$tplData['is_listen']}}">折扣</a>
		<a class="course_listen"><label style="cursor: pointer" class="listen_checked @if($tplData['is_listen']=='1') course_listen_active @endif"></label>可试听</a>
		<script>
			window.sort_course = {
				checked_num: '{{ $tplData["is_listen"] }}',
				sort_type: '{{ $tplData["type"] }}',
				course_id: '{{$tplData["institute_info"]["id"]}}'
			}
		</script>
		<a class="hide"><input  type="checkbox" name=""> 直播</a>
	</div>
	<div class="this-padding white-bg clearfix">
		@if(empty($tplData['data']))
		    <div class="no-data-type text-center">
		    	<div class="no-data-bg no-course">
		    	</div>
		    	<div>
		    		暂无课程
		    	</div>
		    </div>
		@else
			@component('pc.components.course.course-lists',
			[
			'datas'=>$tplData['data'],
			'is_hover_bg'=>false
			])
			@endcomponent
		@endif
	</div>
	<div class="my-pagination">
	@component('pc.components.pagination.index', ['data'=> [
	    'total' => $tplData['total'],
	    'page_size' => $tplData['page_size'],
	    'current' => $tplData['page_num']
	] ])
	@endcomponent
	</div>
</div>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/page/institute/course.css">
@endsection

@section('script')
    <script src="/build/js/page/institute/institute.js"></script>
@stop
