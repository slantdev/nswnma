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
$headline = $section_intro['headline'] ?? '';
$description = $section_intro['description'] ?? '';
$posts = get_sub_field('posts');
$show_search_bar = $posts['show_search_bar'] ?? '';
$report_category = $posts['report_category'] ?? '';
$posts_per_page = $posts['posts_per_page'] ?? '';
if (is_admin()) {
  $posts_per_page = 3;
}
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="max-w-prose">
        <?php if ($headline) : ?>
          <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <div class="prose prose-lg">
            <p><?php echo $description ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($show_search_bar) : ?>
      <div class="container mt-12">
        <div class="flex flex-col gap-y-4">
          <div class="flex flex-col gap-y-4 md:flex-row gap-x-4 w-full items-center">
            <div class="w-full md:w-1/2">
              <input id="report-search" name="report-search" type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
            <div class="hidden md:block w-[24px] text-center flex-none">In</div>
            <div class="w-full md:w-1/2">
              <select id="report-filter" name="report-filter" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="all" selected>Filter</option>
                <?php
                if ($report_category) {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'report_category',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'orderby' => 'term_order',
                    'include' => $report_category,
                  ));
                } else {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'report_category',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'orderby' => 'term_order'
                  ));
                }

                if (!empty($taxonomies)) :
                  foreach ($taxonomies as $category) {
                    $output = '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                  }
                  echo $output;
                endif;
                ?>
              </select>
            </div>
            <div class="w-full md:w-auto md:ml-2">
              <button id="report-search-button" type="button" class="btn btn-red !text-base !pr-10 !pl-4 !py-[14px] !inline-flex !flex-nowrap">
                <svg class="spinner-border animate-spin ml-0 mr-2 h-5 w-5 text-white opacity-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-20" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="inline-block ml-1">SEARCH</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="container mt-8 md:mt-12">
      <div class="report-container relative scroll-mt-12">
        <div class="report-grid"></div>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

        function load_all_reports(page) {
          $('.report-container .blocker').show();
          var report_category = <?php echo json_encode($report_category) ?>;
          var report_category_string = JSON.stringify(report_category);
          var data = {
            page: page,
            per_page: <?php echo $posts_per_page ?>,
            categories: report_category_string,
            action: 'pagination_load_reports',
          };
          //console.log(data);
          $.post(ajaxurl, data, function(response) {
            //console.log(response);
            $('.report-grid').html('').prepend(response);
            $('.report-container .blocker').hide();
          });
        }
        load_all_reports(1);
        $(document).on(
          'click',
          '.reports-pagination li.active',
          function() {
            $(".report-container").get(0).scrollIntoView({
              behavior: 'smooth'
            });
            var page = $(this).data('page');
            load_all_reports(page);
          }
        );
      });
    </script>

  </div>
</section>