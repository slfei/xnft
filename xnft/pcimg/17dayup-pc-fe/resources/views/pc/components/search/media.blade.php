<div class="wx-meida1">
    <div class="media">
        <div class="media-left">
            <a href="@if($data['from_type']=='institute'||$data['from_type']==2) /institute/homepage/{{$data['from_id']}} @else /personal/homepage/{{$data['from_id']}}@endif" target="_blank"><img src="{{$data['logo']}}"/></a>
        </div>
        <div class="media-body">
            <div class="modal-title"><a href="@if($data['from_type']=='institute'||$data['from_type']==2) /institute/homepage/{{$data['from_id']}} @else /personal/homepage/{{$data['from_id']}}@endif" target="_blank">{{$data['ins_show_name']}}</a></div>
            <p class="text-justify single-row description">{{$data['short_des']}}</p>
            <ul class="list-unstyled list-inline">
                <li>好评度 <span class="praise">{{$data['praise']}}</span></li>
                <li>课程数 <span class="course_num">{{$data['course_num']}}</span></li>
                <li>学生数 <span class="">{{$data['student_num']}}</span></li>
            </ul>
        </div>
    </div>
</div>

