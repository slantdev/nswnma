(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    let main_navigation = document.querySelector("#primary-menu");
    document.querySelector("#primary-menu-toggle").addEventListener("click", function(e) {
      e.preventDefault();
      main_navigation.classList.toggle("hidden");
    });
  });
  jQuery(document).ready(function($) {
    $(".info-box--filter .info-box--filter-btn:first-child").addClass("active");
    $(".info-box--filter-btn").click(function(e) {
      e.preventDefault();
      $(".info-box--filter-btn").removeClass("active");
      $(this).addClass("active");
      let target = $(this).data("target");
      $(".infobox-swipers .infobox-swiper").removeClass("active");
      $("#infobox-swiper--" + target).addClass("active");
    });
    $(".infobox-swipers .infobox-swiper:first-child").addClass("active");
  });
})();
