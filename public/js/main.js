$(document).ready(function () {

let isTop = $(".navbar").offset().top < 50;

    function handleResize() {
        let $navbar = $(".navbar");
        let navbarTopThreshold = 0;
        let navbarBottomThreshold = 50;
        let windiwWidthThreshold = 751;
        let navbarScroll = $navbar.offset().top;
        let windowWidth = $(window).width();
        let isWide = windowWidth > windiwWidthThreshold;
        let homepage = window.location.pathname.includes('index');

        if (homepage) {
            if (isTop) {
                if (navbarScroll > navbarBottomThreshold) {
                    isTop = false;
                }
            } else {
                $('.carret-icon').attr('src', './img/arrow-right.svg');
                if (navbarScroll == navbarTopThreshold) {
                    isTop = true;
                    $('.carret-icon').attr('src', './img/arrow-right-white.svg');
                }
            }

            isTop ? $navbar.removeClass("scrolled-mode") : $navbar.addClass("scrolled-mode");
        } else {
            $navbar.addClass("scrolled-mode");
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

handleResize();


$(window).scroll(function () {
    handleResize();
});


$(window).resize(function () {
    handleResize();
});

})

$( ".search-button" ).on('click', function(e) {
    e.preventDefault();
    let clicks = $(this).data('clicks');
    if (!clicks) {
        $(this).stop().animate({
            borderRadius: "4px"
        }, 200);
        $( ".search-input" ).stop().animate({
            width: "140px",
            paddingLeft: '15px',
        }, 500);
    } else {
        $(this).stop().animate({
            borderRadius: "50%"
        }, 500);
        $( ".search-input" ).stop().animate({
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
        let target = $(this).attr("href");
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



$("#about_atp_video").on('hidden.bs.modal', function (e) {
    $("#about_atp_video iframe").attr("src", $("#about_atp_video iframe").attr("src"));
});

$("#how_planting_works").on('hidden.bs.modal', function (e) {
    $("#how_planting_works iframe").attr("src", $("#how_planting_works iframe").attr("src"));
});
