$(document).ready(function(){

    $(".opmenu a").on("click", function (e) {

        e.preventDefault();

        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");

        target = $(this).attr("href");

        $(".contenido-tab > div").not(target).hide();
        $(".contenido-tab > div").not(target).hide();

        $(target).fadeIn(600);

    });

});
