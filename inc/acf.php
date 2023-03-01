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
