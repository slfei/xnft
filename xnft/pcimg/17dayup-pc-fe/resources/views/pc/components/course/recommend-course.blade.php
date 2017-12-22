<div class="hot-course clearfix">
	<div class="hot-head clearfix">
		<div class="hot-title pull-left">
			热门课程
		</div>
		<div class="hot-more pull-right">
			<a href="/course/discovery">更多 <i class="ion-ios-arrow-right"></i></a>
		</div>
	</div>
	<div class="course_li">
		@foreach ($hotcourse_li as $course_list)
			<div class="each_course li-course">
				<div class="img_size">
					<a href="/course/{{$course_list['course_id']}}"><img src="{{$course_list['course_img']}}"></a>
				</div>
				<div class="course_desc">
					<a href="/course/{{$course_list['course_id']}}" class="ahre">{{$course_list['sentence']}}</a>
				</div>
				<div class="course_item clearfix">
					<span class="@if($course_list['cur_price']==0) free @else  price @endif">
						@if($course_list['cur_price'] !=0) 
							¥{{$course_list['cur_price']}}
						@else
							免费
						@endif
					</span>
					<a class="institute_name pull-right resourse-name" href="/{{$course_list['from_type']}}/homepage/{{$course_list['from_id']}}">
					{{$course_list['from_name']}}
					</a>
				</div>
			</div>
		@endforeach
	</div>
</div>
