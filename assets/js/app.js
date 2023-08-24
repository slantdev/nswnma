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
    $("#posts-search-button").on("click", function(event) {
      let search_query = $("#posts-search").val();
      let search_filter = $("#posts-filter").find(":selected").val();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_posts",
          query: search_query,
          filter: search_filter
        },
        beforeSend: function() {
          $("#posts-search-button .spinner-border").removeClass("opacity-0").addClass("opacity-100");
          $(".posts-grid .blocker").show();
        },
        success: function(res) {
          $(".posts-grid").html(res);
          $("#posts-search-button .spinner-border").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
    $("#report-search-button").on("click", function(event) {
      let search_query = $("#report-search").val();
      let search_filter = $("#report-filter").find(":selected").val();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_reports",
          query: search_query,
          filter: search_filter
        },
        beforeSend: function() {
          $("#report-search-button .spinner-border").removeClass("opacity-0").addClass("opacity-100");
          $(".report-grid .blocker").show();
        },
        success: function(res) {
          $(".report-grid").html(res);
          $("#report-search-button .spinner-border").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
    $("#submission-search-button").on("click", function(event) {
      let search_query = $("#submission-search").val();
      let search_filter = $("#submission-filter").find(":selected").val();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_submissions",
          query: search_query,
          filter: search_filter
        },
        beforeSend: function() {
          $("#submission-search-button .spinner-border").removeClass("opacity-0").addClass("opacity-100");
          $(".submissions-grid .blocker").show();
        },
        success: function(res) {
          $(".submissions-grid").html(res);
          $("#submission-search-button .spinner-border").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
    $("#events-search-button").on("click", function(event) {
      let search_query = $("#events-search").val();
      let search_suburb = $("#events-suburb").find(":selected").val();
      let search_topic = $("#events-topic").find(":selected").val();
      let search_month = $("#events-month").find(":selected").val();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_events",
          query: search_query,
          suburb: search_suburb,
          topic: search_topic,
          month: search_month
        },
        beforeSend: function() {
          $("#events-search-button .spinner-border").removeClass("opacity-0").addClass("opacity-100");
          $(".events-grid .blocker").show();
        },
        success: function(res) {
          $(".events-grid").html(res);
          $("#events-search-button .spinner-border").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
  });
})();
