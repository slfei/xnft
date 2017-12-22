@extends('pc.common')
@section('main')
    <div class="main-container clearfix help-enter">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">我要入驻</div>
            <div class="content">
                <div class="rule div-block-max">
                    <div class="rule-title">1. 入驻条件：注册并登录伟东云学堂的用户。</div>
                    <div class="rule-title">2. 入驻入口：</div>
                    <div class="rule-title">(1). 网站顶部导航点击【入驻平台】</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/enter.jpg">
                        </div>
                    </div>
                    <div class="rule-title">(2). 网站底部导航点击【机构入驻】或【讲师入驻】</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/enter1.png">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">3. 入驻申请说明<br>通过入驻入口进入入驻页面后，点击机构入驻或个人讲师入驻进入申请页面；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/enter2.png">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title title-weight">机构入驻申请说明</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第一部分，填写经营信息，经营信息是展示在页面上给学员看的信息，请认真填写</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/ienter1.gif">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第二部分，填写机构信息，机构信息是用于平台审核您的资质真实性，请如实填写</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/ienter2.gif">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第三部分，填写申请人信息，一是帮助平台审核您的资质真实性，二是方便平台和您及时取得联系，请如实填写</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/ienter3.gif">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title title-weight">个人讲师入驻申请说明</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第一部分，填写经营信息，经营信息是展示在页面上给学员看的信息，请认真填写</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/penter1.gif">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">第二部分，填写身份证明，身份证明是用于平台审核您的资质真实性，请如实填写</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enter/penter2.gif">
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
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/enter.css">
@endsection
