var controller = new ScrollMagic.Controller();

var tween = TweenMax.to("nav", 1, { className: "+=changed" });
var scene = new ScrollMagic.Scene({ duration: 100 })
  .setTween(tween)
  .addTo(controller)

var controller = new ScrollMagic.Controller();
var tween = TweenMax.to(".menu-bar", 1, { className: "+=menu-bar-changed" });
var scene = new ScrollMagic.Scene({ duration: 300 })
  .setTween(tween)
  .addTo(controller)

// Smoothscroll

jQuery('a[href*="#"]:not([href="#"])').click(function() {
  var offset = -100; // <-- change the value here
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
          jQuery('html, body').animate({
              scrollTop: target.offset().top + offset
          }, 600);
          return false;
      }
  }
});


// Sub menu mobile

jQuery("body").on('click', '.mobile-nav .menu-item-has-children', function () {
  jQuery(this).find('.sub-menu').slideToggle();
  jQuery(this).toggleClass('active');
});

jQuery("body").on('click', '.mobile-nav-hamburger', function () {
  jQuery('.mobile-nav').slideToggle();
  jQuery('.hamburger').toggleClass('hamburger-active');
  jQuery('nav').toggleClass('nav-active');
});