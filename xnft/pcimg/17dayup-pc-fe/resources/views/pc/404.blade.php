@extends('pc.common')

@section('main')
   <div class="error">
       <div class="error_img">
           <img src="/build/img/error/404.png" alt="">
       </div>
       <div class="error_btn">
           <a href="//{{$www_host}}" class="error_l">返回首页</a>
           <a href="//{{$www_host}}/course/discovery" class="error_r">去找找课程</a>
       </div>
   </div>
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/error.css">
@endsection
