<?php

/**
 * Enqueue theme assets.
 */
function nswnma_enqueue_scripts()
{
  $theme = wp_get_theme();

  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.7');
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.7');

  wp_enqueue_style('nswnma', nswnma_asset('css/app.css'), array(), $theme->get('Version'));
  wp_enqueue_script('nswnma', nswnma_asset('js/app.js'), array('jquery'), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'nswnma_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function nswnma_asset($path)
{
  if (wp_get_environment_type() === 'production') {
    return get_stylesheet_directory_uri() . '/assets/' . $path;
  }

  return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/assets/' . $path);
}

function nswnma_admin_styles()
{
  global $pagenow;
  $current_page = get_current_screen();
  $theme = wp_get_theme();
  wp_enqueue_style('admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, filemtime(get_stylesheet_directory() . '/assets/css/admin-style.css'));
  wp_enqueue_style('poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&display=swap', false, $theme->get('Version'));

  if (($current_page->post_type === 'page' && ($pagenow === 'post-new.php' || $pagenow === 'post.php'))) {
    wp_enqueue_style('acf_layouts', get_template_directory_uri() . '/assets/css/acf-layouts.css', false, filemtime(get_stylesheet_directory() . '/assets/css/acf-layouts.css'));
  }
}
add_action('admin_enqueue_scripts', 'nswnma_admin_styles');
