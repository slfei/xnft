/**
 * Created by Administrator on 2017/9/27.
 */

$('.section-filter .goto').click(
    function () {
        var value = $(this).attr('value');
        console.log(value)

        var filter = window.FILTER;
        if(value=='all'){
            filter.type = 0;
        //}else if(value=='免费'){
        }else if(value=='free'){
            filter.type = 1;
        //}else if(value=='折扣'){
        }else if(value=='discount'){
            filter.type = 2;
        //}else if(value=='综合排序'){
        }else if(value=='synthesise'){
            filter.sort_type = 0;
        //}else if(value=='好评度&nbsp;↓'){
        }else if(value=='good'){
            filter.sort_type = 1;
        //}else if(value=='人气&nbsp;↓'){
        }else if(value=='hot'){
            filter.sort_type = 2;

        }else if($(this).find('.triangle-to-top').length){
            if(filter.sort_type == 3){
                filter.sort = filter.sort==0 ? 1 : 0;
            }else{
                filter.sort_type = 3;
                filter.sort = 0;
            }
        } else if ($(this).hasClass('listen')) {
            if($(this).hasClass('active')){
                filter.listen = 0;

            }else{
                filter.listen = 1;
            }
        }
        ;
        var url = '/search/course/' + filter.categoryid + '/' + filter.type + '?sort_type=' + filter.sort_type;
        url += "&listen=" + filter.listen;
        url += "&sort=" + filter.sort;
        filter.start && (url += "&start=" + filter.start);
        filter.hight && (url += "&hight=" + filter.hight);
        url += "&q=" + filter.q;
        location.href = url;
    }
);

$('.section-filter .sure-goto').click(function () {
    var filter = window.FILTER;
    filter.start = $('.section-filter .price-range .start').val();
    filter.hight = $('.section-filter .price-range .end').val();
    var url = '/search/course/' + filter.categoryid + '/' + filter.type + '?sort_type=' + filter.sort_type;
    url += "&listen=" + filter.listen;
    url += "&sort=" + filter.sort;
    url += "&q=" + filter.q;
    filter.start && (url += "&start=" + filter.start);
    filter.hight && (url += "&hight=" + filter.hight);
    location.href = url;

});

$('.js_login').on('click', function (event) {
    wdy.passport.showView('login')
});



