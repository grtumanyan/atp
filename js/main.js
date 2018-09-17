var isTop = $(".navbar").offset().top < 50;


handleResize();


$(window).scroll(function () {
    handleResize();
});


$(window).resize(function () {
    handleResize();
});


function handleResize() {
    var $navbar = $(".navbar");
    var navbarTopThreshold = 0;
    var navbarBottomThreshold = 5;
    var windiwWidthThreshold = 751;
    var navbarScroll = $navbar.offset().top;
    var windowWidth = $(window).width();
    var isWide = windowWidth > windiwWidthThreshold;



        if (isTop) {
            if (navbarScroll > navbarBottomThreshold) {
                isTop = false;
                $navbar.addClass("scrolled-mode")
            }
        } else {
            if (navbarScroll == navbarTopThreshold) {
                isTop = true;
                $navbar.removeClass("scrolled-mode")
            }
        }



    $(".dropdown").hover(
        function () {
            if (isWide) {
                isTop ? $(this).addClass('up') : $(this).addClass('down');
            }
        },
        function () {
            if (isWide) {
                isTop ? $(this).removeClass('up') : $(this).removeClass('down');
            }
        }
    );

    isWide ? $navbar.removeClass("mobile-mode") : $navbar.addClass("mobile-mode");
}

$( ".search-button" ).on('click', function(e) {
    e.preventDefault();
    let clicks = $(this).data('clicks');
    if (!clicks) {
        $(this).animate({
            borderRadius: "4px"
        }, 200);
        $( ".search-input" ).animate({
            width: "180px",
            paddingLeft: '15px',
        }, 500);
    } else {
        $(this).animate({
            borderRadius: "50%"
        }, 500);
        $( ".search-input" ).animate({
            width: 0,
            paddingLeft: 0,
        }, 200);
    }
    $(this).data("clicks", !clicks);
});


/*Smooth scroll functionality*/

$(document).ready(function() {
    $('a[href*=#]').bind('click', function(e) {
        e.preventDefault();
        var target = $(this).attr("href");
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 500, function() {
            location.hash = target;
        });
        return false;
    });
});


/*Add active class to links on scroll*/

// $(window).on('scroll',function(){
//     var windowTopPosition = $(window).scrollTop();
//     $('.single-section').each(function(i){
//         if(windowTopPosition > $(this).offset().top - 50){
//             $('.nav > li > a').removeClass('active');
//             $('.nav li').eq(i).find('a').addClass('active');
//         }
//     });
// });

$(function () {
    $('.navbar-nav li.dropdown').hover(function () {
            $(this).find('ul').show();
        },
        function () {
            $(this).find('ul').hide();
        });
});

/*Close mobile menu on links click*/

$(document).ready(function (){
    $('.nav a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
    });
});

/*Change menu's button color when scroll executed*/

$(document).ready(function() {
    $(this).on("scroll", function () {
       if($(document).scrollTop() >= $(".nav").offset().top && $(document).scrollTop() <= $(".top-section").offset().top) {
           $(".icon-bar").css({"background-color": "#fcfcfb"});
       } else {
           $(".icon-bar").css({"background-color": "#212121"});
       }
    });
});
