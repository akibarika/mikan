/**
 * Created by Akiba on 14-8-22.
 */
$(document).ready(function(){
    jQuery(document).on("click",".icon-up",function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });
    var History = window.History;
    var currentState = window.location.href;
    var loading = false;
    var showIndex = false;
    var $content = $('.content');
    var $postIndex = $('.post-list');
    var $navContent = $('footer .container');
    var $navList = $('.wrap-footer');
    
    if ( ! History.enabled) {
        return false;
    }

    window.addEventListener('popstate',function(event){
        var _currentUrl = window.location.href;
        if(currentState != _currentUrl){
            turnpage(_currentUrl);
            currentState = _currentUrl;
        }
    });
    History.Adapter.bind(window, 'statechange', function() {
        var State = History.getState();
        $.ajax({
            url:State.url
        }).done(function(data){
            var $html = $(data);
            var $newContent = $('.content', $html).contents();

            document.title = $html.filter('title').text();
            $('html, body').animate({'scrollTop': 0});
            $content.fadeOut(500, function() {
                $postIndex.show();
                $content.html($newContent);
                $content.fadeIn(500);
                NProgress.done();
                loading = false;
                showIndex = false;
            });
            var $newNav = $('footer .container', $html).contents();
            $navContent.fadeOut(500,function(){
                $navList.show();
                $navContent.html($newNav);
                $navContent.fadeIn(500);
                NProgress.done();
                loading = false;
                showIndex = false;
            });
        });
    });


    function turnpage(pageurl){
        $postIndex .addClass('fading');
        $.ajax({
            url:pageurl
        }).done(function(data){
            var html = $.parseHTML(data);
            $postIndex .append($(".post-list",html).html());
            $navContent.html($("footer .container",html).html());
            NProgress.done();
            $postIndex .removeClass('fading');
            $('html, body').animate({scrollTop: $('.content').height()},500);

        });
    }
    jQuery(document).on("click",".wrap-footer a:first",function(event){
        event.preventDefault();
        var currentLink = $(this).attr("href");
        NProgress.start();
        turnpage(currentLink);
        currentState = window.location.href;
    });
    jQuery(document).on('click', '.ajax-link, .post-date a, .single-tags a', function(event) {
        event.preventDefault();
        if (loading === false) {
            var currentState = History.getState();
            var url = $(this).attr('href');
            var title = $(this).attr('title') || null;
            if (url !== currentState.url.replace(/\/$/, "")) {
                loading = true;
                showIndex = true;
                NProgress.start();
                History.pushState({}, title, url);
            }
        }
    });

})