<?php

function my_searchwp_posts_per_page($posts_per_page, $engine, $terms, $page)
{
  if ($engine != 'default') {
    // if this is a supplemental search engine, show 20 results per page
    return 20;
  } else {
    // it's the default search engine, return whatever it was originally
    return $posts_per_page;
    //return 1;
  }
}

add_filter('searchwp_posts_per_page', 'my_searchwp_posts_per_page', 30, 4);
