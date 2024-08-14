<?php
/*
 * Add Site Options
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'menu_slug' => 'site_settings',
    'page_title' => 'Site Settings',
    'active' => true,
    'menu_title' => 'Site Settings',
    'capability' => 'edit_posts',
    'parent_slug' => '',
    'position' => '',
    'icon_url' => '',
    'redirect' => true,
    'post_id' => 'options',
    'autoload' => false,
    'update_button' => 'Update',
    'updated_message' => 'Options Updated',
  ));

  acf_add_options_page(array(
    'menu_slug' => 'bottom_banner',
    'page_title' => 'Bottom Banner',
    'active' => true,
    'menu_title' => 'Bottom Banner',
    'capability' => 'edit_posts',
    'parent_slug' => '',
    'position' => '',
    'icon_url' => '',
    'redirect' => true,
    'post_id' => 'options',
    'autoload' => false,
    'update_button' => 'Update',
    'updated_message' => 'Options Updated',
  ));
}

/*
 * Add color picker pallete on admin
 */
function nswnma_acf_input_admin_footer()
{
?>
  <script type="text/javascript">
    (function($) {

      acf.add_filter('color_picker_args', function(args, $field) {

        args.palettes = ['#000000', '#FFFFFF', '#F3F1EF', '#F4F8FF', '#D7DBE2', '#58595B', '#0F2E53', '#2255A2', '#EA3325', '#BF2031', '#00BAFF', '#6dbdc9', '#9a3fa2', '#d56ba4', '#6fd4bd']

        return args;

      });

    })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_footer', 'nswnma_acf_input_admin_footer');


/*
 * ACF Icon Picker
 * Modify the path to the icons directory
 * https://github.com/houke/acf-icon-picker
 */
add_filter('acf_icon_path_suffix', 'acf_icon_path_suffix');
function acf_icon_path_suffix($path_suffix)
{
  return 'assets/icons/content/';
}

/*
 * ACF Extended Layout Thumbnails
 * https://www.acf-extended.com/features/fields/flexible-content/advanced-settings
 * @int/string  $thumbnail  Thumbnail ID/URL
 * @array       $field      Field settings
 * @array       $layout     Layout settings
 */
add_filter('acfe/flexible/thumbnail/layout=accordion', 'accordion_layout_thumbnail', 10, 3);
function accordion_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/accordion.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=contact_form', 'contact_form_layout_thumbnail', 10, 3);
function contact_form_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/contact_form.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=content_slider', 'content_slider_layout_thumbnail', 10, 3);
function content_slider_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/content_slider.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=download_guides', 'download_guides_layout_thumbnail', 10, 3);
function download_guides_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/download_guides.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=event_search', 'event_search_layout_thumbnail', 10, 3);
function event_search_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/event_search.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=events_card', 'events_card_layout_thumbnail', 10, 3);
function events_card_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/events_card.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=full_width_banner', 'full_width_banner_layout_thumbnail', 10, 3);
function full_width_banner_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/full_width_banner.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=half_text_image', 'half_text_image_layout_thumbnail', 10, 3);
function half_text_image_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/half_text_image.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=hero_slider', 'hero_slider_layout_thumbnail', 10, 3);
function hero_slider_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/hero_slider.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=info_box_filter', 'info_box_filter_layout_thumbnail', 10, 3);
function info_box_filter_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/info_box_filter.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=latest_news_archive', 'latest_news_archive_layout_thumbnail', 10, 3);
function latest_news_archive_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/latest_news_archive.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=latest_news', 'latest_news_card_layout_thumbnail', 10, 3);
function latest_news_card_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/latest_news_card.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=latest_news_featured', 'latest_news_featured_layout_thumbnail', 10, 3);
function latest_news_featured_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/latest_news_featured.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=reports_archive', 'reports_archive_layout_thumbnail', 10, 3);
function reports_archive_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/reports_archive.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=scholarship_archive', 'scholarship_archive_layout_thumbnail', 10, 3);
function scholarship_archive_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/scholarship_archive.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=select_shortcut', 'select_shortcut_layout_thumbnail', 10, 3);
function select_shortcut_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/select_shortcut.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=team_grid', 'team_grid_layout_thumbnail', 10, 3);
function team_grid_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/team_grid.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=text_content', 'text_content_layout_thumbnail', 10, 3);
function text_content_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/text_content.jpg';
}

add_filter('acfe/flexible/thumbnail/layout=text_left_image_right', 'text_left_image_right_layout_thumbnail', 10, 3);
function text_left_image_right_layout_thumbnail($thumbnail, $field, $layout)
{
  return get_stylesheet_directory_uri() . '/assets/images/layouts/text_left_image_right.jpg';
}


/*
 * ACF CPT - Events
 * Clear Single Date Event value if Set Multidate Event is true
 * https://stackoverflow.com/questions/65037123/acf-problem-with-conditional-fields-values
 */
add_action('acf/save_post', 'conditionally_clear_event_date', 11);
function conditionally_clear_event_date($post_id)
{

  $set_multidate_event = get_field('set_multidate_event', $post_id);

  if (true == $set_multidate_event) {
    update_field('single_date_event_event_date', '', $post_id);
    update_field('single_date_event_start_time', '', $post_id);
    update_field('single_date_event_end_time', '', $post_id);
  } else {
    update_field('multidate_event_start_date_start_date', '', $post_id);
    update_field('multidate_event_start_date_start_time', '', $post_id);
    update_field('multidate_event_start_date_end_time', '', $post_id);
    update_field('multidate_event_end_date_start_date', '', $post_id);
    update_field('multidate_event_end_date_start_time', '', $post_id);
    update_field('multidate_event_end_date_end_time', '', $post_id);
  }
};
