@extends('pc.common')
@section('main')
    <div class="main-container clearfix enterGuide">
        <div class="pull-left left">
            @include('pc.components.help.sidebar')
        </div>
        <div class="pull-left right">
            <div class="title">快速创建课程</div>
            <div class="content">
                <div class="rule div-block-max">
                    <div class="rule-title">创建课程前需要准备以下素材：</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">1.课程图片，建议尺寸600*338，小于2M。课程必备素材。</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">2.课程介绍，建议图文结合效果更佳。课程必备素材。</div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">3.课程相关的录播视频。课程必备素材。<br>视频需要先去【视频管理】上传完成。上传完成的视频，需要经过转码和审核，审核通过的视频才能被课程使用哦！</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/scsp.gif">
                        </div>
                    </div>
                </div>
                <div class="rule div-block-max">
                    <div class="rule-title">4.课程相关的教学资料。课程非必备素材。如果你的课程有Word、PPT等教辅资料需要学员下载，可以先去【资料管理】上传资料。资料不需要审核。</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/sczl.gif">
                        </div>
                    </div>
                    <div class="rule-title">创建课程：以上素材准备完毕后，进入菜单【教学管理】---【课程管理】中，点击‘创建课程’。</div>
                    <div class="rule-title">第一步，填写课程名称、课程图片、课程介绍等课程的基本信息；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/create1.gif">
                        </div>
                    </div>
                    <div class="rule-title">第二步，设置课程的价格信息；</div>
                    <div class="rule-title">第三步，营销设置，让您的课程内容更丰富，服务更完善；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/create23.gif">
                        </div>
                    </div>
                    <div class="rule-title">第四步，创建课程目录，上传课程视频；</div>
                    <div class="rule-content">
                        <div class="div-block-normal">
                            <img src="/build/img/help/enteryGuide/create4.gif">
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
    <link rel="stylesheet" type="text/css" href="/build/css/page/help/enteryGuide/createCourse.css">
@endsection
