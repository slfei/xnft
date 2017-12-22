<?php 
   $insti = 1;
?>
@extends('pc.components.teacher_detail.common_header')
@section('teacher-main')
<div class="teacher-index">
	<div class="t-base-info teacher-padding">
		 <h3>讲师信息</h3>
		 <p>
		 	 <label> 教学科目: </label><span>{{$tplData['info']['person_type']==''?"暂无":$tplData['info']['person_type']}}</span>
		 </p> 
		 <p>
		 	<label> 实际教龄: </label><span>{{$tplData['info']['school_age']==''?"暂无":$tplData['info']['school_age']}}</span>
		 </p>
		 <p>
		 	<label> 教学特长: </label><span>{{$tplData['info']['description']==''?"暂无":$tplData['info']['description']}}</span>
		 </p>
	</div>
	<div class="t-best-course clearfix">
	@if(empty($tplData['course_list']))
	    <div class="no-data-type text-center">
	    	暂无课程
	    </div>
	@else
		@forEach($tplData['course_list'] as $course_cats)
			@if(count($course_cats['courses']))
			   <div class="good-courses white-bg clearfix">
				   	<div class="white-bg clearfix teacher-padding">
						<h3 class="pull-left">{{$course_cats['title']}}</h3>
						<p class="all-course pull-right"><a href="">全部课程 <i class="ion-ios-arrow-right"></i></a></p>
					</div>
					<div class="course-recommend clearfix">
						@component('pc.components.course.course-lists',
						[
						'datas'=>$course_cats['courses'],
						'is_hover_bg'=>false
						])
						@endcomponent
					</div>
				</div>
			@endif
		@endforEach
	@endif
	</div>
</div>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/page/teacher/index.css">
@endsection
