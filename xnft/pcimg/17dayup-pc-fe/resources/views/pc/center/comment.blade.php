@extends('pc.components.center.center_sidebar')

<?php 
   $side_active = 4;
   $notice_active = 2;
?>
@section('center-main')
<div class="user-notice">
	<div class="notice-tab clearfix">
		<a href="/center/notice" class="center-titleo @if($notice_active==1) center-active border-active @endif">
			系统消息
			<span class="number-message" id="number-message">9</span>
		</a>
		<a href="/center/comment" class="center-titleo @if($notice_active==2) center-active border-active @endif">
			评论
		</a>
	</div>
	@if(empty($tplData['comment']))
	    <div class="no-data-type text-center">
	    	<div class="no-data-bg no-data">
	    	</div>
	    	<div>
	    		暂无评论
	    	</div>
	    </div>
	@else
	<div class="my-comment-reply">
	@foreach ($tplData['comment'] as $my_comment)
		<div class="each-notice">
		   <div class="institute-area clearfix">
				<div class="institute-logo">
					<img src="{{$my_comment['logo_url']}}">
				</div>
				<div class="institute-desc">
					<a href="">
					<span class="institute-name">{{$my_comment['institute_name']}}</span>
					</a> :  
					<span class="response-text"> {{$my_comment['institute_reply']}}</span>
				</div>
			</div>
			<div class="my-comment white-bg">
				<div>回复我对 <a><span class="course-name">{{$my_comment['course_name']}}</span></a> 课程的评论 : <span class="my-view"> {{$my_comment['user_reply']}}</span>
				</div>
				<div class="message-triangle">
				</div>
			</div>
			<div class="update-date">
				{{$my_comment['updated_at']}}
			</div>
		</div>
	@endforeach
	</div>
	<div class="my-pagination">
		@component('pc.components.pagination.index', ['data'=> [
		    'total' => $tplData['pager']['totalCount'],
		    'page_size' => $tplData['pager']['page_size'],
		    'current' => $tplData['pager']['page_num']
		] ])
		@endcomponent
	</div>
	@endif
</div>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/center/notice.css">
@endsection
@section('script')
	<script src="/build/js/page/center/comment.js"></script>
@stop

