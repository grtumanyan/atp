var isTop = $(".navbar").offset().top < 50;

handleResize();

$(window).scroll(function () {
    handleResize();
});
$(window).resize(function () {
    handleResize();
});

function handleResize() {
    var navbarTopThreshold = 0;
    var navbarBottomThreshold = 50;
    var windowWidthThreshold = 751;

    var navbarScroll = $(".navbar").offset().top;
    var windowWidth = $(window).width();
    var isWide = windowWidth > windowWidthThreshold;

    var path = window.location.pathname == "/atp-front/community.html";

    if (isTop) {
        if (navbarScroll > navbarBottomThreshold) {
            isTop = false;
        }
    } else {
        if (navbarScroll == navbarTopThreshold) {
            isTop = true;
        }
    }

    if (isWide) {
        if (isTop) {
            $(".navbar-default").css({"box-shadow": "none", "background-color": "transparent"});
            $(".page-scroll").css("color","#FFFFFF");
            $(".navbar-brand").css("background-image", "url(./img/logo_white.svg)");
        } else {
            $(".navbar-default").css({"box-shadow": "0 2px 4px #EAEAEA", "background-color" : "#FFFFFF"});
            $(".page-scroll").css("color","#212121");
            $(".navbar-brand").css("background-image", "url(./img/logo_black.svg)");
        }
    }
    else {
        if (isTop) {
            $(".navbar-default").css({"box-shadow": "none", "background-color": "transparent"});
            $(".page-scroll").css("color","#212121");
            $(".navbar-brand").css("background-image", "url(./img/logo_white.svg)");
            $(".icon-bar").css("background-color","#FFFFFF")
        } else {
            $(".navbar-default").css({"box-shadow": "0 2px 4px #EAEAEA", "background-color" : "#FFFFFF"});
            $(".page-scroll").css("color","#212121");
            $(".navbar-brand").css("background-image", "url(./img/logo_black.svg)");
            $(".icon-bar").css("background-color","#212121")
        }
    }

    if(path) {
        if (navbarScroll == navbarTopThreshold) {
            $('.page-scroll').css("color", "#212121");
            $(".navbar-brand").css("background-image", "url(./img/logo_black.svg)");
        }
    }
}



