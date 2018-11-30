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
        let homepage = window.location.pathname === '/';

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

$(function() {
    let activePagePath = location.pathname;

    if (activePagePath === '/') {
        return;
    }

    if ( activePagePath.endsWith('/') ) {
        activePagePath = activePagePath.slice(0, -1);
    }

    let activePage = document.querySelector(`.nav a[href^="${activePagePath}"]`);
    let dropdown = activePage.closest('.dropdown');

    if (dropdown !== null) {
        dropdown.firstElementChild.classList.add('active');
    }

    activePage.classList.add('active');
});

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
    marzName: 'ARAGACOTN',
    plantingSites: '125',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '174',
      totalPlanted: '122387'
  },
  {
    id: 'path315',
    marzName: 'ARARAT',
    plantingSites: '91',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '76',
      totalPlanted: '53616'
  },
  {
    id: 'path485',
    marzName: 'ARMAVIR',
    plantingSites: '180',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '338',
      totalPlanted: '236887'
  },
  {
    id: 'path5000',
    marzName: 'ARTSAGH',
    plantingSites: '31',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '48',
      totalPlanted: '33604'
  },
  {
    id: 'path665',
    marzName: 'GEGARKUNIK',
    plantingSites: '54',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '50',
      totalPlanted: '35258'

  },
  {
    id: 'path563',
    marzName: 'VAYOTS DZOR',
    plantingSites: '31',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '53',
      totalPlanted: '37194'
  },
  {
    id: 'path467',
    marzName: 'KOTAYK',
    plantingSites: '104',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '135',
      totalPlanted: '94516'
  },
  {
    id: 'path441',
    marzName: 'LORI',
    plantingSites: '66',
    nurseriesCount: '8',
    nurseriesName: 'Margahovit village',
      totalHectares: '61',
      totalPlanted: '43179'
  },
  {
    id: 'path335',
    marzName: 'SHIRAK',
    plantingSites: '107',
    nurseriesCount: '8',
    nurseriesName: 'Keti village',
      totalHectares: '134',
      totalPlanted: '93911'

  },
  {
    id: 'path513',
    marzName: 'SYUNIK',
    plantingSites: '28',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '28',
      totalPlanted: '19659'
  },
  {
    id: 'path459',
    marzName: 'TAVUSH',
    plantingSites: '41',
    nurseriesCount: '25',
    nurseriesName: 'Aghavnavank village',
      totalHectares: '58',
      totalPlanted: '40552'
  },
  {
    id: 'path329',
    marzName: 'YEREVAN',
    plantingSites: '325',
      nurseriesCount: '',
      nurseriesName: '',
      totalHectares: '525',
      totalPlanted: '368192'

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
  $('.marz-related-info .sites').text(obj.plantingSites);
  $('.marz-related-info .nurseries-name').html('<span>' + obj.nurseriesCount + '</span>' + ' ' + obj.nurseriesName);
  $('.marz-related-info .hectars-count').text(obj.totalHectares);
  $('.marz-related-info .planted-trees-count').html(obj.totalPlanted.replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' Trees');
  $(".armenian-marz-listing h6").removeClass('selected-marz')
  let clickedAreaId = "#" + obj.id;
  if ((clickedAreaPathId === obj.id || clickedAreaPathId === null) && (lastClickedArea !== clickedAreaId || lastClickedArea === null)) {
    lastClickedArea = clickedAreaId;
    $('.marz-related-info').show();
    $(clickedAreaId).css("fill", "#777777");
    $(".armenian-marz-listing h6[data-id = "+ obj.marzName.toLowerCase() +"]").addClass('selected-marz')
  }else if (lastClickedArea === clickedAreaId) {
    lastClickedArea = null;
    $('.marz-related-info').hide();
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