$(document).ready(function() {
   setTimeout(hide_popup_notice, 60000);
   setTimeout(hide_popup_news, 45000);
})

function hide_popup_notice() {
   $('.popup-fixed-notifications').fadeOut(1000);
}

function hide_popup_news() {
   $('.popup-fixed-news').fadeOut(1000);
}

//top offset of the element
var topCoord = $("#counter-why-giccl").offset().top
topCoord = Math.floor(topCoord / 2.5);
var runCount = true;

var topCoordNews = $('#s_news').offset().top
topCoordNews = Math.floor(topCoordNews / 2)

$(window).scroll(function (event) {
   var scroll = $(window).scrollTop();
   if(scroll >= topCoord && runCount) {
      start_counter_why_giccl();
   }
   if(scroll >= topCoordNews) {
      $('.popup-fixed-notifications').fadeOut(1000);
      $('.popup-fixed-news').fadeOut(1000);
   }
});

function start_counter_why_giccl() {
   runCount = false;
   $('.counter').each(function () {
      $(this).prop('Counter', 0).animate({
         Counter: $(this).text()
      }, {
         duration: 4000,
         easing: 'swing',
         step: function (now) {
            $(this).text(Math.ceil(now));
         }
      });
   });
}
