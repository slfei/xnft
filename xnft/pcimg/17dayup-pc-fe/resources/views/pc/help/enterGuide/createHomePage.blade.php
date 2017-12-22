@extends('pc.common')
@section('main')
    <div class="main-container clearfix enterGuide">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">快速设置主页</div>
            <div class="content">
                <div class="rule div-block-max">
                    <div class="rule-title">主页是您的门面，一个精心设计的主页更能吸引学员。</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title"> 第一步，设置主页信息，进入菜单【机构主页/老师主页】---【主页设置】中。主页设置包括设置轮播宣传图、设置课程合辑、设置明星讲师；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/homepage.gif">
                        </div>
                    </div>
                    <div class="rule-title">保存预览和提交：‘保存及预览’按钮表示信息的预览及保存，商户后台的信息会被更新，但不会更新您主页的内容。‘确认提交’按钮表示将会更新您的主页内容。每次信息的修改都需要重新确认提交。</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第二步，设置关于我们，填写机构简介和公司发展历程有助于学员更好的了解您；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/about.gif">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('lib')
    <link rel="stylesheet" type="text/css" href="/build/lib/bootstrap/bootstrap.min.css">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="/build/css/pc.css">
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/enteryGuide/createHomePage.css">
@endsection
