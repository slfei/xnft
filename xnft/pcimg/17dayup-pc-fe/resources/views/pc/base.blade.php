<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if(isset($title)) {{$title}} @else伟东云学堂@endif</title>
    <link rel="icon" href="/build/img/fav.ico" type="image/x-icon">
    <meta name="keywords" content="@if(isset($keywords)) {{$keywords}} @else伟东云学堂@endif">
    <meta name="description" itemprop="description" content="@if(isset($description)) {{$description}} @else伟东云学堂@endif">
    <meta name="baidu-site-verification" content="TymQpjkZxF" />
    <meta name="360-site-verification" content="3124f7ed75e9fccb07e458cfc5ac8f31" />
    @section('lib')
    @show
    <link rel="stylesheet" type="text/css" href="/build/css/base.css">
    <link rel="stylesheet" type="text/css" href="/build/lib/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="//17dayup-passport-dev.bj.bcebos.com/passport.css">
    @section('style')
    @show
</head>
<body @section('bodyClass')@show>

<div class="content" id="content">
    @yield('content')
</div>

<script>
    window.PASSPORT_HOST = "{{ $passport_host }}";
    window.BIZ_HOST = "{{ $biz_host }}";
    window.WWW_HOST = "{{ $www_host }}";
</script>
<script src="/build/lib/jquery/dist/jquery.min.js"></script>
<script src="//17dayup-passport-dev.bj.bcebos.com/passport.js"></script>
<script src="/build/js/page/base.js"></script>
@yield('script')
<script type="text/javascript">
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?cfc99c618211ef6d7feb13fe17499f2c";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
