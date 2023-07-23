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
