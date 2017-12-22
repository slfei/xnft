/**
 * Created by huangzhongjian on 17/10/17.
 */

import setUpVideoLog from './videoLog.js';
var $player = $('#player');
const courseId = window.COURSE_INFO.course_id;
const catalog = window.COURSE_INFO.course_catalog;

const map = {
    '标清(360P)': '360p',
    '超清(720P)': '720p',
    '蓝光(1080P)': '1080p'
};

function generateSource(videoInfo) {
    var ret = [];
    for (var key in map) {
        var k = map[key];
        if (videoInfo[k] && map.hasOwnProperty(key)) {
            ret.push({
                label: key,
                file: videoInfo[k]
            })
        }
    }
    return ret;
}

function setUpPlayer(container, videoInfo) {
    var $container = $(container);
    var player = cyberplayer(container.find('.player-container')[0]).setup({
        width: $container.width(),
        height: $container.height(),
        autostart: true,
        stretching: 'uniform',
        volume: 80,
        ak: 'ef79696626b64531855acabfd78c1c69',
        controls: {
            barLogo: false
        },
        starttime: 0,
        //primary: 'flash',
        playRateConfig: [
            { label: '×0.5' },
            { label: '×1'},
            //{ label: '×1.25'},
            { label: '×1.5'},
            { label: '×2'}
        ],

        rightclick: [{
            title: '关于伟东云学堂',
            link: '/'
        }],
        playlist: [{
            sources: generateSource(videoInfo)
        }],
        controlbar: {
            barLogo: false
        }
    });

    $(window).on('resize.player', function() {
        console.log($container.width(), $container.height());
        // fix player request fullscreen $container.height is 0
        if (!$container.width() || !$container.height()) return;
        player.resize($container.width(), $container.height());
    });
    //默认选择1倍播放
    player.once('ready', () => {
        player.setPlaybackRate(1);
        //console.log(player.getContainer().classList)
        player.getContainer().classList.remove('jw-flag-user-inactive');
    });

    var events = ['beforePlay','ready', 'buffer',
        /*'bufferChange', 'bufferFull',*/ 'complete', 'meta',
        'play', 'seek', 'seeked', 'error', 'levelsChanged', 'playbackRate'];

    events.forEach(event => {
        player.on(event, function() {
            var args = Array.from(arguments);
            console.log.apply(console, [event].concat(args));
            if(event=='meta'){
                player.setPlaybackRate(player.getPlaybackRate());
            }
        });
    });

    return player;
}


function destroyPlayer(player) {
    $(window).off('resize.player').off('beforeupload.player');
    player.off(); // try to unbind event
    player.remove();
}

function getVideoInfo(section_id) {
    return $.ajax({
        url: '/api/course/getvideobysectionid',
        data: {
            course_id: courseId,
            section_id: section_id
        }
    }).then(function(res) {
        if (res.status === 200) {
            $('.pay-tip').hide();
            return res.data.video_info;
        } else {
            $('.pay-tip').show();
            if (player) {
                destroyPlayer(player);
            }
            throw new Error(res.msg);
        }
    })
}

function init() {
    var sectionId = getHashQuery('section_id');
    var deferred = $.Deferred();
    deferred.done(callback);
    if (!containsSection(sectionId)) {
        $.get('/api/course/gethistory?course_id=' + courseId).then(function(resp){
            if(resp.status = 200){
                var history = resp.data.history,
                    latelyId = resp.data.lately_id;
                if (latelyId == 0) {
                    sectionId = catalog[0]._child[0].id;
                } else {
                    if(history.indexOf(latelyId) == -1){
                        sectionId = latelyId;
                    }else{
                        var startStatus = false;
                        for (var i=0, len = catalog.length; i < len; i++) {
                            for (var j=0;j < catalog[i]._child.length; j++) {
                                //没有播放过
                                if(catalog[i]._child[j].id == latelyId){
                                    startStatus = true;
                                }
                                if(startStatus && history.indexOf(+catalog[i]._child[j].id) == -1){
                                    sectionId = catalog[i]._child[j].id;
                                }
                            }
                        }
                        //如果下面的都播放了，则播放最后一次播放的
                        !sectionId && (sectionId = latelyId);
                    }
                }
                deferred.resolve();
            }else{
                utils.toast(resp.msg, 'error')
            }
        });
    }else{
        deferred.resolve();
    }
    //jquery promise
    function callback(){
        if (!sectionId) {
            return console.log('此课程无目录', catalog);
        }
        var player;
        bindCatalog(sectionId, function(sectionId) {
            getVideoInfo(sectionId).then(videoInfo => {
                if (player) {
                    destroyPlayer(player);
                }
                player = window.player = setUpPlayer($player, videoInfo);
                setUpVideoLog(player, {
                    course_id: courseId,
                    section_id: sectionId
                });
            });
        });
    }

}

