
$(function(){
    var orderinfo = {
        this_text:'',
        order_id: '',
        api_url: '',
        cancel_order:cancel_order
    };

    $('.all-status').click(function(){
        $('.status-list').fadeToggle(300);
    });

    $('.close-modal').click(function(){
        hidemodal()
    });
    $('.operate_btn').click(function(e){
        orderinfo.this_text = $(this).text();
        orderinfo.order_id = e.target.id.slice(3);
        console.log(orderinfo.order_id)
        switch (orderinfo.this_text) {
            case '取消订单':
               orderinfo.api_url = updateurl('cancelorder');
                break;
            case '取消退款':
                orderinfo.api_url = updateurl('cancelrefund');
                break;
            case '删除订单':
                orderinfo.api_url = updateurl('deleteorder');
                break;
        }
        orderinfo.cancel_order(orderinfo.this_text);
    });
    $('.sure-btn').click(function(){
        console.log(orderinfo.api_url)
        $.post(orderinfo.api_url, {order_id:orderinfo.order_id},function(res){
            console.log(res);
            if (res.status==200) {
                utils.toast("success")
                hidemodal()
                location.reload()
            }
            else{
                utils.toast(res.msg)
            }
        })
    });
    function cancel_order(text){
        $('.cancel-modal').show()
        $('.mcan-title').text(text)
    }
    function updateurl(case_url){
        return '/api/center/'+ case_url;
    }
    function hidemodal(){
        $('.cancel-modal').hide()
    }
    //重新购买
    $('.re-buy').click(function(){
        var url  = '/api/course/signup?courseid=' + $(this).attr('course_id');
        $.get(url).then(function(resp){
            if(resp.data.status == 0){
                if(resp.data.type==0){
                    location.href = '/course/registration';
                }else{
                    location.href = '/order/pay?order_id=' + resp.data.order_id;
                }
            }else{
                utils.toast(resp.msg);
            }
        });
    });

})
/*
{
status_id: 1,
status_name: "待付款"
},
{
status_id: 2,
status_name: "交易关闭"
},
{
status_id: 3,
status_name: "交易成功"
},
{
status_id: 4,
status_name: "退款确认中"
},
{
status_id: 5,
status_name: "退款处理中"
},
{
status_id: 6,
status_name: "退款完成"
}

*/
