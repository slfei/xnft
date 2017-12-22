<?php
   $title = "入驻平台_机构入驻_伟东云学堂";

   $keywords = "入驻平台,机构入驻,个人讲师入驻,课程入驻育头条";

   $description = "伟东云学堂为机构和个人提供了不同的入驻方式，方便不同的用户能够快速找到自己合适的入驻方式。";
?>

@extends('pc.common')

@section('main')
   <div class="alertpc">
        内测进行中，敬请期待！
   </div>
   <div class="content">
      <div class="page_one">
         <div class="page_one_area">
            <div class="page_one_text1">
               欢迎入驻伟东云学堂
            </div>
            <div class="page_one_text2">
               成功，就是比别人早到一步
            </div>
            <div class="page_one_text3">
               在这里你就是名师
            </div>
            <div class="page_one_button">
               <div class="page_one_button1" id="joinInstitute">
                  @if(isset($tplData['user_info']) &&  $tplData['user_info']['is_enter'])
                       <a href="//{{$biz_host}}/institute/index" target="_blank">机构入驻</a>
                  @else
                       <a href="//{{$biz_host}}/institute/join" target="_blank">机构入驻</a>
                   @endif
               </div>

               <div class="page_one_button2" id="joinPersonal">
                  @if(isset($tplData['user_info']) &&  $tplData['user_info']['is_enter'])
                       <a href="//{{$biz_host}}/institute/index" target="_blank">个人讲师入驻</a>
                  @else
                       <a href="//{{$biz_host}}/institute/join#/application/personal" target="_blank">个人讲师入驻</a>
                   @endif
               </div>
            </div>
         </div>
      </div>
      <div class="page_two">
      </div>
      <div class="page_three">
        <div class="page_three_area">
           <div class="page_three_area_title">
              全方位展示机构优势
           </div>
           <div class="page_three_area_info">
              大图推荐位、首页推荐位、相关推荐等全方位课程展示位，让您获得更多的曝光量。我们更为优质内容量身定制个性化推广方案。
           </div>
           <div class="page_three_area_btn">
              <div class="page_three_area_btn1">
                 <a href="#">马上入驻</a>
              </div>
           </div>
        </div>
      </div>
      <div class="page_four">
          <div class="page_four_area">
             <div class="page_four_text1">
               我们严格保护您的课程版权
             </div>
             <div class="page_four_text2">
               支持录播、直播的课程发布模式，并采用业界领先的加密技术，对您的课程版权内容严格保护
             </div>
             <div class="page_four_btn">
               <div class="page_four_btn1">
                 <a href="#">马上入驻</a>
               </div>
             </div>
          </div>
      </div>
      <div class="page_five">
         <div class="page_five_area">
           <div class="page_five_area_title">
              自动化销售管理模式
           </div>
           <div class="page_five_area_info">
              规范性订单管理、退款管理、交易计费、交易结算以及交易对账，使销售管理流程更便捷
           </div>
           <div class="page_five_area_btn">
              <div class="page_five_area_btn1">
                 <a href="#">马上入驻</a>
              </div>
           </div>
         </div>
      </div>
      <div class="page_six">
         <div class="page_six_mask">
             <div class="page_six_area">
               <div class="page_six_text1">
                 高效可靠的运营方式
               </div>
               <div class="page_six_text2">
                 提供优惠券、抽奖、满减、积分、教育社区等多种运营工具，助力提升您的用户粘性和付费转化，提高交易量
               </div>
               <div class="page_six_btn">
                 <div class="page_six_btn1">
                   <a href="#">马上入驻</a>
                 </div>
               </div>
             </div>
         </div>
      </div>
      <div class="page_seven">
         <div class="page_seven_area">
           <div class="page_seven_area_title">
              更便捷的教学成员管理
           </div>
           <div class="page_seven_area_info">
              多种角色权限自由配置，机构成员分工明确支持设置子账号，并对其进行权限分配，以满足多人协作功能
           </div>
           <div class="page_seven_area_btn">
              <div class="page_seven_area_btn1">
                 <a href="#">马上入驻</a>
              </div>
           </div>
         </div>
      </div>
      <div class="page_eight">
         <div class="page_eight_mask">
            <div class="page_eight_area">
               <div class="page_eight_title">
                  以技术提升您的使用体验
               </div>
               <div class="page_eight_info">
                  <div class="page_eight_infoL">
                     <img src="http://17dayup-activity.bj.bcebos.com/join/pel-fs8.png">
                     <div class="page_eight_infoL_title">
                        方便快捷的一站式支付接入
                     </div>
                     <div class="page_eight_infoL_text">
                        聚合微信支付、支付宝等主流支付方式，提供一站式支付接入方案，可在各种场景中流畅交易
                     </div>
                  </div>
                  <div class="page_eight_infoR">
                     <img src="http://17dayup-activity.bj.bcebos.com/join/per-fs8.png">
                     <div class="page_eight_infoR_title">
                        开放标准的账户管理体系
                     </div>
                     <div class="page_eight_infoR_text">
                        提供标准、开放、便捷的账户接入服务，实现优质资源共享，让客户管理更简单
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="page_nine">
         <div class="page_nine_area">
            <div class="page_nine_title">
              马上开启云学堂教学之旅
            </div>
            <div class="page_nine_title1">
              请您留下联系方式，我们将有专员与您联系
            </div>
            <div class="page_nine_form">
              <form id="pcForm">
                 <div class="page_nine_row">
                    <input class="input_l" type="text" name="institute_name" placeholder="企业名称">
                    <input class="input_r" type="text" name="user_name" placeholder="联系人姓名">
                 </div>
                 <div class="page_nine_row">
                    <input class="input_l" type="text" name="phone" placeholder="手机" maxlength="11">
                    <input class="input_r" type="text" name="email" placeholder="邮箱">
                 </div>
                 <div class="page_nine_row">
                     <div class="page_nine_button js-pcAjax">
                        提交
                     </div>
                 </div>
              </form>
            </div>
         </div>
      </div>
   </div>
   @if(isset($tplData['user_info']))
    <script>
        window.USERINFO = {!! json_encode($tplData['user_info']) !!};
    </script>
    @endif
