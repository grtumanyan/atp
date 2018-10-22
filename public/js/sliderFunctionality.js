$('.slider-wrapper').slick({
    arrows: false,
    dots: true,
    infinite: true,
    speed: 600,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true
});


$('.before-after-slider').slick({
    arrows: true,
    dots: false,
    infinite: true,
    speed: 600,
    autoplay: false,
    draggable: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
});