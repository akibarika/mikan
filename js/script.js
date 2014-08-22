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
    var $navList = $('.wrap-footer');

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
            document.title = $html.filter('title').text();
            $('html, body').animate({'scrollTop': 0});
            $content.fadeOut(500, function() {
                $postIndex.show();
                $content.html($newContent);
                $content.fadeIn(500);
            });
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

    function turnpage(pageurl){
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
            if (url !== currentState.url) {
                loading = true;
                showIndex = true;
                NProgress.start();
                History.pushState({}, title, url);
            }
        }
    });
})