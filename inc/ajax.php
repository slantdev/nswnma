<?php

function filter_posts()
{
  $search_query = $_POST['query'];
  $search_filter = $_POST['filter'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  if ($search_query) {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $search_query,
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $search_query,
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  } else {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  }

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $title =  get_the_title();
      $date =  get_the_date();
      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
      $link = get_the_permalink();


      $response .= '<div class="border rounded-2xl overflow-hidden shadow-[0_0px_24px_rgba(0,0,0,0.12)] flex flex-col">
                <div class="aspect-w-6 aspect-h-4">
                  <a href="' . $link . '" class=""><img src="' . $img_src . '" alt="" class="object-cover h-full w-full"></a>
                </div>
                <div class="p-8 flex flex-col grow">
                  <div class="mb-6 text-gray-500">' . $date . '</div>
                  <h3 class="h4 font-semibold mb-6"><a href="' . $link . '" class="text-brand-blue hover:underline">' . $title . '</a></h3>
                  <div class="prose mb-8">
                    <p>' . $excerpt . '</p>
                  </div>
                  <div class="mt-auto">
                    <a href="' . $link . '" class="font-medium text-brand-red hover:text-brand-redchili hover:underline">LEARN MORE &raquo;</a>
                  </div>
                </div>
              </div>';

    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


/* ###### Ajax function for pagination ###### */
add_action('wp_ajax_pagination_load_posts', 'pagination_load_posts');
add_action('wp_ajax_nopriv_pagination_load_posts', 'pagination_load_posts');
function pagination_load_posts()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $condition = sanitize_text_field($_POST['condition']);
    $categories = sanitize_text_field($_POST['categories']);
    $categories = json_decode(stripslashes($categories));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($categories) {
      if ($condition == 'include') {
        $all_blog_posts = new WP_Query(
          array(
            'post_type'         => 'post',
            'post_status '      => 'publish',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'category__in'          => $categories,
            'posts_per_page'    => $per_page,
            'offset'            => $start
          )
        );
        $count = new WP_Query(
          array(
            'post_type'         => 'post',
            'post_status '      => 'publish',
            'category__in'          => $categories,
            'posts_per_page'    => -1
          )
        );
      } else {
        $all_blog_posts = new WP_Query(
          array(
            'post_type'         => 'post',
            'post_status '      => 'publish',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'category__not_in'      => json_decode($categories),
            'posts_per_page'    => $per_page,
            'offset'            => $start
          )
        );
        $count = new WP_Query(
          array(
            'post_type'         => 'post',
            'post_status '      => 'publish',
            'category__not_in'      => json_decode($categories),
            'posts_per_page'    => -1
          )
        );
      }
    } else {
      $all_blog_posts = new WP_Query(
        array(
          'post_type'         => 'post',
          'post_status '      => 'publish',
          'orderby'           => 'post_date',
          'order'             => 'DESC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'post',
          'post_status '      => 'publish',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_blog_posts->have_posts()) {
      echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">';
      while ($all_blog_posts->have_posts()) {
        $all_blog_posts->the_post(); ?>
        <?php
        $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $title =  get_the_title();
        $date =  get_the_date();
        $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
        $link = get_the_permalink();
        ?>
        <div class="border rounded-2xl overflow-hidden shadow-[0_0px_24px_rgba(0,0,0,0.12)] flex flex-col">
          <div class="aspect-w-6 aspect-h-4">
            <a href="<?php echo $link ?>" class=""><img src="<?php echo $img_src ?>" alt="" class="object-cover h-full w-full"></a>
          </div>
          <div class="p-8 flex flex-col grow">
            <div class="mb-6 text-gray-500"><?php echo $date ?></div>
            <h3 class="h4 font-semibold mb-6"><a href="<?php echo $link ?>" class="text-brand-blue hover:underline"><?php echo $title ?></a></h3>
            <div class="prose mb-8">
              <p><?php echo $excerpt ?></p>
            </div>
            <div class="mt-auto">
              <a href="<?php echo $link ?>" class="font-medium text-brand-red hover:text-brand-redchili hover:underline">LEARN MORE &raquo;</a>
            </div>
          </div>
        </div>
    <?php
      }
      echo '</div>';
    }
    // Paginations
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons logic
    ?>
    <div class='posts-pagination mt-12'>
      <ul>
        <?php
        if ($first_btn && $cur_page > 1) { ?>
          <li data-page='1' class='active'>
            &lt;&lt;</li>
        <?php
        } else if ($first_btn) { ?>
          <li data-page='1' class='inactive'>
            &lt;&lt;</li>
        <?php
        }
        if ($previous_btn && $cur_page > 1) {
          $pre = $cur_page - 1; ?>
          <li data-page='<?php echo $pre; ?>' class='active'>
            &lt;</li>
        <?php
        } else if ($previous_btn) { ?>
          <li class='inactive p-2'>
            &lt;</li>
          <?php
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
          if ($cur_page == $i) { ?>
            <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
          <?php
          } else { ?>
            <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
          <?php
          }
        }
        if ($next_btn && $cur_page < $no_of_paginations) {
          $nex = $cur_page + 1; ?>
          <li data-page='<?php echo $nex; ?>' class='active'>&gt;</li>
        <?php
        } else if ($next_btn) { ?>
          <li class='inactive'>&gt;</li>
        <?php
        }

        if ($last_btn && $cur_page < $no_of_paginations) { ?>
          <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&gt;&gt;</li>
        <?php
        } else if ($last_btn) { ?>
          <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&gt;&gt;</li>
        <?php
        } ?>
      </ul>
    </div>
    <?php
  }
  exit();
}

function filter_reports()
{
  $search_query = $_POST['query'];
  $search_filter = $_POST['filter'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  if ($search_query) {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'report',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $search_query,
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'report',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $search_query,
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'report_category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  } else {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'report',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'report',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'report_category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  }

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 md:grid-cols-3 gap-6">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $title =  get_the_title();
      $report_pdf = get_field('report_pdf', get_the_ID());
      $external_link_report = get_field('external_link_report', get_the_ID());
      $report_pdf_link = '';
      if ($report_pdf) {
        $report_pdf_link = $report_pdf['url'];
      } else {
        if ($external_link_report) {
          $report_pdf_link = $external_link_report;
        }
      }

      $response .= '<div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">';
      if ($img_src) {
        $response .= '<div class="pb-8"><div class="aspect-w-4 aspect-h-5">
          <img src="' . $img_src . '" alt="" class="w-full h-full object-cover rounded-lg">
        </div></div>';
      }
      $response .= '<div class="">
            <div class="flex justify-between">
              <div class="text-white text-xl">' . $title . '</div>
                <div><a href="' . $report_pdf_link . '" target="_blank" class="inline-block text-white opacity-80 hover:opacity-100">' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '</a></div>
            </div>
          </div>';
      $response .= '</div>';

    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_reports', 'filter_reports');
add_action('wp_ajax_nopriv_filter_reports', 'filter_reports');

/* ###### Ajax function for pagination ###### */
add_action('wp_ajax_pagination_load_reports', 'pagination_load_reports');
add_action('wp_ajax_nopriv_pagination_load_reports', 'pagination_load_reports');
function pagination_load_reports()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $categories = sanitize_text_field($_POST['categories']);
    $categories = json_decode(stripslashes($categories));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($categories) {
      $all_reports = new WP_Query(
        array(
          'post_type'         => 'report',
          'post_status '      => 'publish',
          'orderby'           => 'post_date',
          'order'             => 'DESC',
          'posts_per_page'    => $per_page,
          'offset'            => $start,
          'tax_query' => array(
            array(
              'taxonomy' => 'report_category',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'report',
          'post_status '      => 'publish',
          'posts_per_page'    => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'report_category',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
    } else {
      $all_reports = new WP_Query(
        array(
          'post_type'         => 'report',
          'post_status '      => 'publish',
          'orderby'           => 'post_date',
          'order'             => 'DESC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'report',
          'post_status '      => 'publish',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_reports->have_posts()) {
      echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6">';
      while ($all_reports->have_posts()) {
        $all_reports->the_post(); ?>
        <?php
        $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $title =  get_the_title();
        $report_pdf = get_field('report_pdf', get_the_ID());
        $external_link_report = get_field('external_link_report', get_the_ID());
        $report_pdf_link = '';
        if ($report_pdf) {
          $report_pdf_link = $report_pdf['url'];
        } else {
          if ($external_link_report) {
            $report_pdf_link = $external_link_report;
          }
        }
        ?>
        <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
          <?php if ($img_src) : ?>
            <div class="pb-8">
              <div class="aspect-w-4 aspect-h-5">
                <img src="<?php echo $img_src ?>" alt="" class="w-full h-full object-cover rounded-lg">
              </div>
            </div>
          <?php endif; ?>
          <div class="">
            <div class="flex justify-between">
              <div class="text-white text-xl"><?php echo $title ?></div>
              <?php if ($report_pdf_link) : ?>
                <div><a href="<?php echo $report_pdf_link ?>" target="_blank" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
    <?php
      }
      echo '</div>';
    }
    // Paginations
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons logic
    ?>
    <div class='reports-pagination mt-8 md:mt-12'>
      <ul>
        <?php
        if ($first_btn && $cur_page > 1) { ?>
          <li data-page='1' class='active'>
            &lt;&lt;</li>
        <?php
        } else if ($first_btn) { ?>
          <li data-page='1' class='inactive'>
            &lt;&lt;</li>
        <?php
        }
        if ($previous_btn && $cur_page > 1) {
          $pre = $cur_page - 1; ?>
          <li data-page='<?php echo $pre; ?>' class='active'>
            &lt;</li>
        <?php
        } else if ($previous_btn) { ?>
          <li class='inactive p-2'>
            &lt;</li>
          <?php
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
          if ($cur_page == $i) { ?>
            <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
          <?php
          } else { ?>
            <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
          <?php
          }
        }
        if ($next_btn && $cur_page < $no_of_paginations) {
          $nex = $cur_page + 1; ?>
          <li data-page='<?php echo $nex; ?>' class='active'>&gt;</li>
        <?php
        } else if ($next_btn) { ?>
          <li class='inactive'>&gt;</li>
        <?php
        }

        if ($last_btn && $cur_page < $no_of_paginations) { ?>
          <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&gt;&gt;</li>
        <?php
        } else if ($last_btn) { ?>
          <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&gt;&gt;</li>
        <?php
        } ?>
      </ul>
    </div>
    <?php
  }
  exit();
}

/* ###### Ajax function for pagination ###### */
add_action('wp_ajax_pagination_load_events', 'pagination_load_events');
add_action('wp_ajax_nopriv_pagination_load_events', 'pagination_load_events');
function pagination_load_events()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $categories = sanitize_text_field($_POST['categories']);
    $categories = json_decode(stripslashes($categories));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($categories) {
      $all_events = new WP_Query(
        array(
          'post_type'         => 'event',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start,
          'tax_query' => array(
            array(
              'taxonomy' => 'event_topic',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'event',
          'post_status '      => 'publish',
          'posts_per_page'    => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'event_topic',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
    } else {
      $all_events = new WP_Query(
        array(
          'post_type'         => 'event',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'event',
          'post_status '      => 'publish',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_events->have_posts()) {
      echo '<div class="grid grid-cols-1 gap-y-6 xl:gap-y-10">';
      while ($all_events->have_posts()) {
        $all_events->the_post(); ?>
        <?php
        $id = get_the_ID();
        $set_multidate_event = get_field('set_multidate_event', $id);
        $single_event_date = '';
        $single_start_time = '';
        $single_end_time = '';
        $multi_start_date = '';
        $multi_start_date_start_time = '';
        $multi_start_date_end_time = '';
        $multi_end_date = '';
        $multi_end_date_start_time = '';
        $multi_end_date_end_time = '';

        $location = get_field('location', $id);
        $cpd_hours = get_field('cpd_hours', $id);
        $cost = get_field('cost', $id);
        $registration_link = get_field('registration_link', $id);

        $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
        $img_src = get_the_post_thumbnail_url($id, 'large');
        $title =  get_the_title();
        $date =  get_the_date();
        $link = get_the_permalink();

        $event_date = '';
        if ($set_multidate_event) {
          $multidate_event = get_field('multidate_event', $id);
          $multi_start_date = $multidate_event['start_date']['start_date'];
          $multi_start_date_start_time = $multidate_event['start_date']['start_time'];
          $multi_start_date_end_time = $multidate_event['start_date']['end_time'];
          $multi_end_date = $multidate_event['end_date']['end_date'];
          $multi_end_date_start_time = $multidate_event['end_date']['start_time'];
          $multi_end_date_end_time = $multidate_event['end_date']['end_time'];
          if ($multi_start_date) {
            $event_date .= $multi_start_date;
          }
          if ($multi_start_date_start_time) {
            $event_date .= ' (' . $multi_start_date_start_time;
          }
          if ($multi_start_date_end_time) {
            $event_date .= ' - ' . $multi_start_date_end_time . ')';
          } else {
            $event_date .= ')';
          }
          if ($multi_end_date) {
            $event_date .= ' - ' . $multi_end_date;
          }
          if ($multi_end_date_start_time) {
            $event_date .= ' (' . $multi_end_date_start_time;
          }
          if ($multi_end_date_end_time) {
            $event_date .= ' - ' . $multi_end_date_end_time . ')';
          } else {
            $event_date .= ')';
          }
        } else {
          $single_date_event = get_field('single_date_event', $id);
          $single_event_date = $single_date_event['event_date'];
          $single_start_time = $single_date_event['start_time'];
          $single_end_time = $single_date_event['end_time'];
          if ($single_event_date) {
            $event_date .= $single_event_date;
          }
          if ($single_start_time) {
            $event_date .= ' (' . $single_start_time;
          }
          if ($single_end_time) {
            $event_date .= ' - ' . $single_end_time . ')';
          } else {
            $event_date .= ')';
          }
        }
        ?>
        <div class="border rounded-md p-4 md:p-6 lg:p-10 bg-slate-50">
          <div class="flex flex-col lg:flex-row lg:gap-x-10">
            <div class="w-full order-2 lg:order-1 lg:w-1/2">
              <h3 class="h4 text-brand-blue mb-4 lg:mb-8 mt-4 lg:mt-2 tracking-tight leading-snug font-bold"><a href="<?php echo $link ?>" class="hover:underline"><?php echo $title ?></a></h3>
              <div class="prose lg:prose-lg">
                <div><?php echo $event_date ?></div>
                <div class="mt-4 lg:mt-8">
                  <?php if ($location) : ?>
                    <strong>Location:</strong> <?php echo $location ?><br />
                  <?php endif; ?>
                  <?php if ($cpd_hours) : ?>
                    <strong>CPD Hours:</strong> <?php echo $cpd_hours ?><br />
                  <?php endif; ?>
                  <?php if ($cost) : ?>
                    <strong>Cost:</strong> <?php echo $cost ?>
                  <?php endif; ?>
                </div>
              </div>
              <div class="mt-4 lg:mt-8 inline-flex gap-4">
                <?php if ($registration_link) : ?>
                  <a href="<?php echo $registration_link['url'] ?>" class="btn btn-primary">Register</a>
                <?php endif; ?>
                <a href="<?php echo $link ?>" class="btn btn-secondary">Find Out More</a>
              </div>
            </div>
            <div class="w-full order-1 lg:order-2 lg:w-1/2">
              <?php if ($img_src) : ?>
                <div class="aspect-w-6 aspect-h-4"><img src="<?php echo $img_src ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php
      }
      echo '</div>';
    }
    // Paginations
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons logic
    if ($no_of_paginations > 1) :
      ?>
      <div class='events-pagination mt-12'>
        <ul>
          <?php
          if ($first_btn && $cur_page > 1) { ?>
            <li data-page='1' class='active'>
              &lt;&lt;</li>
          <?php
          } else if ($first_btn) { ?>
            <li data-page='1' class='inactive'>
              &lt;&lt;</li>
          <?php
          }
          if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1; ?>
            <li data-page='<?php echo $pre; ?>' class='active'>
              &lt;</li>
          <?php
          } else if ($previous_btn) { ?>
            <li class='inactive p-2'>
              &lt;</li>
            <?php
          }
          for ($i = $start_loop; $i <= $end_loop; $i++) {
            if ($cur_page == $i) { ?>
              <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
            <?php
            } else { ?>
              <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
            <?php
            }
          }
          if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1; ?>
            <li data-page='<?php echo $nex; ?>' class='active'>&gt;</li>
          <?php
          } else if ($next_btn) { ?>
            <li class='inactive'>&gt;</li>
          <?php
          }

          if ($last_btn && $cur_page < $no_of_paginations) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&gt;&gt;</li>
          <?php
          } else if ($last_btn) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&gt;&gt;</li>
          <?php
          } ?>
        </ul>
      </div>
      <?php
    endif;
  }
  exit();
}

function filter_events()
{
  $search_query = $_POST['query'];
  $search_suburb = $_POST['suburb'];
  $search_topic = $_POST['topic'];
  $search_month = $_POST['month'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  // if ($search_query) {
  //   if ($search_suburb == 'all') {
  //     $args = array(
  //       'post_type' => 'event',
  //       'posts_per_page' => $postsPerPage,
  //       'orderby' => 'menu_order',
  //       'order' => 'ASC',
  //       's' => $search_query,
  //       'post_status' => 'publish',
  //     );
  //   } else {
  //     $args = array(
  //       'post_type' => 'event',
  //       'posts_per_page' => $postsPerPage,
  //       'orderby' => 'menu_order',
  //       'order' => 'ASC',
  //       's' => $search_query,
  //       'post_status' => 'publish',
  //       'tax_query' => array(
  //         array(
  //           'taxonomy' => 'event_suburb',
  //           'field'    => 'term_id',
  //           'terms'    => $search_suburb,
  //         ),
  //       ),
  //     );
  //   }
  // } else {
  //   if ($search_suburb == 'all') {
  //     $args = array(
  //       'post_type' => 'event',
  //       'posts_per_page' => $postsPerPage,
  //       'orderby' => 'menu_order',
  //       'order' => 'ASC',
  //       'post_status' => 'publish',
  //     );
  //   } else {
  //     $args = array(
  //       'post_type' => 'event',
  //       'posts_per_page' => $postsPerPage,
  //       'orderby' => 'menu_order',
  //       'order' => 'ASC',
  //       'post_status' => 'publish',
  //       'tax_query' => array(
  //         array(
  //           'taxonomy' => 'event_suburb',
  //           'field'    => 'term_id',
  //           'terms'    => $search_suburb,
  //         ),
  //       ),
  //     );
  //   }
  // }

  $defaults = array(
    'post_type' => 'event',
    'posts_per_page' => $postsPerPage,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_status' => 'publish',
  );

  if ($search_suburb != 'all' && $search_topic != 'all' && $search_month != 'all') {
    $args = array(
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
        array(
          'taxonomy' => 'event_topic',
          'field'    => 'term_id',
          'terms'    => $search_topic,
        ),
        array(
          'taxonomy' => 'event_month',
          'field'    => 'term_id',
          'terms'    => $search_month,
        ),
      ),
    );
  } else if ($search_suburb != 'all' && $search_topic != 'all') {
    $args = array(
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
        array(
          'taxonomy' => 'event_topic',
          'field'    => 'term_id',
          'terms'    => $search_topic,
        ),
      ),
    );
  } else if ($search_suburb != 'all' && $search_month != 'all') {
    $args = array(
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
        array(
          'taxonomy' => 'event_month',
          'field'    => 'term_id',
          'terms'    => $search_month,
        ),
      ),
    );
  } else if ($search_suburb != 'all') {
    $args = array(
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
      ),
    );
  }

  if ($search_query && $search_suburb != 'all' && $search_topic != 'all' && $search_month != 'all') {
    $args = array(
      's' => $search_query,
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
        array(
          'taxonomy' => 'event_topic',
          'field'    => 'term_id',
          'terms'    => $search_topic,
        ),
        array(
          'taxonomy' => 'event_month',
          'field'    => 'term_id',
          'terms'    => $search_month,
        ),
      ),
    );
  } else if ($search_query && $search_suburb != 'all' && $search_topic != 'all') {
    $args = array(
      's' => $search_query,
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
        array(
          'taxonomy' => 'event_topic',
          'field'    => 'term_id',
          'terms'    => $search_topic,
        ),
      ),
    );
  } else if ($search_query && $search_suburb != 'all') {
    $args = array(
      's' => $search_query,
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'event_suburb',
          'field'    => 'term_id',
          'terms'    => $search_suburb,
        ),
      ),
    );
  } else if ($search_query) {
    $args = array(
      's' => $search_query,
    );
  }

  $args = wp_parse_args($args, $defaults);

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-y-10">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $id = get_the_ID();
      $set_multidate_event = get_field('set_multidate_event', $id);
      $single_event_date = '';
      $single_start_time = '';
      $single_end_time = '';
      $multi_start_date = '';
      $multi_start_date_start_time = '';
      $multi_start_date_end_time = '';
      $multi_end_date = '';
      $multi_end_date_start_time = '';
      $multi_end_date_end_time = '';

      $location = get_field('location', $id);
      $cpd_hours = get_field('cpd_hours', $id);
      $cost = get_field('cost', $id);
      $registration_link = get_field('registration_link', $id);

      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
      $img_src = get_the_post_thumbnail_url($id, 'large');
      $title =  get_the_title();
      $date =  get_the_date();
      $link = get_the_permalink();

      $event_date = '';
      if ($set_multidate_event) {
        $multidate_event = get_field('multidate_event', $id);
        $multi_start_date = $multidate_event['start_date']['start_date'];
        $multi_start_date_start_time = $multidate_event['start_date']['start_time'];
        $multi_start_date_end_time = $multidate_event['start_date']['end_time'];
        $multi_end_date = $multidate_event['end_date']['end_date'];
        $multi_end_date_start_time = $multidate_event['end_date']['start_time'];
        $multi_end_date_end_time = $multidate_event['end_date']['end_time'];
        if ($multi_start_date) {
          $event_date .= $multi_start_date;
        }
        if ($multi_start_date_start_time) {
          $event_date .= ' (' . $multi_start_date_start_time;
        }
        if ($multi_start_date_end_time) {
          $event_date .= ' - ' . $multi_start_date_end_time . ')';
        } else {
          $event_date .= ')';
        }
        if ($multi_end_date) {
          $event_date .= ' - ' . $multi_end_date;
        }
        if ($multi_end_date_start_time) {
          $event_date .= ' (' . $multi_end_date_start_time;
        }
        if ($multi_end_date_end_time) {
          $event_date .= ' - ' . $multi_end_date_end_time . ')';
        } else {
          $event_date .= ')';
        }
      } else {
        $single_date_event = get_field('single_date_event', $id);
        $single_event_date = $single_date_event['event_date'];
        $single_start_time = $single_date_event['start_time'];
        $single_end_time = $single_date_event['end_time'];
        if ($single_event_date) {
          $event_date .= $single_event_date;
        }
        if ($single_start_time) {
          $event_date .= ' (' . $single_start_time;
        }
        if ($single_end_time) {
          $event_date .= ' - ' . $single_end_time . ')';
        } else {
          $event_date .= ')';
        }
      }
      $response = '';
      $response .= '<div class="border rounded-md p-10 bg-slate-50">
        <div class="flex gap-x-10">
          <div class="w-1/2">
            <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold"><a href="' . $link . '" class="hover:underline">' . $title . '</a></h3>';
      $response .= '<div class="prose prose-lg">';
      $response .= '<div>' . $event_date . '</div>';
      $response .= '<div class="mt-8">';
      if ($location) {
        $response .= '<strong>Location:</strong> ' . $location . '<br />';
      }
      if ($cpd_hours) {
        $response .= '<strong>CPD Hours:</strong> ' . $cpd_hours . '<br />';
      }
      if ($cost) {
        $response .= '<strong>Cost:</strong> ' . $cost;
      }
      $response .= '</div>';
      $response .= '</div>';
      $response .= '<div class="mt-8 inline-flex gap-4">';
      if ($registration_link) {
        $response .= '<a href="' . $registration_link['url'] . '" class="btn btn-primary">Register</a>';
      }
      $response .= '<a href="' . $link . '" class="btn btn-secondary">Find Out More</a>';
      $response .= '</div>';
      $response .= '</div>';
      $response .= '<div class="w-1/2">';
      if ($img_src) {
        $response .= '<div class="aspect-w-6 aspect-h-4"><img src="' . $img_src . '" alt="" class="w-full h-full object-cover rounded-lg"></div>';
      }
      $response .= '</div>';
      $response .= '</div>';
      $response .= '</div>';

    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_events', 'filter_events');
add_action('wp_ajax_nopriv_filter_events', 'filter_events');

function filter_submissions()
{
  $search_query = $_POST['query'];
  $search_filter = $_POST['filter'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  if ($search_query) {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'submission',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        's' => $search_query,
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'submission',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        's' => $search_query,
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'submission_year',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  } else {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'submission',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'submission',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'submission_year',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  }

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-0 shadow-lg border border-gray-200 rounded-lg">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $title =  get_the_title();
      $submission_pdf = get_field('submission_pdf', get_the_ID());
      $external_link_submission = get_field('external_link_submission', get_the_ID());
      $submission_pdf_link = '';
      $year = get_the_terms(get_the_ID(), 'submission_year');
      $month = get_the_terms(get_the_ID(), 'submission_month');
      $month_name = '';
      $year_name = '';
      if ($year) {
        // $month_name = $month[0]->name;
        // $parent_id = $month[0]->parent;
        //$year_name = get_term_by('id', $parent_id, 'submission_year');
        //$year_name = get_term($parent_id)->name;
        $year_name = $year[0]->name;
        if ($month) {
          $month_name = $month[0]->name;
        }
      }
      if ($submission_pdf) {
        $submission_pdf_link = $submission_pdf['url'];
      } else {
        if ($external_link_submission) {
          $submission_pdf_link = $external_link_submission;
        }
      }
      $response .= '<div class="p-4 border-b border-gray-200">';
      $response .= '<div class="">
            <div class="flex flex-col lg:flex-row">
              <div class="w-full mb-2 lg:mb-0 lg:w-3/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
                <div>' . $year_name . '</div>
                <div>' . $month_name . '</div>
              </div>
              <div class="w-full lg:w-9/12 flex">
              <div class="grow pr-4 lg:pr-8"><a href="' . $submission_pdf_link . '" target="_blank" class="hover:underline">' . $title . '</a></div>
              <div class="flex-none"><a href="' . $submission_pdf_link . '" target="_blank" class="inline-block opacity-80 hover:opacity-100">' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '</a></div>
              </div>
            </div>
          </div>';
      $response .= '</div>';

    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_submissions', 'filter_submissions');
add_action('wp_ajax_nopriv_filter_submissions', 'filter_submissions');

/* ###### Ajax function for pagination ###### */
add_action('wp_ajax_pagination_load_submissions', 'pagination_load_submissions');
add_action('wp_ajax_nopriv_pagination_load_submissions', 'pagination_load_submissions');
function pagination_load_submissions()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $categories = sanitize_text_field($_POST['categories']);
    $categories = json_decode(stripslashes($categories));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($categories) {
      $all_submissions = new WP_Query(
        array(
          'post_type'         => 'submission',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start,
          'tax_query' => array(
            array(
              'taxonomy' => 'submission_year',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'submission',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'submission_year',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
    } else {
      $all_submissions = new WP_Query(
        array(
          'post_type'         => 'submission',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'submission',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_submissions->have_posts()) {
      echo '<div class="grid grid-cols-1 gap-0 shadow-lg border border-gray-200 rounded-lg">';
      while ($all_submissions->have_posts()) {
        $all_submissions->the_post(); ?>
        <?php
        $title =  get_the_title();
        $submission_pdf = get_field('submission_pdf', get_the_ID());
        $external_link_submission = get_field('external_link_submission', get_the_ID());
        $submission_pdf_link = '';
        $year = get_the_terms(get_the_ID(), 'submission_year');
        $month = get_the_terms(get_the_ID(), 'submission_month');
        $month_name = '';
        $year_name = '';
        if ($year) {
          // $month_name = $month[0]->name;
          // $parent_id = $month[0]->parent;
          //$year_name = get_term_by('id', $parent_id, 'submission_year');
          //$year_name = get_term($parent_id)->name;
          $year_name = $year[0]->name;
          if ($month) {
            $month_name = $month[0]->name;
          }
        }
        if ($submission_pdf) {
          $submission_pdf_link = $submission_pdf['url'];
        } else {
          if ($external_link_submission) {
            $submission_pdf_link = $external_link_submission;
          }
        }
        ?>
        <div class="p-4 border-b border-gray-200">
          <div class="flex flex-col lg:flex-row">
            <div class="w-full mb-2 lg:mb-0 lg:w-3/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
              <div><?php echo $year_name ?></div>
              <div><?php echo $month_name ?></div>
            </div>
            <div class="w-full lg:w-9/12 flex">
              <div class="grow pr-4 lg:pr-8"><a href="<?php echo $submission_pdf_link ?>" target="_blank" class="hover:underline"><?php echo $title ?></a></div>
              <div class="flex-none"><a href="<?php echo $submission_pdf_link ?>" target="_blank" class="inline-block opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
            </div>
          </div>
        </div>
      <?php
      }
      echo '</div>';
    }
    // Paginations
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons logic
    if ($no_of_paginations > 1) : ?>
      <div class='submissions-pagination ajax-pagination mt-12'>
        <ul>
          <?php
          if ($first_btn && $cur_page > 1) { ?>
            <li data-page='1' class='active'>
              &lt;&lt;</li>
          <?php
          } else if ($first_btn) { ?>
            <li data-page='1' class='inactive'>
              &lt;&lt;</li>
          <?php
          }
          if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1; ?>
            <li data-page='<?php echo $pre; ?>' class='active'>
              &lt;</li>
          <?php
          } else if ($previous_btn) { ?>
            <li class='inactive p-2'>
              &lt;</li>
            <?php
          }
          for ($i = $start_loop; $i <= $end_loop; $i++) {
            if ($cur_page == $i) { ?>
              <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
            <?php
            } else { ?>
              <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
            <?php
            }
          }
          if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1; ?>
            <li data-page='<?php echo $nex; ?>' class='active'>&gt;</li>
          <?php
          } else if ($next_btn) { ?>
            <li class='inactive'>&gt;</li>
          <?php
          }

          if ($last_btn && $cur_page < $no_of_paginations) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&gt;&gt;</li>
          <?php
          } else if ($last_btn) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&gt;&gt;</li>
          <?php
          } ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php
  }
  exit();
}

function filter_policy()
{
  $search_query = $_POST['query'];
  $search_filter = $_POST['filter'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  if ($search_query) {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'policy',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'title',
        'order' => 'ASC',
        's' => $search_query,
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'policy',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'title',
        'order' => 'ASC',
        's' => $search_query,
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'policy_category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  } else {
    if ($search_filter == 'all') {
      $args = array(
        'post_type' => 'policy',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_status' => 'publish',
      );
    } else {
      $args = array(
        'post_type' => 'policy',
        'posts_per_page' => $postsPerPage,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'policy_category',
            'field'    => 'term_id',
            'terms'    => $search_filter,
          ),
        ),
      );
    }
  }

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-0 shadow-lg border border-gray-200 rounded-lg">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $title =  get_the_title();
      $policy_pdf = get_field('policy_pdf', get_the_ID());
      $external_link_policy = get_field('external_link_policy', get_the_ID());
      $policy_pdf_link = '';
      $policy_category = get_the_terms(get_the_ID(), 'policy_category');
      $policy_category_name = $policy_category[0]->name;
      if ($policy_pdf) {
        $policy_pdf_link = $policy_pdf['url'];
      } else {
        if ($external_link_policy) {
          $policy_pdf_link = $external_link_policy;
        }
      }
      $response .= '<div class="p-4 border-b border-gray-200">';
      $response .= '<div class="">
            <div class="flex flex-col lg:flex-row">
              <div class="w-full mb-2 lg:mb-0 lg:w-3/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
                <div>' . $policy_category_name . '</div>
              </div>
              <div class="w-full lg:w-9/12 flex">
              <div class="grow pr-4 lg:pr-8"><a href="' . $policy_pdf_link . '" target="_blank" class="hover:underline">' . $title . '</a></div>
              <div class="flex-none"><a href="' . $policy_pdf_link . '" target="_blank" class="inline-block opacity-80 hover:opacity-100">' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '</a></div>
              </div>
            </div>
          </div>';
      $response .= '</div>';

    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_policy', 'filter_policy');
add_action('wp_ajax_nopriv_filter_policy', 'filter_policy');

/* ###### Ajax function for pagination ###### */
add_action('wp_ajax_pagination_load_policy', 'pagination_load_policy');
add_action('wp_ajax_nopriv_pagination_load_policy', 'pagination_load_policy');
function pagination_load_policy()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $categories = sanitize_text_field($_POST['categories']);
    $categories = json_decode(stripslashes($categories));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($categories) {
      $all_policy = new WP_Query(
        array(
          'post_type'         => 'policy',
          'post_status '      => 'publish',
          'orderby'           => 'title',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start,
          'tax_query' => array(
            array(
              'taxonomy' => 'policy_category',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'policy',
          'post_status '      => 'publish',
          'orderby'           => 'title',
          'order'             => 'ASC',
          'posts_per_page'    => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'policy_category',
              'field' => 'term_id',
              'terms' => $categories
            )
          )
        )
      );
    } else {
      $all_policy = new WP_Query(
        array(
          'post_type'         => 'policy',
          'post_status '      => 'publish',
          'orderby'           => 'title',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'policy',
          'post_status '      => 'publish',
          'orderby'           => 'title',
          'order'             => 'ASC',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_policy->have_posts()) {
      echo '<div class="grid grid-cols-1 gap-0 shadow-lg border border-gray-200 rounded-lg">';
      while ($all_policy->have_posts()) {
        $all_policy->the_post(); ?>
        <?php
        $title =  get_the_title();
        $policy_pdf = get_field('policy_pdf', get_the_ID());
        $external_link_policy = get_field('external_link_policy', get_the_ID());
        $policy_pdf_link = '';
        $policy_category = get_the_terms(get_the_ID(), 'policy_category');
        $policy_category_name = $policy_category[0]->name;
        if ($policy_pdf) {
          $policy_pdf_link = $policy_pdf['url'];
        } else {
          if ($external_link_policy) {
            $policy_pdf_link = $external_link_policy;
          }
        }
        ?>
        <div class="p-4 border-b border-gray-200">
          <div class="flex flex-col lg:flex-row">
            <div class="w-full mb-2 lg:mb-0 lg:w-3/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
              <div><?php echo $policy_category_name ?></div>
            </div>
            <div class="w-full lg:w-9/12 flex">
              <div class="grow pr-4 lg:pr-8"><a href="<?php echo $policy_pdf_link ?>" target="_blank" class="hover:underline"><?php echo $title ?></a></div>
              <div class="flex-none"><a href="<?php echo $policy_pdf_link ?>" target="_blank" class="inline-block opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
            </div>
          </div>
        </div>
      <?php
      }
      echo '</div>';
    }
    // Paginations
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons logic
    if ($no_of_paginations > 1) : ?>
      <div class='policy-pagination ajax-pagination mt-12'>
        <ul>
          <?php
          if ($first_btn && $cur_page > 1) { ?>
            <li data-page='1' class='active'>
              &lt;&lt;</li>
          <?php
          } else if ($first_btn) { ?>
            <li data-page='1' class='inactive'>
              &lt;&lt;</li>
          <?php
          }
          if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1; ?>
            <li data-page='<?php echo $pre; ?>' class='active'>
              &lt;</li>
          <?php
          } else if ($previous_btn) { ?>
            <li class='inactive p-2'>
              &lt;</li>
            <?php
          }
          for ($i = $start_loop; $i <= $end_loop; $i++) {
            if ($cur_page == $i) { ?>
              <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
            <?php
            } else { ?>
              <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
            <?php
            }
          }
          if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1; ?>
            <li data-page='<?php echo $nex; ?>' class='active'>&gt;</li>
          <?php
          } else if ($next_btn) { ?>
            <li class='inactive'>&gt;</li>
          <?php
          }

          if ($last_btn && $cur_page < $no_of_paginations) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&gt;&gt;</li>
          <?php
          } else if ($last_btn) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&gt;&gt;</li>
          <?php
          } ?>
        </ul>
      </div>
    <?php endif; ?>

<?php
  }
  exit();
}
