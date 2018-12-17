$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        nav:false,
        items: 1,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        slideTransition: 'ease-in'
    })
})




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

// $('.bb-interactive-slider').slick({
//     arrows: false,
//     dots: true,
//     infinite: true,
//     speed: 600,
//     autoplay: true,
//     autoplaySpeed: 5000,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     adaptiveHeight: true,
// });