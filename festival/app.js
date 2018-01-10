var express = require('express');
var proxy = require('http-proxy-middleware');
var app = express();
// var opn = require('opn');


var port = 17171;

app.use('/api/activity', proxy({
    target: 'http://coupon.ac.enimo.cn',
    changeOrigin: true,
    cookieDomainRewrite: {
        "http://192.168.1.74": "http://coupon.ac.enimo.cn", 
    }
}));
app.use('/api', proxy({
    target: 'http://passport.ac.enimo.cn',
    changeOrigin: true
}));

app.use('/', express.static('.')); // .build是静态文件目录
// app.use('/', express.static('img'));
app.listen(port);
// opn('http://live.com:10011/live.html');