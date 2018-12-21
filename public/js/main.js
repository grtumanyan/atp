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

});

$('.two-payment-btn').on('click', function () {
    $(this).addClass('active-button');
    $('.two-time-payment').show();
    $('.one-time-payment').hide();
    $('.one-payment-btn').addClass('not-active-button')
});

$('.one-payment-btn').on('click', function () {
    $(this).removeClass('not-active-button');
    $(this).addClass('active-button');
    $('.one-time-payment').show();
    $('.two-time-payment').hide();
    $('.two-payment-btn').removeClass('active-button')
});

$('.payment-amount').on('click', function () {
    $(this).toggleClass('nurseries-donation-selected-amount');
});

const mountsArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

for (let i = 0; i < mountsArray.length; i++) {
    $('#month_selector').append('<option value=' + mountsArray[i] + '>' + mountsArray[i] + '</option>')
}

const yearArray = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030, 2031, 2032];

for (let j = 0; j < yearArray.length; j++) {
    $('#year_selector').append('<option value=' + yearArray[j] + '>' + yearArray[j] + '</option>')
}

$(function() {
    let activePagePath = location.pathname;

    if (activePagePath === '/') {
        return;
    }

    if ( activePagePath.endsWith('/') ) {
        activePagePath = activePagePath.slice(0, -1);
    }

    let activePage = document.querySelector(`.nav a[href^="${activePagePath}"]`);

    if (activePage === null) {
        activePage = document.querySelector(`.secondary-navbar a[href^="${activePagePath}"]`);
    }

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
        }, 500).show();
    } else {
        $(this).stop().animate({
            borderRadius: "50%"
        }, 500);
        $( ".search-input" ).stop().animate({
            width: 0,
            paddingLeft: 0,
        }, 200).hide();
    }
    $(this).data("clicks", !clicks);
});



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

$('#kids_family, #our_impact').click(function(e) {
    let clicks = $(this).data('clicks');
    let windowWidth = $(window).width();
    if (!clicks && windowWidth <= 1200) {
        e.preventDefault()
        $(this).next('ul.dropdown-menu').show();
    } else {
        // even clicks
    }
    $(this).data("clicks", !clicks);
});


/*Close mobile menu on links click*/

// $(document).ready(function (){
//     $('.nav a').on('click', function() {
//         $('.navbar-collapse').collapse('hide');
//     });
// });



$("#about_atp_video").on('hidden.bs.modal', function () {
    $("#about_atp_video iframe").attr("src", $("#about_atp_video iframe").attr("src"));
});

$("#how_planting_works").on('hidden.bs.modal', function () {
    $("#how_planting_works iframe").attr("src", $("#how_planting_works iframe").attr("src"));
});

$(".modal").on('hidden.bs.modal', function () {
    $(".modal iframe").attr("src", $(".modal iframe").attr("src"));
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
  if(!obj){
      $('.marz-related-info').hide();
      $(".armenian-marz-listing h6").removeClass('selected-marz')
      return;
  }
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
  }else if (lastClickedArea === clickedAreaId || !clickedAreaId) {
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

$("#country").change(function(){
    var selectedCountry = $(this).children("option:selected").val();
    $('#form_country').val(selectedCountry);
});

$("#state").change(function(){
    var selected = $(this).children("option:selected").val();
    $('#form_state').val(selected);
});

$("#other_amount").change(function(){
    var value = $(this).val();
    $('#form_amount').val(value);
});

$("#singleDonation").on('click', function (event) {
    $('#form_type').val('OneTime');
});

$("#monthlyDonation").on('click', function (event) {
    $('#form_type').val('Monthly');
});