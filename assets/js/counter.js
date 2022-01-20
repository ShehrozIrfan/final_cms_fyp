$(document).ready(function() {
   setTimeout(hide_popup, 60000);
})

function hide_popup() {
   $('.popup-fixed-notifications').fadeOut(1000);
   $('.popup-fixed-news').fadeOut(1000);
}

//top offset of the element
var topCoord = $("#counter-why-giccl").offset().top
topCoord = Math.floor(topCoord / 2);
var runCount = true;
$(window).scroll(function (event) {
   var scroll = $(window).scrollTop();
   console.log('scroll: ', scroll)
   console.log('top: ', topCoord)
   if(scroll >= topCoord && runCount) {
      start_counter_why_giccl();
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