//setUpPlayer($player, videoInfo);
init();
catalogExpand();
bindNoSign();
initPassport();

function catalogExpand() {
    $('.catalog-btn').on('click', function() {
        $('.chapter-wrap').toggleClass('expand');
    })
}



function containsSection(sectionId) {
    if (!sectionId && sectionId !== 0) return false;
    for (var i = 0, len = catalog.length; i < len; i++) {
        if (catalog[i]._child && catalog[i]._child.length) {
            var flag = catalog[i]._child.some(item => item.id == sectionId);
            if (flag) {
                return true;
            }
        }
    }
    return false;
}

function bindCatalog(currentSectionId, callback) {
    var $chapters = $('.chapter-item');

    function setHighlightSection(id, oldId) {
        if (oldId) {
            $chapters.filter('[data-id=' + oldId + ']').removeClass('active');
        }
        $chapters.filter('[data-id="' + id + '"]').addClass('active');
    }

    function setActiveChapter(id, oldId) {
        setHighlightSection(id, oldId);
        currentSectionId = id;
        location.hash = '#section_id=' + id;
        callback(id);
    }

    $chapters.on('click', function() {
        if ($(this).hasClass('active')) return ;

        var id = $(this).data('id');
        setActiveChapter(id, currentSectionId);
    });

    setActiveChapter(currentSectionId);
}

function getHashQuery(name) {
    var str = location.hash;
    var reg = new RegExp('(?:^|#)' + name + '=([^&]*)');
    if (reg.test(str)) {
        return RegExp.$1;
    }
    return '';
}

function bindNoSign() {
    $('.no-sign-tip .close-btn').on('click', function() {
        $('.no-sign-tip').remove();
    });
}

function initPassport () {
    var passport = window.wdy.passport;
    var $login = document.querySelector('#J-header-login');
    if ($login) {
        $login.querySelector('.login').addEventListener('click', function() {
            passport.showView('login');
        });
        $login.querySelector('.register').addEventListener('click', function() {
            passport.showView('register');
        });
    }

    // 登录/退出/注册/绑定手机号成功 刷新页面
    passport.on('loginSuccess registerSuccess bindPhoneSuccess logoutSuccess', function() {
        location.reload();
    });
    // 重置密码跳回登录
    passport.on('resetPasswordSuccess', function(){
        passport.showView('login');
    });

    if (getQuery('errorCode') === '10010') {
        passport.showView('bindPhone')
            .setOption(getQuery('openid'), getQuery('thirdLoginType') || 0);
    } else if (getQuery('errorCode') === '0') {
        console.log('login~~~')
    }

    //退出
    var logout = document.querySelector('.logout');
    if (logout) {
        logout.addEventListener('click', function() {
            passport.logout();
        });
    }
}

function getQuery(name, url) {
    url = url  || location.href;
    if (new RegExp('(\\?|&)' + name + '=' + '([^&]*)').test(url)) {
        return RegExp.$2
    }
    return '';
}

postMsg();

function postMsg(){

    var xhr = new XMLHttpRequest();
    var host = window.WWW_HOST ? ('//' + window.WWW_HOST) : '';
    xhr.open('POST', `${ host}/api/message/count`);
    xhr.withCredentials = true;
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status < 300 && xhr.status >=200) {
            try {
                var json = JSON.parse(xhr.responseText);
                if (json.status === 200){
                    if(json.data.unread_count){
                        document.querySelector('.js_msgNum').style.display ="block";
                        document.querySelector('.js_msgNum').innerText = json.data.unread_count;
                    }else{
                        document.querySelector('.js_msgNum').style.display ="none";          
                    }
                }else{
                    document.querySelector('.js_msgNum').style.display ="none";
                    clearInterval(msgTimer)
                }
            } catch(e) {
                clearInterval(msgTimer)
            }
        }
    };
    xhr.send(null);
}

var msgTimer = setInterval(function(){
    postMsg()
},60000)
