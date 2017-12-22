<?php

   $title = $tplData['institute_info']['name']."_伟东云学堂";

   $keywords = "";

   $description = $tplData['institute_info']['name']."入驻伟东云学堂啦，并为学员提供了超多的精品课程，一起来学习把！";

?>

@extends('pc.common')
@section('main')
<div class="institute-main-center">
	<div class="institute-center clearfix">
		<div class="institute-header white-bg clearfix">
		    <div class="institute-left pull-left">
				<div class="insti-logo pull-left">
					<img src="{{$tplData['institute_info']['img']}}">
				</div>
				<div class="insti-desc pull-left">
					<h3>{{$tplData['institute_info']['name']}}</h3>
					<div class="desc-content">
                        <div class="inner">{{$tplData['institute_info']['desc']}}</div>
                    </div>
					<div class="insti-label">
						<span>好评度  {{$tplData['institute_info']['good']}}</span>
						<span>课程数  {{$tplData['institute_info']['course']}}</span>
						<span>学生数  {{$tplData['institute_info']['student']}}</span>
					</div>
				</div>
			</div>
			<div class="online-ask pull-right">
				@if($tplData['institute_info']['consult'])
                <a href="{{$tplData['institute_info']['consult']}}" class="consult" target="_blank">在线咨询</a>
                @else
                <a href="javascript:void(0)" class="consult-disabled">在线咨询</a>
                @endif
			</div>
		</div>
		<div class="main-institute">
		    <div class="institute-navbar white-bg">
		       	<div class="nav-a">
			    	<a href="/institute/homepage/{{$tplData['institute_info']['id']}}" class="@if($insti==1) institute-active @endif">主页</a>
			    	<a href="/institute/courselist/{{$tplData['institute_info']['id']}}" class="@if($insti==2) institute-active @endif">课程 ({{$tplData['institute_info']['course']}})</a>
			    	<a href="/institute/teacherlist/{{$tplData['institute_info']['id']}}" class="@if($insti==3) institute-active @endif">讲师 ({{$tplData['institute_info']['teacher']}})</a>
			    	<a href="/institute/aboutus/{{$tplData['institute_info']['id']}}" class="about-us @if($insti==4) institute-active @endif" >关于我们</a>
		    	</div>
		    </div>
		    <div class="institute-content">
		    	@yield('institute-main')
		    </div>
		</div>
	</div>
</div>
@stop
