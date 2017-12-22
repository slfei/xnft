@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-about">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title padding-left">关于我们</div>
            <div class="text-justify padding-left img_top">
               <img src="/build/img/help/about.png">
            </div>
            <p class="text-justify padding-left">伟东云学堂是伟东云教育集团推出的全球领先的互联网教育云平台。作为教育资源学习及交易平台，伟东云学堂汇聚了全球优质的教学资源，提供开放的账户体系、安全便捷的交易能力、直播/录播/VR等先进教学和学习手段，为教育产品合作方提供构建教育产品经营和运作的一体化平台。</p>
            <p class="text-justify padding-left">伟东云学堂以让人们平等便捷的获取全球优质教育资源为愿景目标，涵盖了国学文化、亲子早教、基础教育、留学语言、IT互联网、职业技能、兴趣爱好以及国际教育等多个领域教育产品，为国内外互联网用户提供了专业优质的教育资源搜索、在线学习、教育资讯以及在线交易等全方位的教育互联网服务。</p>
        </div>
    </div>

@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/about.css">
@endsection
