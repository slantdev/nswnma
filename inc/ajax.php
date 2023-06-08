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
