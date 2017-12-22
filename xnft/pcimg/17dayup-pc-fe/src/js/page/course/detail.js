/**
 * Created by Administrator on 2017/9/27.
 */
$("#tab>li").click(function () {
    $("#container>div").hide();
    $("#tab>li").removeClass('active');
    //$(this).addClass('active');
    $('#tab li[value="' + $(this).attr('value') + '"]').addClass('active');
    var num = $(this).val();
    $("#content" + num).show();
});
window.goto = function (id, type, fromType) {
    var path;
    if (type == "relevant") {
        path = '/course/' + id;
    } else if (type == 'institute') {
        path = (fromType == 2 ? '/institute/homepage/' : '/personal/homepage/');
        path += id;
    } else if (type == 'teacher') {
        path = '/teacher/courselist/' + id;
    }

    window.open(path)
};
$("#content3 .witchComment").click(function () {
    var self = this;
    var val = this.value;
    var json = {
        type: 1,
        rank: val,
        object_id: courseId
    };
    var url = '/api/comment/list';
    $.post(url, json).then(function (resp) {
        $("#content3 .witchComment .active").attr('class', 'ion-circle-outline');
        $(self).find('.ion-circle-outline').attr('class', 'ion-circle-filled active');
        $('.tab-content .list-comment').empty();

        if (resp.status == 200 && resp.data.comment_list.length > 0) {
            $('.nocomment').addClass('hide');
            resp.data.comment_list.forEach(function (ele) {
                safety(ele.text_content);
                !Array.isArray(ele.answer) && safety(ele.answer.text);
            })
        } else {
            $('.nocomment').removeClass('hide')
        }

        var bat = baidu.template;
        var html = bat('t:_1234-abcd-1', resp.data);
        $('.tab-content .list-comment').html(html);

        /*重置分页*/
        switch (val) {
            case 0:
                init({total:comment.all_comment_num,nowPage:1})
                break;
            case 3:
                init({total:comment.good_comment_num, nowPage:1})
                break;
            case 2:
                init({total:comment.in_comment_num, nowPage:1})
                break;
            case 1:
                init({total:comment.low_comment_num, nowPage:1})
                break;
        }
    });
});
$('.action .apply').click(function () {
    var url = '/api/course/signup?courseid=' + courseId;
    $.get(url).then(function (resp) {
        if (resp.data.status == 0) {
            if (resp.data.type == 0) {
                location.href = '/course/registration?courseid=' + courseId;
                /*$('.action .apply').hide();
                 $('.action .success').removeClass('hide');
                 utils.toast(resp.msg || '报名成功');*/
            } else {
                location.href = '/order/pay?order_id=' + resp.data.order_id;
            }
        } else if (resp.status == 710) {
            $('.action .success').removeClass('hide');
            $('.action .apply').addClass('hide');
        } else {
            utils.toast(resp.msg);
        }
    });
});


