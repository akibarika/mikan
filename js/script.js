/**
 * Created by Akiba on 14-8-22.
 */
$(document).ready(function(){
    jQuery(document).on("click",".icon-up",function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });
    var History = window.History;
    var loading = false;
    var showIndex = false;
    var $content = $('.content');
    var $postIndex = $('.wrap-post');
    if ( ! History.enabled) {
        return false;
    }
    History.Adapter.bind(window, 'statechange', function() {
        var State = History.getState();
        $.get(State.url, function(result) {
            var $html = $(result);
            var $newContent = $('.content', $html).contents();
            document.title = $html.filter('title').text();
            $('html, body').animate({'scrollTop': 0});
            $content.fadeOut(500, function() {
                $postIndex = $newContent.filter('.wrap-post');
                $postIndex.show();
                $content.html($newContent);
                $content.fadeIn(500);
                NProgress.done();
                loading = false;
                showIndex = false;
            });
        });
    });

    jQuery(document).on('click', '.post-item a,.wrap-title a,.wrap-footer a:first', function(event) {
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