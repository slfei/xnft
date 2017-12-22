@extends('pc.common')
@section('main')
<div class="main-container clearfix help-agreement">
    <div class="pull-left left">
        @include('pc.components.help.sidebar')
    </div>
    <div class="pull-left right">
        <div class="title">服务协议</div>
        <div class="content">
            <div class="institute div-block-max">
                <div class="institute-content">
                    伟东云学堂提醒您：在使用伟东云学堂各项服务前，请您务必仔细阅读并透彻理解此服务协议（以下简称“本协议”）所有内容。您如果使用伟东云学堂服务，您的使用行为将被视为对本协议全部内容的认可。“伟东云学堂”指由北京伟创迪安教育科技有限公司（简称“伟东云学堂”）运营的网络交易平台，域名为www.wdyedu.com以及伟东云学堂启用的其他域名。
                </div>
            </div>
            <div class="buy div-block-max">
                <div class="buy-title">一、版权政策</div>
                <div class="buy-content div-block-normal">
                    根据《中国人民共和国著作权法》、《信息网络传播权保护条例》、《互联网著作权行政保护办法》、《互联网视听节目服务管理规定》等相关法律、法规的规定，北京伟创迪安教育科技有限公司（以下简称伟东云学堂）为保护会员和版权方的合法权益，针对伟东云学堂根据会员指令提供作品上载、传播的信息网络侵权，采取如下版权政策：
                    <div class="div-block-normal">
                        1、入驻伟东云学堂的商家履行对网络版权尊重、谨慎的原则，上架出售的产品须持有商品版权，或权利人授权证书（加盖公章），未经许可而私自出售无版权产品，一经发现，会员自行承担由此造成的全部法律责任；
                    </div>
                    <div class="div-block-normal">2、伟东云学堂履行对网络版权合理、审慎的保护义务，有理由确信存在明显侵犯任何第三方版权作品时，有权不事先通知并随时删除该涉嫌侵权作品；
                    </div>
                    <div class="div-block-normal">3、伟东云学堂在接到符合法定要求的版权通知后，将在合理时间内删除涉嫌侵权作品；</div>
                    <div class="div-block-normal">4、伟东云学堂采取必要的技术措施，尽可能防止相同的侵权作品的再次上传；</div>
                    <div class="div-block-normal">5、伟东云学堂对有证据证明存在反复上传侵权作品行为的会员，有权随时停止向其提供网络存储空间的技术服务。</div>
                    <div class="div-block-normal">
                        伟东云学堂是一个中立的平台服务提供者，仅向课程发布者提供信息存储空间、链接等中立的网络服务或相关中立的技术支持服务，以供课程发布者在中立的平台上自主发布、运营、推广其课程等。课程发布者的课程由课程发布者自主开发、独立运营并独立承担全部责任。伟东云学堂不会、也不可能参与课程发布者课程的研发、运营等任何活动，伟东云学堂也不会对课程发布者的课程进行任何的修改、编辑或整理等。因课程发布者课程产生的任何纠纷、责任等，以及课程发布者违反相关法律法规或本协议约定引发的任何后果，均由课程发布者独立承担责任、赔偿损失，与伟东云学堂无关。如侵害到用户、伟东云学堂或他人权益的，课程发布者须自行承担全部责任和赔偿一切损失，第三人要求伟东云课堂要求承担责任的，伟东云课堂有权就全部损失（包括但不限于赔偿第三人的损失、诉讼费、保全费、律师代理费、差旅费等）向课程发布者追偿。
                    </div>
                </div>
            </div>
            <div class="refund div-block-max">
                <div class="refund-title">二、版权投诉</div>
                <div class="refund-content">
                    <div class="div-block-normal">1. 投诉通知程序</div>
                    <div class="div-block-normal">
                        任何单位或个人认为伟东云学堂网页内容（包括但不限于伟东云学堂会员发布的商品信息）可能涉嫌侵犯其合法权益，应该及时向伟东云学堂提出书面权利通知，通知书需由权利人或其合法授权人亲笔签名，若为单位则需加盖单位公章。 通知书应当包含下列内容（请使用国家版权局发布的示范格式，详见下文附件）：
                    </div>
                    <div class="div-block-normal">（1） 权利人的姓名（名称）、联系方式、地址、身份证复印件（自然人）、单位登记证明复印件（单位）；</div>
                    <div class="div-block-normal">（2）要求删除或者断开链接的侵权作品的准确名称和网络地址，以便伟东云学堂能够发现并初步审核涉嫌侵权作品；</div>
                    <div class="div-block-normal">（3）认为构成侵权的初步证明材料，包括但不限于对作品享有版权或依法享有信息网络传播权的权属证明等。/div>
                        <div class="div-block-normal">权利人应对通知书的真实性负责。若通知书的内容不真实，权利人将承担由此造成的全部法律责任。</div>
                        <div class="div-block-normal">伟东云学堂在收到上述法律文件后，将：</div>
                        <div class="div-block-normal">（1）将在合理时间内删除涉嫌侵权的作品，或者断开涉嫌侵权作品的链接，并同时通知课程发布者；</div>
                        <div class="div-block-normal">（2）除履行反通知程序外，对使用同一账号多次上传同一侵权作品的会员，伟东云学堂有权不事先通知并随时终止该账号的使用。</div>
                        <div class="div-block-normal">2. 反通知程序</div>
                        <div class="div-block-normal">
                            课程发布者收到伟东云学堂转送的通知书后，认为其提供的作品并未侵犯他人权利的，可向伟东云学堂提交反通知的书面说明，要求恢复被删除的作品或被断开的作品链接。反通知书需课程发布者或其合法授权人亲笔签名，若为单位则需加盖单位公章。
                        </div>
                        <div class="div-block-normal">反通知应当包含下列内容（请使用国家版权局发布的示范格式，详见下文附件）：</div>
                        <div class="div-block-normal">(1) 课程发布者的姓名（名称）、联系方式、地址、身份证复印件（自然人）、单位登记证明复印件（单位）；</div>
                        <div class="div-block-normal">(2) 要求恢复被删除的作品，或者被断开链接的作品的准确名称和网络地址，以便伟东云学堂能够发现并初步审核涉嫌侵权作品；</div>
                        <div class="div-block-normal">(3) 认为不构成侵权的初步证明材料，包括但不限于对作品享有著作权或依法享有信息网络传播权的权属证明等。</div>
                        <div class="div-block-normal">课程发布者应对反通知书的真实性负责。若通知书的内容不真实，提供者将承担由此造成的全部法律责任。</div>
                        <div class="div-block-normal">
                            伟东云学堂收到课程发布者的反通知后，将立即恢复被删除的作品或者被断开的作品链接，同时将课程发布者的反通知转送权利人。伟东云学堂对恢复被删除作品，或者被断开作品链接的行为不承担任何法律责任。
                        </div>
                        <div class="div-block-normal">权利人不得再通知伟东云学堂删除该作品，或者断开与该作品的链接。</div>
                        <div class="div-block-normal">
                            伟东云学堂转载作品（包括论坛内容）出于传递更多信息之目的，并不意味伟东云学堂（包括伟东云学堂关联企业）赞同其观点或证实其内容的真实性。伟东云学堂网尊重合法版权，反对侵权盗版。若本网有部分文字、摄影作品等侵害了您的权益，在此深表歉意，请您立即将侵权链接及侵权信息邮件至我们的版权投诉邮箱info@51jianjiao.com，我们会尽快与您联系并解决。
                        </div>

                    </div>
                </div>
            </div>
            <div class="refund-flow div-block-max">
                <div class="refund-title">三、退款说明</div>
                <div class="refund-content">
                    <div class="">
                        <div class="div-block-normal">
                            1.用户向课程发布者支付课程费用后，如课程发布者发布的课程不存在违反法律法规规定及伟东云学堂相关规定，亦不存在按伟东云学堂相关规定可以退费的情况下，用户在报名成功后，均不得申请退款；
                        </div>
                        <div class="div-block-normal">
                            2.用户向课程发布者支付课程费用后，如课程发布者发布的课程存在违反法律法规规定及伟东云学堂相关规定而发生退费的，则用户同意按如下规则退费：
                        </div>
                        <div class="div-block-normal">
                            （1）如果用户购买的是录播课程或含有录播课程，此课程具有退课服务且在购课20天内，如用户未观看课程则可申请退款，若用户已经观看，则无法申请退款；
                        </div>
                        <div class="div-block-normal">
                            （2）如果用户购买的是直播课程，且购买当时已经开课，由于用户可以观看已经开课课程的回放内容，因此，可以回放的课程视为用户已经学习的课程而不予退费，即，用户可以要求退费的比例为尚未开课的课程除以课程发布者发布的所有课程；
                        </div>
                        <div class="div-block-normal">
                            3.若用户购买的课程不是通过伟东云学堂提供的支付方式完成支付的，用户与课程发布者之间就款项支付、退款等任何事项，由用户与课程发布者自行协商解决，用户无权向伟东云学堂主张任何权利或要求伟东云学堂承担任何责任。
                        </div>

                    </div>
                </div>
            </div>
            <div class="indate div-block-max">
                <div class="refund-title">四、隐私权政策：</div>
                <div class="refund-content">
                    <div class="div-block-normal">
                        伟东云学堂尊重并保护所有使用伟东云学堂服务会员的个人隐私权。为了给您提供更准确、更有个性化的服务，伟东云学堂会按照本隐私权政策的规定使用和披露您的个人信息。但伟东云学堂将以高度的勤勉、审慎义务对待这些信息。除本隐私权政策另有规定外，在未征得您事先许可的情况下，伟东云学堂不会将这些信息对外披露或向第三方提供。伟东云学堂会不时更新本隐私权政策。 您在同意伟东云学堂服务协议之时，即视为您已经同意本隐私权政策全部内容。本隐私权政策属于伟东云学堂服务协议不可分割的一部分。
                    </div>
                    <div class="div-block-normal">1. 适用范围</div>
                    <div class="div-block-normal">（1）
                        在您注册或激活可以登录伟东云学堂的账户时，您在伟东云学堂或伟东集团其他平台提供的个人注册信息（应法律法规要求需公示的企业名称等相关工商注册信息以及自然人经营者的信息除外）；
                    </div>
                    <div class="div-block-normal">（2）
                        在您使用伟东云学堂服务，或访问伟东云学堂网页时，伟东云学堂自动接收并记录您的浏览器和计算机上的信息，包括但不限于您的IP地址、浏览器的类型、使用的语言、访问日期和时间、软硬件特征信息及您需求的网页记录等数据；如您下载或使用伟东云学堂或其关联公司移动客户端软件，或访问移动网页使用伟东云学堂服务时，伟东云学堂可能会读取与您位置和移动设备相关的信息，包括但不限于设备型号、设备识别码、操作系统、分辨率、电信运营商等。
                    </div>
                    <div class="div-block-normal">（3） 伟东云学堂通过合法途径从商业伙伴处取得的会员个人数据。</div>
                    <div class="div-block-normal">（4）您了解并同意，以下信息不适用本隐私权政策：</div>
                    <div class="div-block-normal div-padding-left">a）您在使用伟东云学堂提供的搜索服务时输入的关键字信息；</div>
                    <div class="div-block-normal div-padding-left">b）在您未选择“匿名购买”和/或“匿名评价”功能时，伟东云学堂收集到的您在伟东云学堂进行交易的有关数据，包括但不限于出价、成交信息及评价详情；
                    </div>
                    <div class="div-block-normal div-padding-left">c）信用评价、违反法律规定或违反伟东云学堂规则行为及伟东云学堂已对您采取的措施。</div>
                    <div class="div-block-normal ">2. 信息使用</div>
                    <div class="div-block-normal">（1）
                        伟东云学堂不会向任何无关第三方提供、出售、出租、分享或交易您的个人信息，除非事先得到您的许可；第三方和伟东云学堂（含伟东云学堂关联公司）单独或共同为您提供服务，且在该服务结束后，其将被禁止访问包括其以前能够访问的所有资料。
                    </div>
                    <div class="div-block-normal">
                        （2）伟东云学堂亦不允许任何第三方以任何手段收集、编辑、出售或者无偿传播您的个人信息。任何伟东云学堂会员如从事上述活动，一经发现，伟东云学堂有权立即终止与该会员的服务协议。
                    </div>
                    <div class="div-block-normal">
                        （3）为服务会员的目的，伟东云学堂或其关联公司可能通过使用您的个人信息，向您提供您可能感兴趣的信息，包括但不限于向您发出产品和服务信息，或通过系统向您展示个性化的第三方推广信息，或者与伟东云学堂合作伙伴共享信息以便他们向您发送有关其产品和服务的信息（后者需要您的事先同意）。
                    </div>
                    <div class="div-block-normal">
                        （4）伟东云学堂可以使用您的个人信息以预防、发现、调查欺诈、危害安全、非法或违反与伟东云学堂或其关联公司协议、政策或规则的行为，以保护您、其他伟东云学堂会员，或伟东云学堂或其关联公司合法权益。
                    </div>
                    <div class="div-block-normal">3. 信息披露</div>
                    <div class="div-block-normal">在如下情况下，伟东云学堂将依据您的个人意愿或法律的规定全部或部分的披露您的个人信息：</div>
                    <div class="div-block-normal">（1）经您事先同意，向第三方披露；</div>
                    <div class="div-block-normal">（2）如您是适格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷；</div>
                    <div class="div-block-normal">（3）根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；</div>
                    <div class="div-block-normal">（4）如您出现违反中国有关法律、法规或者伟东云学堂服务协议或相关规则的情况，需要向第三方披露；</div>
                    <div class="div-block-normal">（5）为提供您所要求的产品和服务，而必须和第三方分享您的个人信息；</div>
                    <div class="div-block-normal">
                        （6）在伟东云学堂上创建的某一交易中，如交易任何一方履行或部分履行了交易义务并提出信息披露请求的，伟东云学堂有权决定向该会员提供其交易对方的联络方式等必要信息，以促成交易的完成或纠纷的解决；
                    </div>
                    <div class="div-block-normal">（7）其他伟东云学堂根据法律、法规或者网站政策认为合适的披露。</div>
                    <div class="div-block-normal">4. 信息存储和交换</div>
                    <div class="div-block-normal">
                        伟东云学堂收集的有关您的信息和资料将保存在伟东云学堂及（或）其关联公司的服务器上，这些信息和资料可能传送至您所在国家、地区或伟东云学堂收集信息和资料所在地的境外并在境外被访问、存储和展示。
                    </div>
                    <div class="div-block-normal">5. Cookie的使用</div>
                    <div class="div-block-normal">
                        （1）在您未拒绝接受cookies的情况下，伟东云学堂会在您的计算机上设定或取用cookies，以便您能登录或使用依赖于cookies的伟东云学堂服务或功能。伟东云学堂使用cookies可为您提供更加周到的个性化服务，包括推广服务；
                    </div>
                    <div class="div-block-normal">
                        （2）您有权选择接受或拒绝接受cookies。您可以通过修改浏览器设置的方式拒绝接受cookies。但如果您选择拒绝接受cookies，则您可能无法登录或使用依赖于cookies的伟东云学堂服务或功能；
                    </div>
                    <div class="div-block-normal">（3）通过伟东云学堂所设cookies所取得的有关信息，将适用本政策。</div>
                    <div class="div-block-normal">6. 信息安全</div>
                    <div class="div-block-normal">
                        （1）您的账户均有安全保护功能，请妥善保管您的账户及密码信息。伟东云学堂将通过向其它服务器备份、对会员密码进行加密等安全措施确保您的信息不丢失，不被滥用和变造。尽管有前述安全措施，但同时也请您注意在信息网络上不存在“完善的安全措施”；
                    </div>
                    <div class="div-block-normal">（2）
                        在使用伟东云学堂服务进行网上交易时，您不可避免的要向交易对方或潜在的交易对方披露自己的个人信息，如联络方式。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。如您发现自己的个人信息泄密，尤其是你的账户及密码发生泄露，请您立即联络伟东云学堂客服，以便伟东云学堂采取相应措施。
                    </div>
                    <div class="div-block-normal">7. 未成年人的特别注意事项</div>
                    <div class="div-block-normal">
                        我们非常重视对未成年人个人信息的保护，若您是18周岁以下的未成年人，建议您请您的监护人仔细阅读本隐私权政策，并在征得您的监护人同意的前提下使用我们的服务或向我们提供信息。伟东云学堂根据国家相关法律法规的规定保护未成年人的个人信息。
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
<link rel="stylesheet" type="text/css" href="/build/css/page/help/agreement.css">
@endsection
