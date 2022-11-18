var Core = {};

Core = (function () {
  var fn = {};
  var settings = {};

  fn.mobileNavToggle = function () {
    $(".menu-toggle").click(function () {
      $(this).toggleClass("clicked");
      $(".mobilenavigation").slideToggle().toggleClass("visible");
    });
  };

  fn.matchTextHeight = function () {
    $(document).ready(function () {
      let bodyHeight = $(".content-block").height();
      $(".content-block__image").css("min-height", bodyHeight + "px");
    });
  };

  return fn;
})();

var $ = jQuery.noConflict();

jQuery(document).ready(function ($) {
  Core.mobileNavToggle();
  Core.matchTextHeight();
});

jQuery(window).load(function ($) {
  //
});
