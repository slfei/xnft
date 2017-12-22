@extends('pc.common')
@section('main')
    <div class="main-container registration">
        <div class="status">
            <img src="/build/img/course/registration-success.png" alt=""/>
            <span class="">报名成功</span>
        </div>
        <div class="description">您可以在 <a href="/center/course">《我的课表》</a>中查看课程并<a href="/course/player/{{$_GET['courseid']}}">《开始学习》</a>哦</div>
    </div>
@stop
@section('lib')

@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/course/registration.css">
@endsection
@section('script')

@stop
