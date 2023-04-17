<?php


/*
 * Add color picker pallete on admin
 */
function nswnma_acf_input_admin_footer()
{
?>
  <script type="text/javascript">
    (function($) {

      acf.add_filter('color_picker_args', function(args, $field) {

        args.palettes = ['#000000', '#FFFFFF', '#F3F1EF', '#F4F8FF', '#D7DBE2', '#58595B', '#0F2E53', '#2255A2', '#EA3325', '#BF2031', '#00BAFF']

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
