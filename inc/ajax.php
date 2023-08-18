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

    $response .= '<div class="grid grid-cols-3 gap-8">';

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


/* ########################################## */
/* ########################################## */
/* ###### Ajax function for pagination ###### */
/* ########################################## */
/* ########################################## */
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
      echo '<div class="grid grid-cols-3 gap-8">';
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

    $response .= '<div class="grid grid-cols-3 gap-6">';

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
      echo '<div class="grid grid-cols-3 gap-6">';
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
    <div class='reports-pagination mt-12'>
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

    $response .= '<div class="grid grid-cols-1 gap-0">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

      $title =  get_the_title();
      $submission_pdf = get_field('submission_pdf', get_the_ID());
      $external_link_submission = get_field('external_link_submission', get_the_ID());
      $submission_pdf_link = '';
      $month = get_the_terms(get_the_ID(), 'submission_year');
      $month_name = '';
      $year_name = '';
      if ($month) {
        $month_name = $month[0]->name;
        $parent_id = $month[0]->parent;
        //$year_name = get_term_by('id', $parent_id, 'submission_year');
        $year_name = get_term($parent_id)->name;
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
            <div class="flex">
              <div class="w-2/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
                <div>' . $year_name . '</div>
                <div>' . $month_name . '</div>
              </div>
              <div class="w-9/12"><a href="' . $submission_pdf_link . '" target="_blank" class="hover:underline">' . $title . '</a></div>
              <div class="w-1/12 text-right"><a href="' . $submission_pdf_link . '" target="_blank" class="inline-block opacity-80 hover:opacity-100">' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '</a></div>
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
      $all_reports = new WP_Query(
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
      $all_reports = new WP_Query(
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
    if ($all_reports->have_posts()) {
      echo '<div class="grid grid-cols-1 gap-0 shadow-lg border border-gray-200 rounded-lg">';
      while ($all_reports->have_posts()) {
        $all_reports->the_post(); ?>
        <?php
        $title =  get_the_title();
        $submission_pdf = get_field('submission_pdf', get_the_ID());
        $external_link_submission = get_field('external_link_submission', get_the_ID());
        $submission_pdf_link = '';
        $month = get_the_terms(get_the_ID(), 'submission_year');
        $month_name = '';
        $year_name = '';
        if ($month) {
          $month_name = $month[0]->name;
          $parent_id = $month[0]->parent;
          //$year_name = get_term_by('id', $parent_id, 'submission_year');
          $year_name = get_term($parent_id)->name;
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
          <div class="">
            <div class="flex">
              <div class="w-2/12 flex gap-x-2 text-gray-400 uppercase font-semibold">
                <div><?php echo $year_name ?></div>
                <div><?php echo $month_name ?></div>
              </div>
              <div class="w-9/12"><a href="<?php echo $submission_pdf_link ?>" target="_blank" class="hover:underline"><?php echo $title ?></a></div>
              <?php if ($submission_pdf_link) : ?>
                <div class="w-1/12 text-right"><a href="<?php echo $submission_pdf_link ?>" target="_blank" class="inline-block opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
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
      <div class='reports-pagination mt-12'>
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
