<?php

add_filter('wpseo_breadcrumb_links', 'nswnma_yoast_seo_breadcrumb_append_link');
function nswnma_yoast_seo_breadcrumb_append_link($links)
{
  global $post;

  if (is_singular('post')) {
    $breadcrumb[] = array(
      'url' => '',
      'text' => 'Latest News',
    );
    array_splice($links, 1, -2, $breadcrumb);
  } elseif (is_tax('industry')) {
    $breadcrumb[] = array(
      'url' => site_url('/industry/'),
      'text' => 'Industry',
    );
    array_splice($links, 1, -2, $breadcrumb);
  }

  return $links;
}