@stop


@section('style')
      <link rel="stylesheet" type="text/css" href="/build/lib/toast/jquery.toast.min.css">
      <link rel="stylesheet" type="text/css" href="/build/css/page/activity/activity.css">
@endsection

@section('script')
<script type="text/javascript" src="/build/lib/toast/jquery.toast.min.js"></script>
<script type="text/javascript">
   function initButtons() {
       var tips = '该账号已经是机构下的成员，不能再入驻';
       $('#joinInstitute').on('click', function(e) {
           if (!USERINFO.is_login) {
               wdy.passport.showView('login');
               return e.preventDefault();
           }
           if(USERINFO.is_enter && USERINFO.role != 1) {
               utils.toast(tips);
               e.preventDefault();
           } else if (USERINFO.is_enter && USERINFO.enter_type != 'institute') {
               utils.toast('您已经申请个人讲师入驻，不能再申请机构入驻');
               e.preventDefault();
           }
       });
       $('#joinPersonal').on('click', function(e) {
           if (!USERINFO.is_login) {
               wdy.passport.showView('login');
               return e.preventDefault();
           }
           if(USERINFO.is_enter && USERINFO.role != 1) {
               utils.toast(tips);
               e.preventDefault();
           } else if (USERINFO.is_enter && USERINFO.enter_type != 'personal') {
               utils.toast('您已经申请机构入驻，不能再申请个人讲师入驻');
               e.preventDefault();
           }
       });
   }

   initButtons();

   $('.js-pcAjax').on('click',function(){
      var data = $('#pcForm').serialize();
      var phone =$.trim($('[name=phone]').eq(0).val());
      var idpc =null;
      if(phone.length){
         fnAjax(data,'pc');
      }else{
         $('.alertpc').text('手机号不能为空').show();
          clearTimeout(idpc)
          idpc=setTimeout(function(args) {
            $('.alertpc').hide().text('内测进行中，敬请期待！')
          },3000)
      }

   });

   $('.js-h5Ajax').on('click',function(){
      var data = $('#h5Form').serialize();
      var phone =$.trim($('[name=phone]').eq(1).val());
      var idh5 =null;
      if(phone.length){
         fnAjax(data,'h5');
      }else{
         $('.alert').text('手机号不能为空').show();
         clearTimeout(idh5)
         idh5=setTimeout(function(args) {
            $('.alert').hide().text('内测进行中，敬请期待！')
         },3000)
      }
   });

   function fnAjax(data,type){
      $.ajax({
        url: "//"+BIZ_HOST+'/api/attract/enterapply',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success:function(res){
          if(res.status=='200'){
            if(type == 'pc'){
               $('.alertpc').text('提交成功，我们会尽快联系您！').show();
               setTimeout(function(args) {
                  $('.alertpc').hide().text('内测进行中，敬请期待！')
               },3000)
            }else{
               $('.alert').text('提交成功，我们会尽快联系您！').show();
               setTimeout(function(args) {
                  $('.alert').hide().text('内测进行中，敬请期待！')
               },3000)
            }
            $('input').val('');
          }else{
            if(type=='pc'){
               $('.alertpc').text(res.msg).show();
               setTimeout(function(args) {
                  $('.alertpc').hide().text('内测进行中，敬请期待！')
               },3000)
            }else{
               $('.alert').text(res.msg).show();
               setTimeout(function(args) {
                  $('.alert').hide().text('内测进行中，敬请期待！')
               },3000)
            }
          }
        },
        error:function(){
            if(type=='pc'){
               $('.alertpc').text('请求错误').show();
               setTimeout(function(args) {
                  $('.alertpc').hide().text('内测进行中，敬请期待！')
               },3000)
            }else{
               $('.alert').text('请求错误').show();
               setTimeout(function(args) {
                  $('.alert').hide().text('内测进行中，敬请期待！')
               },3000)
            }
        }
      })
   }
</script>
@stop