/*分页*/
var safety = function (str) {
    var s = "";
    if (str.length == 0) return "";
    s = str.replace(/&/g, "&amp;");
    s = s.replace(/</g, "&lt;");
    s = s.replace(/>/g, "&gt;");
    s = s.replace(/ /g, "&nbsp;");
    s = s.replace(/\'/g, "&#39;");
    s = s.replace(/\"/g, "&quot;");
    return s;
};
var page = {
    size: 20,
    at: 1,
    total: 0,
    maxPage: 0,
    nowPage: 1,
    callbackState: true,
    scrollTopSpeed: 500,
    scrollTop: '',
    callbackPost: ''
};
var setPage = function () {
    page.maxPage = Math.ceil(page.total / page.size);
    //控制分页显示隐藏
    if (!page.total) {
        $('.pagination').addClass('hide');
        return;
    } else {
        $('.pagination').removeClass('hide');
    }

    $('.pagination .number').each(function (i, ele) {
        /*初始化内容*/
        $(ele).find('a').html(i + 1);
        $('.pagination .active').removeClass('active');
        /*增加激活class*/
        /*if(i==0){$(ele).addClass('active');}*/
        /*控制正常显示页数*/
        if ($(ele).find('a').html() > page.maxPage) {
            $(ele).addClass('hide');
        } else {
            $(ele).removeClass('hide');
        }
    });
    /*初始化内容*/
    $($('.pagination .number')[0]).addClass('active');
    /*控制上一页隐藏，下一页是否出现*/
    $('.pagination .lt').addClass('hide');
    if (page.maxPage == 1) {
        $('.pagination .gt').addClass('hide');
    } else {
        $('.pagination .gt').removeClass('hide');
    }
};
var init =  function(wtPage){
    if(wtPage){
        page = $.extend({},page, wtPage);
    }
    setPage();
};
var callbackPost = function(){
    var json = {
        type: 1,
        rank: $('.witchComment .active').parent().attr('value'),
        object_id: courseId,
        page_num: page.nowPage
    };
    var def = $.Deferred();
    $.post('/api/comment/list', json).then(function (resp) {
        if (resp.status == 200) {
            resp.data.comment_list.forEach(function (ele) {
                safety(ele.text_content);
                !Array.isArray(ele.answer) && safety(ele.answer.text);
            });
            $('.tab-content .list-comment').empty();
            var bat = baidu.template;
            var html = bat('t:_1234-abcd-1', resp.data);
            $('.tab-content .list-comment').html(html);
            //触发promise
            def.resolve();
        } else {
            page.callbackState = false;
            utils.toast(resp.msg || '操作失败');
        }
    });
    return def.promise();
};
init({
    total:comment.all_comment_num,
    scrollTop:550,
    scrollTopSpeed:500,
    callbackPost:callbackPost
});

//数字调用
$('.pagination .number').click(function () {
    var self = this;
    var nowPage = $(this).find('a').html();
    /*如果点击当前页,退出*/
    if (nowPage == page.nowPage) {
        return;
    } else {
        page.nowPage = nowPage
    }
    var callback = function () {
        if (!page.callbackState) {
            page.callbackState = true;
            return;
        }
        $('.pagination').find('.active').removeClass('active');
        $(self).addClass('active');
        /*控制上一页显示隐藏*/
        if (nowPage != 1) {
            $('.pagination .lt').removeClass('hide');
        } else if (nowPage == 1) {
            $('.pagination .lt').addClass('hide');
        }
        /*控制下一页显示隐藏*/
        if (nowPage != page.maxPage) {
            $('.pagination .gt').removeClass('hide');
        } else if (nowPage == page.maxPage) {
            $('.pagination .gt').addClass('hide');
        }
        /*点击页数逻辑*/
        if ($(self).find('[data-i="first"]').length) {
            if (nowPage == 1) {
                return;
            } else if (nowPage == 2) {
                $('.pagination .number a').each(function (i, ele) {
                    $(ele).html(parseInt($(ele).html()) - 1);
                    $('.pagination').find('.active').removeClass('active');
                    $(self).next().addClass('active');
                })
            } else {
                $('.pagination .number a').each(function (i, ele) {
                    $(ele).html(parseInt($(ele).html()) - 2);
                    $('.pagination').find('.active').removeClass('active');
                    $(self).next().next().addClass('active');
                })
            }
        } else if ($(self).find('[data-i="last"]').length) {
            if (nowPage == page.maxPage) {
                return;
            } else if (nowPage == page.maxPage - 1) {
                $('.pagination .number a').each(function (i, ele) {
                    $(ele).html(parseInt($(ele).html()) + 1);
                    $('.pagination').find('.active').removeClass('active');
                    $(self).prev().addClass('active');
                })
            } else {
                $('.pagination .number a').each(function (i, ele) {
                    $(ele).html(parseInt(parseInt($(ele).html())) + 2);
                    $('.pagination').find('.active').removeClass('active');
                    $(self).prev().prev().addClass('active');
                })
            }
        }
    };
    var json = {
        type: 1,
        rank: $('.witchComment .active').parent().attr('value'),
        object_id: courseId,
        page_num: page.nowPage
    };
    if(callbackPost){
        callbackPost().then(callback).then(function(){
            if(page.scrollTop !=''){
                $('html, body').animate({
                    scrollTop: page.scrollTop
                }, page.scrollTopSpeed);
            }
        });
    }
});
//上一页
$('.pagination .lt').click(function () {
    page.nowPage--;
    var callback = function () {
        if (!page.callbackState) {
            page.callbackState = true;
            return;
        }
        $('.pagination .gt').removeClass('hide');
        if ($($('.pagination .number a')[0]).html() == 1) {
            $('.pagination .active').removeClass('active').prev().addClass('active');
        } else {
            $('.pagination .number a').each(function (i, ele) {
                $(ele).html(parseInt($(ele).html()) - 1);
            });
            if ($($('.pagination .number a')[0]).html() == 2) {
                $('.pagination .lt').addClass('hide');
            }
        }
        if ($('.pagination .active').find('a').html() == 1) {
            $('.pagination .lt').addClass('hide');
        }
    };
    //滑动到位置
    callbackPost && callbackPost().then(callback).then(function(){
        if(page.scrollTop !=''){
            $('html, body').animate({
                scrollTop: page.scrollTop
            }, page.scrollTopSpeed);
        }
    });
});


//下一页
$('.pagination .gt').click(function () {
    page.nowPage++;
    var callback = function () {
        if (!page.callbackState) {
            page.callbackState = true;
            return;
        }
        $('.pagination .lt').removeClass('hide');
        if ($($('.pagination .number a')[$('.pagination .number:visible').length - 1]).html() == page.maxPage) {
            $('.pagination .active').removeClass('active').next().addClass('active');
        } else {
            $('.pagination .number a').each(function (i, ele) {
                $(ele).html(parseInt($(ele).html()) + 1);
            });
            if ($($('.pagination .number a')[0]).html() == page.maxPage - 1) {
                $('.pagination .gt').addClass('hide');
            }
        }
        if ($('.pagination .active').find('a').html() == page.maxPage) {
            $('.pagination .gt').addClass('hide');
        }
    };
    callbackPost && callbackPost().then(callback).then(function(){
        if(page.scrollTop !=''){
            $('html, body').animate({
                scrollTop: page.scrollTop
            }, page.scrollTopSpeed);
        }
    });
});


window.onscroll = function () {
    var t = document.documentElement.scrollTop || document.body.scrollTop;
    if (t > 560) {
        $('.section-fix').css({display: 'flex'})
    } else {
        $('.section-fix').css({display: 'none'})
    }
};

/*收藏功能*/


$('.js_collection').on('click', function () {
    var type = $(this).toggleClass('collectionActive').hasClass('collectionActive');
    var id = $(this).data('id');
    var _this = this;
    var obj = {typeid: 1, objectid: id}
    if (type) {
        var url = "/api/favorite/addfavorite";
    } else {
        var url = "/api/favorite/delfavorite";
    }
    $.post(url, obj).then(function (res) {
        if (res.status == 200) {
            //utils.toast(res.msg);
            type ? utils.toast({text: '收藏成功', position: 'mid-center', textAlign: "center"}) : utils.toast({
                text: '取消收藏',
                position: 'mid-center',
                textAlign: "center"
            });
        } else {
            $(_this).toggleClass('collectionActive');
            utils.toast(res.msg);
        }
    }).catch(function (err) {
        $(_this).toggleClass('collectionActive')
    });

});

/**
 * 下载资料
 */
$('.js_download').on('click',function(){
    var courseid = $(this).data('courseid');
    $.get('/api/course/material?course_id='+ courseid, function(res) {
        if(res.status == 200){
            location.href = res.data.url
        }else if(res.status == 100011){
            utils.toast("报名后才能下载资料哦！");
        }else{
            utils.toast(res.msg);
        }
    });
});

