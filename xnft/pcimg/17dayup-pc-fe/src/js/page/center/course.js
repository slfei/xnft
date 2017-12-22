$(function() {

    $('.course_li').mouseover('.hover_course', function(e) {
        e.preventDefault()
        $('.hover_course').eq($(this).index()).find('.hover-mask').show()
    }).mouseout('.hover_course', function(e) {
         e.preventDefault()
        $('.hover_course').eq($(this).index()).find('.hover-mask').hide()
    })
    var delete_type = '';
    var delete_id ='';
    $('.delcourse').click(function(e) {
        $('.cancel-modal').show();
        $('.mcan-title').text('移除收藏');
        delete_type = e.target.id.slice(0, 6);
        delete_id = e.target.id.slice(7);
    });

    $('.js_removeCourse').on('click',function(e){
        $('.cancel-modal').show();
        $('.mcan-title').text('移除课表');
        delete_type = e.target.id.slice(0, 6);
        delete_id = e.target.id.slice(7);
    });

    $(".sure-btn").click(function() {
        $('.cancel-modal').hide();
        if (delete_type == "course") {
            $.post('/api/center/delcourse', {
                id: delete_id
            }, function(data, status) {
                console.log(data, status);
                if (data.status == 200) {
                    utils.toast("移除课表成功");
                    location.reload()
                } else {
                    utils.toast("移除课表失败");
                }
            })
        } else {
            $.post('/api/center/delcollect', {
                id: delete_id
            }, function(data, status) {
                console.log(data, status);
                if (data.status == 200) {
                    utils.toast("移除收藏成功");
                    location.reload()
                } else {
                    utils.toast("移除收藏失败");
                }
            })
        }
    });

    $(".clear-btn").click(function() {
        $('.cancel-modal').hide()
    });
    $('.close-modal').click(function() {
        $('.cancel-modal').hide()
    });
    $('.go-href').click(function() {
        location.href = '/course/' + $(this).attr('course-id');
    })

    
});
