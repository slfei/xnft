function initWechatShare(params) {
    params.title = params.title || '【100%中奖】看春晚 品国学 红包送不停';
    params.desc = params.desc || '人人可抽奖，天天可抽奖！分享可额外获得一次抽奖机会！儿童手表、现金红包、课程优惠券送不停！';
    params.thumbnail = params.thumbnail ||
    'http://www.wdyedu.com/build/img/fav-2711d55b2c.ico';
    params.url = params.url || location.href;
    $.ajax({
        type: 'POST',
        url: '/api/universal/wechatjsconfig', 
        data:{url : encodeURIComponent(location.href)},   
        success: function (data) {
           
            if (data.status == 200) {
                if (data.data) {
                    var wx = window.wx;
                    var config = data.data;
                    try {
                        var conf = {
                            debug: false,
                            appId: config.appId,
                            timestamp: config.timestamp,
                            nonceStr: config.nonceStr,
                            signature: config.signature,
                            jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage']
                        };
                        wx.config(conf);
                        wx.ready(function () {
                            wx.onMenuShareTimeline({
                                title: params.title,
                                link: params.url,
                                imgUrl: params.thumbnail,
                                success: function () {
                                    // 用户确认分享后执行的回调函数
                                     
                                },
                                cancel: function () {
                                    // 用户取消分享后执行的回调函数
                                   
                                }
                            });
                            wx.onMenuShareAppMessage({
                                title: params.title,
                                desc: params.desc,
                                link: params.url,
                                imgUrl: params.thumbnail,
                                trigger: function (res) {
                                    // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，
                                    // 因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                                },
                                success: function (res) {
                                    // alert('分享给朋友成功');
                                },
                                cancel: function (res) {
                                    // alert('你没有分享给朋友');
                                },
                                fail: function (res) {
                                    // alert(JSON.stringify(res));
                                }
                            });
                          
                        });
        
                        wx.error(function (res) {
        
                        })
                    } catch (e) {
                    }
                }
            } else {
               
             
            }
        }
    })
   
        
    
};

