<?php

/**
 * Theme setup.
 */
function nswnma_setup()
{
  add_theme_support('title-tag');

  register_nav_menus(
    array(
      'primary' => __('Primary Menu', 'nswnma'),
      'footer' => __('Footer Menu', 'nswnma'),
    )
  );

  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );

  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');

  add_theme_support('align-wide');
  add_theme_support('wp-block-styles');

  add_theme_support('editor-styles');
  add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'nswnma_setup');

/**
 * Custom Post Types.
 */
// Add Admin Filter on CPT Edit Screen
add_action('restrict_manage_posts', 'cpt_admin_filters', 10, 1);
function cpt_admin_filters($post_type)
{
  if ('event' == $post_type) {
    $taxonomies_slugs = array(
      'event_suburb',
      'event_topic',
      'event_month'
    );
  } elseif ('policy' == $post_type) {
    $taxonomies_slugs = array(
      'policy_category'
    );
  } elseif ('report' == $post_type) {
    $taxonomies_slugs = array(
      'report_category'
    );
  } elseif ('scholarship' == $post_type) {
    $taxonomies_slugs = array(
      'scholarship_category'
    );
  } elseif ('submission' == $post_type) {
    $taxonomies_slugs = array(
      'submission_month',
      'submission_year'
    );
  } elseif ('team' == $post_type) {
    $taxonomies_slugs = array(
      'team_category'
    );
  } else {
    return;
  }

  // loop through the taxonomy filters array
  foreach ($taxonomies_slugs as $slug) {
    $taxonomy = get_taxonomy($slug);
    $selected = '';
    // if the current page is already filtered, get the selected term slug
    $selected = isset($_REQUEST[$slug]) ? $_REQUEST[$slug] : '';
    // render a dropdown for this taxonomy's terms
    wp_dropdown_categories(array(
      'show_option_all' =>  $taxonomy->labels->all_items,
      'taxonomy'        =>  $slug,
      'name'            =>  $slug,
      'orderby'         =>  'name',
      'value_field'     =>  'slug',
      'selected'        =>  $selected,
      'hierarchical'    =>  true,
    ));
  }
}

/*
 * Add columns to event post list
 * Require ACF
 */
function add_event_acf_columns($columns)
{
  return array_merge($columns, array(
    'date_time' => __('Date & Time'),
    'location'   => __('Location')
  ));
}
add_filter('manage_event_posts_columns', 'add_event_acf_columns');

/*
 * Add columns to event post list
 */
function event_custom_column($column, $post_id)
{
  $id = $post_id;
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

  switch ($column) {
    case 'date_time':
      echo $event_date;
      break;
    case 'location':
      echo $location;
      break;
  }
}
add_action('manage_event_posts_custom_column', 'event_custom_column', 10, 2);
