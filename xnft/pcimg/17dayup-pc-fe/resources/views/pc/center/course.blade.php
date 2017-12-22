@extends('pc.components.center.center_sidebar')
<?php 
   $side_active = 1;
?>
@section('center-main')
<div class="my-course">
	<div class="course-tab clearfix">
		<div class="course-tab-left pull-left">
			<a href="/center/course/?sort=1&type={{$tplData['type']}}" class="center-titleo @if($tplData['sort']==1) center-active border-active @endif">
			学习动态
			</a>
			<a href="/center/course/?sort=2&type={{$tplData['type']}}" class="center-titleo @if($tplData['sort']==2) center-active border-active @endif">
			加入时间
			</a>
		</div>
		<div class="course-tab-right pull-right">
			<a href="/center/course/?sort={{$tplData['sort']}}&type=0" class="center-titleo @if($tplData['type']==0) center-active @endif">
				全部
			</a>
			<a href="/center/course/?sort={{$tplData['sort']}}&type=2" class="center-titleo @if($tplData['type']==2) center-active @endif">
			付费
			</a>
			<a href="/center/course/?sort={{$tplData['sort']}}&type=1" class="center-titleo free-course @if($tplData['type']==1) center-active @endif">
				免费
			</a>
		</div>
	</div>
	@if(empty($tplData['data']))
	    <div class="no-data-type text-center">
	    	<div class="no-data-bg no-course">
	    	</div>
	    	<div>
	    		暂无课程

	    	</div>
	    </div>
	@else
	<div class="w-my-course">
		<div class="tutorial clearfix">
				@foreach ($tplData['data'] as $course_li)

					<li class="course_li">
						<div class="hover_course">
							<img src="{{$course_li['course_img']}}">
							<div class="course_label">
								<p><a href="/course/{{$course_li['course_id']}}" target="_blank" id="{{$course_li['course_id']}}">{{$course_li['course_name']}}</a></p>
								<span class="end_time pull-left text-left">
								@if($course_li['end_time']==0)
								永久
								@else
								{{$course_li['end_time']}}到期
								@endif
								</span>
							</div>
							 <div class="study-process">
							 	<p>学习进度: <span class="@if($course_li['speed']!=0) active @else init @endif">
                                    {{$course_li['speed']}} </span> /  {{$course_li['class_num']}}
                                </p>
							 	<div class="progress-container">
							 		<div class="progress-rate" style="width:{{$course_li['percent']}}"></div>
							 	</div>
							 </div>

							 <div class="hover-mask hide">
							 	<div class="clearfix">
							 	@if($course_li['type']==1)
							    	<i id="course_{{$course_li['id']}}" class="close-avator pull-right js_removeCourse"></i>
							    	<div class="course_mask"><a href="/course/{{$course_li['course_id']}}" target="_blank" id="{{$course_li['course_id']}}"></a></div>
							    @else
							       <a href="/course/{{$course_li['course_id']}}" target="_blank" id="{{$course_li['course_id']}}"></a>
							    @endif
							    </div>
							    <div class="began-study text-center">
							 		<a href="/course/player/{{$course_li['course_id']}}" target="_blank" class="w-btn-primary" id="{{$course_li['course_id']}}" >
							        @if($course_li['speed']==0)
							        开始学习
							        @else
							        继续学习
							        @endif
							 		</a>
							 		<script >
							 		 function gostudy(e){
							 		    console.log(e.id)
							 		    window.location.href='/course/' + e.id
							 		 }
							 		</script>
							 	</div>
							 </div>

						</div>
					</li>
				@endforeach

		</div>
		<div class=" my-pagination">
			@component('pc.components.pagination.index', ['data'=> [
			    'total' => $tplData['total'],
			    'page_size' => $tplData['page_size'],
			    'current' => $tplData['page_num']
			]])
			@endcomponent
		</div>
	</div>
	@endif
</div>
@component('pc.center.cancel-modal') 
@endcomponent
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/center/course.css">
@endsection

@section('script')
    <script src="/build/lib/toast/jquery.toast.min.js"></script>
    <script src="/build/js/page/center/course.js"></script>
@stop
