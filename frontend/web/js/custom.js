// Hamburger
$(function (){


$(".hamburger").click(function() {

            $(this).toggleClass('is-active');
            if ($(this).hasClass('is-active')){
                $('.navbar').removeClass('bg_transparent').addClass('bg-light');
            }else{
                $('.navbar').removeClass('bg-light').addClass('bg_transparent');
            }

        });
})


$(window).scroll(function() {

    if ($(".navbar").offset().top > 20) {
        $(".fixed-top").removeClass('bg_transparent pt-3 pb-3').addClass("bg-light shadow pt-1 pb-1");
    } else {
        $(".fixed-top").removeClass("bg-light shadow pt-1 pb-1").addClass('bg_transparent pt-3 pb-3');
    }
});
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

