// $(document).ready(function(){
window.onload = function(){
    console.log(document.cookie);
    //微信分享
        //默认页面 
        var shareParams = {
            init : {
                title:'【100%中奖】看春晚 品国学 红包送不停',
                desc: '人人可抽奖，天天可抽奖！分享可额外获得一次抽奖机会！儿童手表、现金红包、课程优惠券送不停！'
            },
            watch : {     
                title:'我抽中了【儿童手表】！快跟我一起看春晚 品国学 抽大奖',
                desc: '人人可抽奖，天天可抽奖！分享可额外获得一次抽奖机会！儿童手表、现金红包、课程优惠券送不停！'
            },
            packet : {     
                title:'我抽中了【现金红包】！快跟我一起看春晚 品国学 抽大奖',
                desc: '人人可抽奖，天天可抽奖！分享可额外获得一次抽奖机会！儿童手表、现金红包、课程优惠券送不停！'
            },
            discount : {     
                title:'我抽中了【课程优惠券】！快跟我一起看春晚 品国学 抽大奖',
                desc: '人人可抽奖，天天可抽奖！分享可额外获得一次抽奖机会！儿童手表、现金红包、课程优惠券送不停！'
            }
        };
    initWechatShare(shareParams.init);
        var config = {
            // sendUrl : 'http://coupon.ac.enimo.cn/api/',
            loginUrl:'http://passport.ac.enimo.cn/api/v1.2/',
            sendUrl : '/api/',
            // loginUrl:'/api/v1.2/'
        };
        var isOnServer = false;
        //抽奖是否可点
        var isRotating = false;
        //当前时间
        var now = new Date().getTime();
        var activityStart = new Date('2017/02/16');
        // 结束时间16号
        var activityEnd = new Date('2018/03/17');
       
        if(now < activityStart) {
            isRotating = true;
            $('.js-words-times').hide();
            $('.words-top')
                .removeClass('waiting')
                .empty()
                .append($('<span>活动</span><span>未开始</span>'));
        }
         //1 判断活动是否结束
        if(now >= activityEnd) {
            $('.js-activity-end').show();
            $('.wraper').show();
            isRotating = true;
        }else{
            //2判断是否在微信端
            if(!window.isWechat){
                $('.no-wechat').show();
                $('.wraper').show();
                unSignClose('.no-wechat');
            }else{
                //判断是否登陆
                console.log(getCookie('userkey'));
                if(!getCookie('userkey')){
                    $('.login').show();
                    $('.wraper').show();
                    justClose('.login');
                }
            }            
        }
        //模态层关闭
        justClose('.no-chance');
        justClose('.prize-watch');
        justClose('.prize-money');
        justClose('.prize-discont');
        justClose('.login');
        //.wrapper close
        $('.wraper').bind('click',function(e){
            var targetClassName = $(e.target)[0].className;
            if( targetClassName!='wraper' && targetClassName!= 'has-prize'){
                return;
            };
            $(e.target).find('.prize-desc').children().each(function(){
                if($(this).css('display')== 'block'){
                    $(this).find('.close').click();
                    return false;
                }               
            })
        });

        //close 就关闭
        function justClose(classname){
            $(classname+' .close').on('click',function(){
                hideEle(classname);
                if(classname == '.prize-watch' || classname == '.prize-money' || classname == '.prize-discont') {
                    initWechatShare(shareParams.init);
                }; 
            });             
        };
        function hideEle(classname) {
            $('.wraper').hide();
            $(classname).hide();
            $('.wechat-share').hide();
        };
        //close后判断是否登录
        function unSignClose(classname){
            $(classname+' .close').on('click',function(){
                $('.wraper').hide();
                $(classname).hide();
                console.log(getCookie('userkey'));
                if(!getCookie('userkey')){
                    $('.login').show();
                    $('.wraper').show();
                    justClose('.login');
                };
            });                        
        };
        //分享按钮
        $('.sharebtn').on('click', function() {
            $('.wechat-share').show();
            // console.log('aaa')
        });



        //获取cookie值
        function getCookie(name) {
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
            else
            return null;
        }; 
        if(!isOnServer){
            setMargin(true);
        }    
        //是否关注    
        //画圆点
        
        function drawPoint() {
            var pointHeight = ($('.point').position().top.toFixed(2)-0);
            var diffheight = ($('.turntable_static').height().toFixed(2)-0)/2-pointHeight+'px';
            $('.js-point').remove();
            for(var i=0;i<24;i++){
                $('<div class="point js-point"></div>').appendTo('.turntable_static')
                 .css({'transform':'rotate('+15*i+'deg)'});}
                $('.point').css({
                 'transform-origin':'' + '0px' + ' ' + diffheight + ' 0px'
                });
        }
        drawPoint();
       
       
        $(window).resize(function() {
            drawPoint();
        });

        //抽奖
       
        $('.pointer').on('click' ,'.pointer-words',function() {
            if(isRotating){return};
            isRotating = true;
            changePoniter();
            startRotate();
            getLottery();
        });
        $('.pointer-words').on('click', function() {
            if(isRotating){return};
            isRotating = true;
            changePoniter();
            startRotate();
            getLottery();
        })
        function startRotate() {
            $('.rotate')
                .removeClass('slow-down')
                .addClass('rotate-infinite')
                .css('transform', 'rotate(0deg)');
        }

        function endRotate(index) {
            var $el = $('.rotate');
            var lastTransform = $el.css('transform');
            $el.removeClass('rotate-infinite')
                .css('transform', 'rotate(0deg)')
                .addClass('slow-down');
            // var endAngle = (3 - index / 8) * 360 ;
            var endAngle = (3 - index / 9) * 360;
            Promise.resolve().then(function(){
                $el.css({
                    transform: 'rotate(' + endAngle  + 'deg)'
                })
                // isRotating = false;
            });
            // console.log(lastTransform, $el.css('transform'));
        }
        function changePoniter(){
            $('.pointer')
                .addClass('start');
            $('.words-top') 
                .removeClass('waiting'); 
            $('.turntable_static')
                .addClass('isrotating');      
        }
        function resetPointer(timedata) {
            var time = timedata || 2500;
            setTimeout(function() {
                $('.pointer')
                    .removeClass('start');
                $('.words-top') 
                    .addClass('waiting');
                $('.turntable_static')
                    .removeClass('isrotating');  
            }, time);
        };

        function stopRotate() {
            var $el = $('.rotate');
            var lastTransform = $el.css('transform');
            $el.removeClass('rotate-infinite')
                .css('transform', 'rotate(0deg)');
            
            resetPointer(1000);  
        };

        //奖品手表 保存地址
        $('.js-save-addressed').on('click',function() {
            var addressedStr = $('.province').val() + '.' + $('.city').val() + '.'+ $('.district').val() + '.'+ $('.place-input').val();
            var address = $('.province').val() + $('.city').val() + $('.district').val() + $('.place-input').val();
            saveAddressed(id,address,addressedStr);
        });
        //名单上下移
        var index = 0;
        //测试名单无限滚动
        function setTopList(dataList) {
            var len = dataList.length;
            if(len == 0) {return };
            $(setListHtml(dataList[len - 1])).appendTo('.goTop'); 
            for (var i = 0, len = dataList.length; i < len; i++){
                $(setListHtml(dataList[i])).appendTo('.goTop');            
            };
        };

        function setListHtml(obj) {
            var str = '';
            switch (obj.type){
                case 1:
                    str =  '<li>' + '恭喜' + obj.user_name + '抽中了'+ obj.name +'！</li>';
                    break;
                case 2:
                    str =  '<li>' + '恭喜' + obj.user_name + '抽中了儿童手表一个！' +'</li>';
                    break;
                case 3:
                    str =  '<li>' + '恭喜' + obj.user_name + '抽中了现金' + obj.name + '！</li>';
                    break;
            };
            return str;
        };
        function goTop(len) {
            index++;           
            var top = -16 * index;            
            if(index > len - 1){
                index = 0;
                $('.goTop')
                    .animate({marginTop: top+'px'},1000);
                $('.goTop')
                    .animate({marginTop: -16+'px'},0);
            }else{
                $('.goTop')
                .animate({marginTop: top+'px'},1000);
            }           
        };

        //获取获奖名单
        function getPrizePeople() {
            var url = config.sendUrl + 'activity/history';
            get(url,null).then(function(res){
                switch (res.status){
                    case 200:
                        var dataList = res.data;
                        setTopList(dataList);
                        var len = dataList.length;
                        if(len > 0){
                            setInterval(function() {
                                goTop(len);
                            }, 3000);
                        };
                        
                        break;
                    }
                
            },function(){
            });
        };

        getPrizePeople();
        //tab切换
        var $tab = $('#tab');
        $tab.on('click', 'li', function () {
            
        var index = $(this).index() - 2;
            setActiveTab(index);
           console.log(index);
           if(index === 1){
            getPrizeList();
           }
        });

        function setActiveTab(index) {
            $tab.find('.active').removeClass('active');
            $tab.find('li').eq(index).addClass('active');
            $('.tab-content').find('.tab-inner').hide().eq(index).show();
        };

        //关闭底部关注
        $('.js-close-goserver').on('click', function() {
            setMargin(false);            
        });
        function setMargin(type) {
            //type true: 出现 margin 增加
            //type false: 关闭 margin 减少
            var nowBottom = parseInt($('.rules').css('marginBottom'));
            var diff;
            if(type === true){
                $('.js-serverpart').show();
                diff = nowBottom + $('.js-serverpart').height();
            }
            if(type === false){
                $('.js-serverpart').hide();
                diff = nowBottom - $('.js-serverpart').height();           
            }

             $('.rules').css('margin-bottom',diff+'px');

        };

        //接口部分
        function get(url, data){
            return new Promise(function(resolve, reject){
                return $.ajax({
                    url: url,
                    method: 'GET',
                    data: data,
                    xhrFields: {
                        withCredentials: true
                    },
                    beforeSend: function(xhr) {
                        // xhr.setRequestHeader("UserKey", 'YTQ2ZGVlZWVkZDVjMWUyZjg4MDhkODEwZjIwNDI4MjMzZDZkOWMyYg==');
                    },
                }).done(function(data){
                    resolve(data)         
                    
                }).fail(function(err){
                    console.log(err);
                    reject(err)
                })
            })
        };
        function post(url, data){
            return new Promise(function(resolve, reject){
                return $.ajax({
                    url: url,
                    method: 'POST',
                    data: data
                }).done(function(data){
                    if(data.status == 200){
                        resolve(data.data)         
                    }else if(data.status==605){
                       
                    }else if(data.status==907){
                    }else{
                        reject(data.msg)                
                    }
                })
                .fail(function(err){
                    reject(err)
                })
            })
        };

        //登录部分
        var sendCaptchaElem = $('.js-get-captcha');
        var oText = sendCaptchaElem.html();
        var tid = null;
        sendCaptchaElem.on("click", function () {
            var phoneNumber = $(".phone-number").val()

            if (!phoneNumber || phoneNumber.length != 11) {
                return showMsg('请输入正确的手机号码')
            }

            if (sendCaptchaElem.hasClass('disabled')) {
                return;
            }
            updateCountDownInfo(60)
            sendCaptcha(phoneNumber)
        });

        $('.gologin').on("click", login);

        function updateCountDownInfo(second) {
            var startTime = new Date() - 0;
            var targetTime = startTime + (second - 1) * 1000;
            sendCaptchaElem.addClass('disabled')

            function _interval() {
                var now = new Date();
                var leftSeconds = Math.round((targetTime - now) / 1000);
                if (leftSeconds > 0) {
                    sendCaptchaElem.html(leftSeconds + 's');
                    tid = setTimeout(_interval, 1000)
                } else {
                    sendCaptchaElem.html(oText).removeClass('disabled');
                }
            }
             _interval()
        };
        //显示提示信息
        function showMsg(str) {
            $('.message').empty()
                         .append(str)
                         .show();
            setTimeout(function(){
                $('.message').hide();
            },2000)             
        };
        //获取验证码
        function sendCaptcha(phoneNumber) {
            $.ajax({
                type: 'POST',
                url: config.loginUrl + 'account/sendcaptcha',
                data: {
                    phone: phoneNumber,
                    type: 2
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("appid", 'cc0103edr1aw134r');
                },
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    if (data.status != 200) {
                        sendCaptchaElem.html('请输入验证码').removeClass('disabled');
                        clearTimeout(tid);
                        return showMsg('验证码发送失败，请检查手机号')
                    }
                }
            })
        };
        $('.joinbtn').on('click',function(){
            var url  = "https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzU5OTI2NDI2MA==&scene=110#wechat_redirect"
            // var url = 'https://wx.qq.com/cgi-bin/mmwebwx-bin/webwxcheckurl?requrl=https%3A%2F%2Fmp.weixin.qq.com%2Fmp%2Fprofile_ext%3Faction%3Dhome%26__biz%3DMzU5OTI2NDI2MA%3D%3D%26scene%3D110%23wechat_redirect&skey=%40crypt_5845e4af_bdb363de4b8d074e16b661cb8f604963&deviceid=e393817248434497&pass_ticket=OfgnIyutwOWvlRiLnP%252B9HAOG72YgaHlIniCeoPmOuGWEl5fkixx3p9V%252BNbbrgURm&opcode=2&scene=1&username=@9a9fe4d01da654213a55049a214c1d79966038238ee7eb085c8116012175fe45';
            window.open(url);
        });
        //登录
        function login() {
            var phoneNumber = $(".phone-number").val();
            var captcha = $('.captcha').val()
        
            if (!captcha || !phoneNumber) {
                return showMsg("请输入手机号码和验证码")
            }
        
            $.ajax({
                type: 'POST',
                url: config.loginUrl + 'account/userlogin',
                data: {
                    phone: phoneNumber,
                    captcha: captcha
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("appid", 'cc0103edr1aw134r');
                },
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == 200) {
                       
                        $('.login').hide();
                        $('.wraper').hide();
                        // setTimeout(function () {
                           
                        // }, 1500)
                    } else {
                       
                       showMsg(data.msg)
                    }
                }
            })
        };      
        

        //抽奖接口
        function getLottery(){
            var url = config.sendUrl + 'activity/lottery';
            $.ajax({
                type: 'GET',
                url: url,
                xhrFields: {
                    withCredentials: true
                },
                beforeSend: function(xhr) {
                    // xhr.setRequestHeader("UserKey", 'YTQ2ZGVlZWVkZDVjMWUyZjg4MDhkODEwZjIwNDI4MjMzZDZkOWMyYg==');
                },
                success: function (data) {
                    switch (data.status){
                        //成功
                        case 200:
                            endRotate(data.data.area - 1);
                            resetPointer();
                            setTimeout(function(){
                                showPrize(data.data);                    
                            },3000)
                            break;
                        //  活动未开始  
                        case 1001:
                            stopRotate();     
                            break;
                        //活动已结束
                        case 1002:
                            showArea('activity-end');
                            stopRotate();     
                            break;
                        //可分享领取资格    
                        case 1004:
                            showArea('get-chance');
                            stopRotate();     
                            break;
                        //没有机会了
                        case 1003:
                            showArea('no-chance');
                            stopRotate();     
                            break;
                        //未登录
                        case 605:
                            showArea('login');
                            stopRotate();                            
                            break;
                        default:
                            break;    
                    };
                    setTimeout(function(){
                        isRotating = false;
                    },3000); 
                                     
                    
                },
                fail : function (error) {
                    stopRotate();  
                    setTimeout(function(){
                        isRotating = false;
                    },3000); 
                }
            })
        };
        //显示奖品
        function showPrize(prizemsg) {
            switch (prizemsg.type){
                //优惠券
                case 1:
                    showArea('prize-discont', prizemsg.image);
                    initWechatShare(shareParams.discount);
                    break;
                // 实物奖品
                case 2:
                    showArea('prize-watch',prizemsg.image);
                    initWechatShare(shareParams.watch);                   
                    break;
                //现金红包
                case 3:
                    showArea('prize-money',prizemsg.image);
                    $('#js-money-desc').html(prizemsg.name);
                    initWechatShare(shareParams.packet);
                    break;
                default:
                    break;    
            }
        };
        // 显示不同区域
        function showArea(classname, imagesrc){
           
            if(classname == 'login'){
                $('.phone-number').val('');
                $('.captcha').val('');
                $('.js-get-captcha').html('获取验证码').removeClass('disabled');
            };
            
            if($('.'+classname).find('.prize-img').length > 0){
                $('.'+classname).find('.prize-img').remove();
            };
            if(imagesrc){
                $('.'+classname).find('.name-desc').after('<img class="prize-img" src="img/'+imagesrc+'" alt="">')
            };
            $('.'+classname).show();
            $('.wraper').show();
        };
        
        //保存地址
        function saveAddressed(lottery_id, address, addressedStr){
            var url = config.sendUrl +'';
            $.ajax({
                type: 'POST',
                url: config.loginUrl + 'account/userlogin',
                data: {
                    lottery_id: lottery_id,
                    address: address
                },
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    if (data.status == 200) {
                        $('.js-addressed-show').html(addressedStr);
                        $('.address-save').hide();
                        $('.address-complete').show();
                    } else {
                        showMsg(data.msg);
                    }
                },
                fail: function(){
                    showMsg(data.msg);
                }
            });
        };
        
        //获取抽奖列表
        function getPrizeList() {
            var url = config.sendUrl + 'activity/accountlottery';
            get(url,null).then(function(res){
                switch (res.status){
                    case 200:
                        var len = res.data.length;
                        if(len == 0){
                            $('.no-prize').show();
                            $('.prize-list').hide();
                        }else{
                            $('.no-prize').hide();
                            $('.prize-list').show()
                                            .empty();
                            var str = ''
                            for(var i = 0; i < len; i++){
                                var data = res.data[i];
                                switch(data.type){
                                    //优惠券
                                    case 1:
                                        str += '<li class="prize-item"><span class="date">'+data.date+'</span><span class="item-type">抽中'+data.name+'</span><i class="list-icon icon-discount"><span class="type">'+parseInt(data.price)+'</span></i><a href="http://www.wdyedu.com/center" class="use">立即使用</a></li>'
                                        break;
                                    //实物
                                    case 2: 
                                        str +='<li class="prize-item"><span class="date">'+data.date+'</span><span class="item-type">抽中'+data.name+'</span><i class="list-icon icon-watch"></i></li>'
                                        break
                                    //红包
                                    case 3:
                                        str += '<li class="prize-item"><span class="date">'+data.date+'</span><span class="item-type">抽中'+data.name+'</span><i class="list-icon icon-packet"></i></li>'
                                        break;
                                }
                            }
                            
                            $(str).appendTo('.prize-list');                                        
                        };
                        break;
                    case 605:
                        $('.no-prize').show();
                        $('.prize-list').hide();
                        break;
                    case 701:
                        $('.no-prize').show();
                        $('.prize-list').hide();
                        break;
                    }                
            },function(){
                $('.no-prize').show();
                $('.prize-list').hide();
            });
        }
};