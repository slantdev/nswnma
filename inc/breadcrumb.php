<?php

add_filter('wpseo_breadcrumb_links', 'nswnma_yoast_seo_breadcrumb_append_link');
function nswnma_yoast_seo_breadcrumb_append_link($links)
{
  global $post;

  if (is_singular('post')) {
    $categories = get_the_category();
    //preint_r($categories);
    if ($categories) {
      $breadcrumb[] = array(
        'url' => '',
        'text' => $categories[0]->name,
      );
    } else {
      $breadcrumb[] = array(
        'url' => '',
        'text' => 'Latest News',
      );
    }
    array_splice($links, 1, -2, $breadcrumb);
  }

  return $links;
}
