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
$show_search_bar = $posts['show_search_bar'];
$submission_year = $posts['submission_year'];
$posts_per_page = $posts['posts_per_page'];
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
          <div class="flex gap-x-4 w-full items-center">
            <div class="w-1/2">
              <input id="submission-search" name="submission-search" type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
            <div class="w-[24px] text-center flex-none">In</div>
            <div class="w-1/2">
              <select id="submission-filter" name="submission-filter" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="all" selected>Filter</option>
                <?php
                if ($submission_year) {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'submission_year',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'parent' => 0,
                    'orderby' => 'term_order',
                    'include' => $submission_year,
                  ));
                } else {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'submission_year',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'parent' => 0,
                    'orderby' => 'term_order'
                  ));
                }

                if (!empty($taxonomies)) :
                  foreach ($taxonomies as $category) {
                    $output .= '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                  }
                  echo $output;
                endif;
                ?>
              </select>
            </div>
            <div class="ml-2">
              <button id="submission-search-button" type="button" class="btn btn-red !text-base !pr-10 !pl-4 !py-[14px] !inline-flex !flex-nowrap">
                <svg class="spinner-border animate-spin ml-0 mr-2 h-5 w-5 text-white opacity-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-20" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="inline-block ml-1">FILTER</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="container mt-12">
      <div class="submissions-container relative scroll-mt-12">
        <div class="submissions-grid"></div>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

        function load_all_submissions(page) {
          $('.submissions-container .blocker').show();
          var submission_year = <?php echo json_encode($submission_year) ?>;
          var submission_year_string = JSON.stringify(submission_year);
          var data = {
            page: page,
            per_page: <?php echo $posts_per_page ?>,
            categories: submission_year_string,
            action: 'pagination_load_submissions',
          };
          //console.log(data);
          $.post(ajaxurl, data, function(response) {
            //console.log(response);
            $('.submissions-grid').html('').prepend(response);
            $('.submissions-container .blocker').hide();
          });
        }
        load_all_submissions(1);
        $(document).on(
          'click',
          '.submissions-pagination li.active',
          function() {
            $(".submissions-container").get(0).scrollIntoView({
              behavior: 'smooth'
            });
            var page = $(this).data('page');
            load_all_submissions(page);
          }
        );
      });
    </script>

  </div>
</section>