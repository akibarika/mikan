/**
 * Created by Akiba on 14-8-21.
 */
$(document).ready(function(){
    jQuery(document).on("click",".icon-up",function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });
    function turnpage(pageurl){
        $(".post-list").addClass('fading');
        $.ajax({
            url:pageurl
        }).done(function(data){
            var html = $.parseHTML(data);
            $(".post-list").append($(".post-list",html).html());
            $(".wrap-footer").html($(".wrap-footer",html).html());
            $(".post-list").removeClass('fading');
            $('html, body').animate({scrollTop: $('.content').height()},500);

        });
    }
    var currentState = window.location.href;
    window.addEventListener('popstate',function(event){
        var _currentUrl = window.location.href;
        if(currentState != _currentUrl){
            turnpage(_currentUrl);
            currentState = _currentUrl;
        }
    });
    jQuery(document).on("click",".wrap-footer a:first",function(event){
        event.preventDefault();
        var currentLink = $(this).attr("href");
        turnpage(currentLink);
        currentState = window.location.href;
    });


})