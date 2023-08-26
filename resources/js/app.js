// Headroom
// var headroom = new Headroom(document.querySelector('.site-header'), {
//   tolerance: 5,
//   offset: 205,
//   classes: {
//     initial: 'animated',
//     pinned: 'slideDown',
//     unpinned: 'slideUp',
//   },
// });
// headroom.init();

// Navigation toggle
window.addEventListener('load', function () {
  let main_navigation = document.querySelector('#primary-menu');
  document
    .querySelector('#primary-menu-toggle')
    .addEventListener('click', function (e) {
      e.preventDefault();
      main_navigation.classList.toggle('hidden');
    });
});

jQuery(document).ready(function ($) {
  // $('.site-header').headroom({
  //   offset: 205,
  //   tolerance: 5,
  //   classes: {
  //     initial: 'animated',
  //     pinned: 'slideDown',
  //     unpinned: 'slideUp',
  //   },
  // });

  // Mobile Menu
  $('#mobilemenu-open').click(function (e) {
    e.preventDefault();
    $('#mobilemenu').removeClass('translate-x-full');
    $('#mobilemenu-overlay')
      .removeClass('invisible opacity-0')
      .addClass('visible opacity-100');
    $('body').addClass('overflow-y-hidden');
  });
  $('#mobilemenu-close, #mobilemenu-overlay').click(function (e) {
    e.preventDefault();
    $('#mobilemenu').addClass('translate-x-full');
    $('#mobilemenu-overlay')
      .removeClass('visible opacity-100')
      .addClass('invisible opacity-0');
    $('body').removeClass('overflow-y-hidden');
  });
  $('#mobilemenu a').click(function (e) {
    $('#mobilemenu').addClass('translate-x-full');
    $('#mobilemenu-overlay')
      .removeClass('visible opacity-100')
      .addClass('invisible opacity-0');
    $('body').removeClass('overflow-y-hidden');
  });

  $('.info-box--filter .info-box--filter-btn:first-child').addClass('active');
  $('.info-box--filter-btn').click(function (e) {
    e.preventDefault();
    $('.info-box--filter-btn').removeClass('active');
    $(this).addClass('active');
    let target = $(this).data('target');
    $('.infobox-swipers .infobox-swiper').removeClass('active');
    $('#infobox-swiper--' + target).addClass('active');
    //console.log(target);
  });
  $('.infobox-swipers .infobox-swiper:first-child').addClass('active');
  // $('.primary-menu > li.has-submenu').hover(
  //   function () {
  //     $(this).addClass('hovered');
  //   },
  //   function () {
  //     $(this).removeClass('hovered');
  //   }
  // );

  // let primary_menu_width = $('.primary-menu').outerWidth();
  // let primary_menu_pos = $('.primary-menu').offset();
  // let primary_menu_pos_right = primary_menu_pos.left + primary_menu_width;
  // $('.has-submenu.right-align').each(function (i, obj) {
  //   let submenu_width = $(this).find('.submenu').outerWidth();
  //   let submenu_pos = $(this).find('.submenu').offset();
  //   let submenu_pos_left = submenu_pos.left;
  //   let submenu_pos_right = submenu_pos_left + submenu_width;
  //   let submenu_pos_offset = primary_menu_pos_right - submenu_pos_right;
  //   // console.log('Primary width: ', primary_menu_width);
  //   // console.log('Primary Pos: ', primary_menu_pos);
  //   // console.log('Primary Pos Right: ', primary_menu_pos_right);
  //   // console.log('Submenu Width: ', submenu_width);
  //   // console.log('Submenu Pos: ', submenu_pos);
  //   // console.log('Submenu Pos Right: ', submenu_pos_right);
  //   // console.log('Submenu Pos Offset: ', submenu_pos_offset);
  //   $(this)
  //     .find('.submenu')
  //     .css('transform', 'translateX(' + submenu_pos_offset + 'px' + ')');
  // });

  //console.log($('.has-submenu > .submenu').outerWidth());

  // Posts Search
  $('#posts-search-button').on('click', function (event) {
    let search_query = $('#posts-search').val();
    let search_filter = $('#posts-filter').find(':selected').val();
    // console.log('Query :', search_query);
    // console.log('Filter :', search_filter);

    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_posts',
        query: search_query,
        filter: search_filter,
      },
      beforeSend: function () {
        $('#posts-search-button .spinner-border')
          .removeClass('opacity-0')
          .addClass('opacity-100');
        $('.posts-grid .blocker').show();
      },
      success: function (res) {
        $('.posts-grid').html(res);
        $('#posts-search-button .spinner-border')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Reports Search
  $('#report-search-button').on('click', function (event) {
    let search_query = $('#report-search').val();
    let search_filter = $('#report-filter').find(':selected').val();
    // console.log('Query :', search_query);
    // console.log('Filter :', search_filter);

    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_reports',
        query: search_query,
        filter: search_filter,
      },
      beforeSend: function () {
        $('#report-search-button .spinner-border')
          .removeClass('opacity-0')
          .addClass('opacity-100');
        $('.report-grid .blocker').show();
      },
      success: function (res) {
        $('.report-grid').html(res);
        $('#report-search-button .spinner-border')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Submission Search
  $('#submission-search-button').on('click', function (event) {
    let search_query = $('#submission-search').val();
    let search_filter = $('#submission-filter').find(':selected').val();
    // console.log('Query :', search_query);
    // console.log('Filter :', search_filter);

    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_submissions',
        query: search_query,
        filter: search_filter,
      },
      beforeSend: function () {
        $('#submission-search-button .spinner-border')
          .removeClass('opacity-0')
          .addClass('opacity-100');
        $('.submissions-grid .blocker').show();
      },
      success: function (res) {
        $('.submissions-grid').html(res);
        $('#submission-search-button .spinner-border')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Events Search
  $('#events-search-button').on('click', function (event) {
    let search_query = $('#events-search').val();
    let search_suburb = $('#events-suburb').find(':selected').val();
    let search_topic = $('#events-topic').find(':selected').val();
    let search_month = $('#events-month').find(':selected').val();
    // console.log('Query :', search_query);
    // console.log('Suburb :', search_suburb);

    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_events',
        query: search_query,
        suburb: search_suburb,
        topic: search_topic,
        month: search_month,
      },
      beforeSend: function () {
        $('#events-search-button .spinner-border')
          .removeClass('opacity-0')
          .addClass('opacity-100');
        $('.events-grid .blocker').show();
      },
      success: function (res) {
        $('.events-grid').html(res);
        $('#events-search-button .spinner-border')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });
});
