<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_intro = get_sub_field('section_intro');
$headline = $section_intro['headline'];
$description = $section_intro['description'];
$posts = get_sub_field('posts');
$event_taxonomy = $posts['event_taxonomy'];
$posts_per_page = $posts['posts_per_page'];
if (!$posts_per_page) {
  $posts_per_page = 3;
}
if (is_admin()) {
  $posts_per_page = 3;
}
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($headline || $description) : ?>
      <div class="container">
        <div class="text-center">
          <?php if ($headline) : ?>
            <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose mx-auto">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="container mt-6 xl:mt-12">
      <div class="events-container relative scroll-mt-6 xl:scroll-mt-12">
        <div class="events-grid"></div>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

  </div>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

      function load_all_events(page) {
        $('.events-container .blocker').show();
        var categories = <?php echo json_encode($event_taxonomy) ?>;
        var categoriesString = JSON.stringify(categories);
        var data = {
          page: page,
          per_page: <?php echo $posts_per_page ?>,
          categories: categoriesString,
          action: 'pagination_load_events',
        };
        //console.log(data);
        $.post(ajaxurl, data, function(response) {
          //console.log(response);
          $('.events-grid').html('').prepend(response);
          $('.events-container .blocker').hide();
        });
      }
      load_all_events(1);
      $(document).on(
        'click',
        '.events-pagination li.active',
        function() {
          $(".events-container").get(0).scrollIntoView({
            behavior: 'smooth'
          });
          var page = $(this).data('page');
          load_all_events(page);
        }
      );
      $(document).on(
        'click',
        '#events-search-reset',
        function() {
          $("#events-search").val("");
          $("#events-suburb").val("all");
          $("#events-topic").val("all");
          $("#events-month").val("all");
          $(".events-container").get(0).scrollIntoView({
            behavior: 'smooth'
          });
          load_all_events(1);
        }
      );
    });
  </script>

</section>