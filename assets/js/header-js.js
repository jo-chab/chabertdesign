

$(document).ready(function () {

    $('.menu-toggle').click(function(){
        $('.mobile').toggleClass('open');
    });

    $(".close-alert-box").click(function(){
        $(".w-alert-message").hide();
    });


});