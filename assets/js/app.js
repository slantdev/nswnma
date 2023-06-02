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
    $(".primary-menu > li.has-submenu").hover(function() {
      $(this).addClass("hovered");
    }, function() {
      $(this).removeClass("hovered");
    });
    let primary_menu_width = $(".primary-menu").outerWidth();
    let primary_menu_pos = $(".primary-menu").offset();
    let primary_menu_pos_right = primary_menu_pos.left + primary_menu_width;
    $(".has-submenu.right-align").each(function(i, obj) {
      let submenu_width = $(this).find(".submenu").outerWidth();
      let submenu_pos = $(this).find(".submenu").offset();
      let submenu_pos_left = submenu_pos.left;
      let submenu_pos_right = submenu_pos_left + submenu_width;
      let submenu_pos_offset = primary_menu_pos_right - submenu_pos_right;
      $(this).find(".submenu").css("transform", "translateX(" + submenu_pos_offset + "px)");
    });
  });
})();
