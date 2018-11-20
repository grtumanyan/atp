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
    let windowWidth = $(window).width();
    if(windowWidth >= 1200) {
      $('.navbar-nav li.dropdown').hover(function () {
        $(this).find('ul.dropdown-menu').show();
      },
      function () {
        $(this).find('ul.dropdown-menu').hide();
      });
    }
});

/*Close mobile menu on links click*/

$(document).ready(function (){
    $('.nav a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
    });
});



$("#about_atp_video").on('hidden.bs.modal', function () {
    $("#about_atp_video iframe").attr("src", $("#about_atp_video iframe").attr("src"));
});

$("#how_planting_works").on('hidden.bs.modal', function () {
    $("#how_planting_works iframe").attr("src", $("#how_planting_works iframe").attr("src"));
});


/*Open impact page single info*/

$("#sustain").on('click', function () {
  $("#sustain_info").fadeIn();
  $('.impact-single-content-wrapper').hide();
});

$("#empower").on('click', function () {
  $("#empower_info").fadeIn();
  $('.impact-single-content-wrapper').hide();
});

$("#teach").on('click', function () {
  $("#teach_info").fadeIn();
  $('.impact-single-content-wrapper').hide();
});

$(".close-icon").on('click', function () {
  $(".single-content-related-info").hide();
  $('.impact-single-content-wrapper').fadeIn();
});


$('.amount-selector').on('click', function () {
  $('.amount-selection-button-wrapper').removeClass('selected-amount');
  $(this).parent('.amount-selection-button-wrapper').addClass('selected-amount');
  $("#form_amount").val($(this).val());
});

/*Events page view toggling functionality*/

$('.month-view').on('click', function () {
  $('.list-view').removeClass('active-list-view');
  $(this).addClass('active-month-view');
  $('.single-events-panels-wrapper').hide();
  $('.events-calendar-large').show();
});

$('.list-view').on('click', function () {
  $('.month-view').removeClass('active-month-view');
  $(this).addClass('active-list-view');
  $('.single-events-panels-wrapper').show();
  $('.events-calendar-large').hide();
});


/*Map functionality*/

let mapRelatedInfo = [
  {
    id: 'path375',
    marzName: 'ARAGACOTN'
  },
  {
    id: 'path315',
    marzName: 'ARARAT'
  },
  {
    id: 'path485',
    marzName: 'ARMAVIR'
  },
  {
    id: 'path5000',
    marzName: 'ARTSAGH'
  },
  {
    id: 'path665',
    marzName: 'GEGARKUNIK'
  },
  {
    id: 'path563',
    marzName: 'VAYOTS DZOR'
  },
  {
    id: 'path467',
    marzName: 'KOTAYK'
  },
  {
    id: 'path441',
    marzName: 'LORI'
  },
  {
    id: 'path335',
    marzName: 'SHIRAK'
  },
  {
    id: 'path513',
    marzName: 'SYUNIK'
  },
  {
    id: 'path459',
    marzName: 'TAVUSH'
  },
  {
    id: 'path329',
    marzName: 'YEREVAN'
  }
];

function findObjectByKey(array, key, value) {
  for (let i = 0; i < array.length; i++) {
    if (array[i][key].toLowerCase() === value.toLowerCase()) {
      return array[i];
    }
  }
  return null;
}

let lastClickedArea = null;
function showHideLabels(obj, clickedAreaPathId = null) {
  $('.marz-related-info h6').text(obj.marzName);
  $(".armenian-marz-listing h6").removeClass('selected-marz')
  let clickedAreaId = "#" + obj.id;
  if ((clickedAreaPathId === obj.id || clickedAreaPathId === null) && (lastClickedArea !== clickedAreaId || lastClickedArea === null)) {
    lastClickedArea = clickedAreaId;
    $('.marz-related-info').show();
    $('.marz-related-villages-list').show();
    $(clickedAreaId).css("fill", "#777777");
    $(".armenian-marz-listing h6[data-id = "+ obj.marzName.toLowerCase() +"]").addClass('selected-marz')
  }else if (lastClickedArea === clickedAreaId) {
    lastClickedArea = null;
    $('.marz-related-info').hide();
    $('.marz-related-villages-list').hide();
    $(clickedAreaId).css("fill", "#D5D4D4");
  }
}

function fillDefault(){
  $.each(mapRelatedInfo, function(index, item){
    $("#" + item.id).css("fill", "#D5D4D4");
  });
}

$('#map').on('click', function (event) {
  fillDefault()
  let clickedAreaPathId = event.target.id;
  let obj = findObjectByKey(mapRelatedInfo, 'id', clickedAreaPathId);
  showHideLabels(obj, clickedAreaPathId);
});

$(".armenian-marz-listing h6").on('click', function (event) {
  fillDefault();
  let text = $(event.target).text();
  let obj = findObjectByKey(mapRelatedInfo, 'marzName', text);
  showHideLabels(obj);
});