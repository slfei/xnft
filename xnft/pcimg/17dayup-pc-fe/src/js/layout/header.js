/**
 * Created by huangzhongjian on 17/9/21.
 */

import fnAjax from "../components/fnAjax/fnAjax.js"

(function() {

    function initSearchType () {
        var $searchTypeSelect = document.getElementById('J-search-type-select');
        var $options =$searchTypeSelect?$searchTypeSelect.querySelectorAll('.search-type'):[];

        for (var i = 0, len = $options.length; i < len; i++) {
            $options[i].addEventListener('click', function() {
                if(this.classList.contains('selected')) {
                    $searchTypeSelect.classList.add('hover');
                    var off = clickOutSide($searchTypeSelect, function() {
                        off();
                        $searchTypeSelect.classList.remove('hover');
                    });
                } else {
                    this.classList.add('selected');
                    var prev = this.previousElementSibling;
                    prev.classList.remove('selected');
                    $searchTypeSelect.insertBefore(this, prev);
                    $searchTypeSelect.classList.remove('hover');
                }
            });
        }
    }

    function initSearch() {
        var $input = document.querySelector('#J-search-form .search-input');
        var $sug = document.querySelector('#J-search-form .sug-dropdown-menu');
        var $form = document.querySelector('#J-search-form');
        var $search = document.querySelector('.js-search');

        if($input){
            $input.addEventListener('focus', function() {
                var type = $form.querySelector('.search-type.selected').getAttribute('data-type');
                if (type == 'course') {
                    $sug.classList.add('show');
                }
            });
            $input.addEventListener('blur', function() {
                setTimeout(function(){
                    // 确保sug click触发
                    $sug.classList.remove('show');
                }, 200);
            });
        }

        if($form){
            $form.addEventListener('submit', function(e) {
                var query = $input.value;
                var type = this.querySelector('.search-type.selected').getAttribute('data-type');
                saveSearchHistory(query);
                location.href = "/search/" + type + '?q=' + encodeURIComponent(query);
                e.preventDefault();
            });
        }

        if($search){
            $search.addEventListener('click',function(e) {
                var query = $input.value;
                var type = $form.querySelector('.search-type.selected').getAttribute('data-type');
                saveSearchHistory(query);
                location.href = "/search/" + type + '?q=' + encodeURIComponent(query);
                e.preventDefault();
            });
        }

        renderSearchHistory();
    }

    function renderSearchHistory () {
        var searchHistory = getSearchHistory();
        var $sug = document.querySelector('#J-search-form .sug-dropdown-menu');

        if (searchHistory.length) {
            var fragment = document.createElement('div');
            fragment.className = 'history-word';

            var str = searchHistory.map(word => {
                var s = encodeURIComponent(word);
                var url = `//${ window.WWW_HOST || ''}/search/course?q=${s}`;
                return `<a class="word-item" target="_blank" href="${url}" target="_blank">${word}</a>`
            }).join('\n');

            fragment.innerHTML = '<div class="title">历史搜索' +
            '<a class="pull-right clear-search-history"><i class="ion-trash-a"></i>清空</a>' +
            '</div>' +
            '<div class="word-list">' + str +
            '</div>';

            fragment.querySelector('.clear-search-history').addEventListener('click', function() {
                clearHistory();
                $sug.classList.remove('show');
                $sug.removeChild(fragment);
            });

            $sug.appendChild(fragment);
        }
    }

    function renderHotWord (data) {
        var $sug = document.querySelector('#J-search-form .sug-dropdown-menu');
        if (data && data.length) {
            var fragment = document.createElement('div');
            fragment.className = 'hot-word';

            var str = data.map(word => {
                var s = encodeURIComponent(word);
                var url = `//${ window.WWW_HOST || ''}/search/course?q=${s}`;
                return `<a class="word-item" target="_blank" href="${url}" target="_blank">${word}</a>`;

            }).join('\n');

            fragment.innerHTML = '<div class="title">热门搜索' +
            '</div>' +
            '<div class="word-list">' + str +
            '</div>';

            $sug.appendChild(fragment);
        }
    }

    function clickOutSide(el, fn) {
        function handler(e){
            if (!el.contains(e.target)) {
                fn(e);
            }
        }
        document.addEventListener('click', handler, true);
        return function() {
            document.removeEventListener('click', handler, true);
        }
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

        // 绑定手机号成功 刷新页面
        passport.on('bindPhoneSuccess', function() {
            location.href=location.href.split('?')[0]
        });

        // 登录/退出/注册 刷新页面
        passport.on('loginSuccess registerSuccess logoutSuccess', function() {
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
        var logout = document.querySelector('#g-header-logout');
        if (logout) {
            logout.addEventListener('click', function() {
                passport.logout();
            });
        }
    }


    var historyKey = '_search_history_';
    var historyLimit = 5;
    function getSearchHistory () {
        var str = localStorage.getItem(historyKey);

        if (!str) {
            return [];
        }
        var data;
        try {
            data = JSON.parse(str);
        } catch (e) {
            data = []
        }
        return data;
    }

    function saveSearchHistory(word) {
        var data = getSearchHistory();

        //重复的搜索词
        if (data.indexOf(word) != -1) return ;

        data.unshift(word);
        data = data.slice(0, historyLimit);
        localStorage.setItem(historyKey, JSON.stringify(data));
    }

    function clearHistory() {
        localStorage.removeItem(historyKey);
    }

    function getHotWord () {

        var xhr = new XMLHttpRequest();
        var host = window.WWW_HOST ? ('//' + window.WWW_HOST) : '';
        xhr.open('GET', `${ host}/api/search/hotword?number=5`);
        xhr.withCredentials = true;
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status < 300 && xhr.status >=200) {
                try {
                    var json = JSON.parse(xhr.responseText);
                    if (json.status === 200){
                        renderHotWord(json.data);
                    }
                } catch(e) {

                }
            }
        };
        xhr.send(null);
    }

    function getQuery(name, url) {
        url = url  || location.href;
        if (new RegExp('(\\?|&)' + name + '=' + '([^&]*)').test(url)) {
            return RegExp.$2
        }
        return '';
    }

    initPassport();
    initSearchType();
    initSearch();
    getHotWord();
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
    },60000);
    
    var loginType = document.querySelector('[name=loginType]').value?Number(document.querySelector('[name=loginType]').value):0;

    if(!loginType){
        fnAjax.fnAjax({
            url: "/api/center/getUserInfo",
            done:function(res){
                if(res.status == 200){
                    if(res.data.is_login){
                        document.querySelector('#nd-face').src = res.data.avatar_url;
                        $('#nd-loginTrue').removeClass('hide');
                        $('#nd-loginFalse').addClass('hide');
                        if(res.data.is_enter){
                            $('#nd-institute').removeClass('hide');
                        }else{
                            $('#nd-institute').addClass('hide');
                        }
                    }else{
                        $('#nd-loginFalse').removeClass('hide');
                        $('#nd-loginTrue').addClass('hide');
                    }
                }else{
                    $('#nd-loginFalse').removeClass('hide');
                    $('#nd-loginTrue').addClass('hide');
                }
            }
        })
    }

})();
