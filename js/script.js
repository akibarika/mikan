/**
 * Created by Akiba on 14-8-22.
 */
$(document).ready(function(){
    jQuery(document).on("click",".icon-arrow-up",function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });

    var History = window.History;
    var currentState = window.location.href;
    var loading = false;
    var showIndex = false;
    var $content = $('.content');
    var $postIndex = $('.post-list');
    var $navList = $('.wrap-footer');
    var $comContent = $('.commentlist');
    var $comNav = $('#comments .navigation');
    var $headNav = $('#menu-main');
    if ( ! History.enabled) {
        return false;
    }


    History.Adapter.bind(window, 'statechange', function() {
        var State = History.getState();
        $.ajax({
            url:State.url
        }).done(function(data){
            var $html = $(data);
            var $newContent = $('.content', $html).contents();
            var $newNav = $('.wrap-footer', $html).contents();
            var $newHead = $('#menu-main', $html).contents();
            document.title = $html.filter('title').text();
            $('html, body').animate({'scrollTop': 0});
            $content.fadeOut(500, function() {
                $postIndex.show();
                $content.html($newContent);
                $content.fadeIn(500);
            });
            $headNav.show();
            $headNav.html($newHead);
            $navList.fadeOut(500,function() {
                $navList.show();
                $navList.html($newNav);
                $navList.fadeIn(500);
                NProgress.done();
                loading = false;
                showIndex = false;
            });
        });
    });

    var currentState = window.location.href;
    window.addEventListener('popstate',function(event){
        var _currentUrl = window.location.href;
        if(currentState != _currentUrl){
            turnpage(_currentUrl);
            currentState = _currentUrl;
        }
    });
    function turnpage(pageurl) {
        $postIndex.addClass('fading');
        $('.icon-refresh').addClass('spin');
        $.ajax({
            url:pageurl
        }).done(function(data){
            var $html = $(data);
            var $postIndex = $('.post-list');
            var $newPost = $('.post-list', $html).contents();
            var $newNav = $('.wrap-footer', $html).contents();
            $postIndex.append($newPost);
            $navList.html($newNav);
            NProgress.done();
            $postIndex.removeClass('fading');
            $('.icon-refresh').removeClass('spin');
            $('html, body').animate({scrollTop: $('.content').height()},500);

        });
    }
    function turnnavpage(url) {
        $.ajax({
            url: url
        }).done(function(data){
            var $comContent = $('.commentlist');
            var $comNav = $('#comments .navigation');
            var $html = $(data);
            var $result = $('.commentlist',$html).contents();
            var $nextlink = $('#comments .navigation',$html).contents();
            $comContent.html($result);
            $comNav.html($nextlink);
            $('html, body').animate({scrollTop: $('.commentlist').offset().top - 65},500);
            NProgress.done();
        });
    }
    /* page navigation ajax */
    jQuery(document).on("click",".wrap-footer a:first",function(event){
        event.preventDefault();
        var currentLink = $(this).attr("href");
        NProgress.start();
        turnpage(currentLink);
        currentState = window.location.href;
    });
    /* main ajax */
    jQuery(document).on('click', '.ajax-link, .post-date a, .single-tags a, .single-nav a, nav ul li a', function(event) {
        event.preventDefault();
        if (loading === false) {
            var currentState = History.getState();
            var url = $(this).attr('href');
            var title = $(this).attr('title') || null;
            if (url !== currentState.url) {
                loading = true;
                showIndex = true;
                NProgress.start();
                History.pushState({}, title, url);
            }
        }
    });
    /* comment navigation ajax */
    jQuery(document).on('click', '#comments .navigation a', function(event) {
        event.preventDefault();
        var currentLink = $(this).attr("href");
        NProgress.start();
        turnnavpage(currentLink);
        currentState = window.location.href;
    });
})