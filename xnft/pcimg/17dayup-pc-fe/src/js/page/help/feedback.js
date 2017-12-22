/**
 * Created by Administrator on 2017/10/18.
 */
$('.type a').click(function () {
    $('.type .active').attr('class', 'ion-ios-circle-outline ico');
    $(this).find('.ion-ios-circle-outline').attr('class', 'ion-ios-circle-filled ico active');

});
$('.submit').click(function () {

    var json = {
        type: $('.type .active').attr('value'),
        phone: $('.phone').val(),
        suggest: $('.suggest').val()
    };
    var reg = new RegExp('[\\u4E00-\\u9FFF]+', 'g');
    if (!json.phone) {
        utils.toast('联系人不能为空', 'error');
        return;
    } else if (reg.test(json.phone)) {
        utils.toast('联系人只能是手机/邮箱/QQ', 'error');
        return;
    }
    if (!json.suggest) {
        utils.toast('留言不能为空', 'error');
        return;
    } else if (json.suggest.length < 10) {
        utils.toast('留言至少10个字', 'error');
        return;
    } else if (json.suggest.length > 500) {
        utils.toast('留言最多500字', 'error');
        return;
    }
    var url = '/api/help/feedback';
    $.post(url, json).then(function (data) {
        if (data.status == 200) {
            utils.toast(data.msg || '信息已提交');
        } else {
            utils.toast(data.msg || '信息提交失败');
        }
    }, function (err) {
        utils.toast(err.msg);
    })
});
