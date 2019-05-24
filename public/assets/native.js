$(document).ready(function() {
  $("#showDetails").click(function() {
    $(this).prev().toggleClass("show");
  });
  $(window).scroll(function() {
    if($(document).scrollTop() > 50) {
      $('nav').addClass('navScrolled');
    }
    else {
      $('nav').removeClass('navScrolled');
    }
  });
  $("nav #brandNav").click(function() {
    $(this).parent().toggleClass("navOpen");
  });
  $("#slideshowMobile").slick({
    dots: true,
    infinite: false,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    slidesPerRow: 1,
    slidesToShow: 1
  });
  $("#slideshowDesktop").slick({
    dots: true,
    infinite: false,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    slidesToScroll: 1,
    rows: 2,
    slidesToShow: 3
  });
  $("#faqMobile").slick({
    infinite: false,
    mobileFirst: true,
    dots: true,
    adaptiveHeight: true
  });
  $("#faqDesktop").slick({
    infinite: true,
    mobileFirst: true,
    dots: true,
    arrows: true,
    slidesToShow: 2,
    slidesPerRow: 2,
    centerPadding: "70px"
  });
});
