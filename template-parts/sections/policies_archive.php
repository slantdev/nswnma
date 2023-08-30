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
$policy_category = $posts['policy_category'];
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
          <h2 class="h3 text-brand-bluedark font-medium mt-2 mb-4 md:my-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <div class="prose lg:prose-lg">
            <p><?php echo $description ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($show_search_bar) : ?>
      <div class="container mt-4 md:mt-8 lg:mt-12">
        <div class="flex flex-col gap-y-4">
          <div class="flex flex-col md:flex-row gap-4 w-full items-center">
            <div class="w-full md:w-1/2">
              <input id="policy-search" name="policy-search" type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
            <div class="hidden md:block w-[24px] text-center flex-none">In</div>
            <div class="w-full md:w-1/2">
              <select id="policy-filter" name="policy-filter" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="all" selected>Filter</option>
                <?php
                if ($policy_category) {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'policy_category',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'parent' => 0,
                    'orderby' => 'term_order',
                    'include' => $policy_category,
                  ));
                } else {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'policy_category',
                    //'hide_empty' => true,
                    'hide_empty' => false,
                    'parent' => 0,
                    'orderby' => 'term_order'
                  ));
                }

                if (!empty($taxonomies)) :
                  $output = '';
                  foreach ($taxonomies as $category) {
                    $output .= '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                  }
                  echo $output;
                endif;
                ?>
              </select>
            </div>
            <div class="w-full md:w-auto md:ml-2">
              <button id="policy-search-button" type="button" class="btn btn-red !text-base !pr-10 !pl-4 !py-[14px] !inline-flex !flex-nowrap">
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

    <div class="container mt-8 lg:mt-12">
      <div class="policy-container relative scroll-mt-4 md:scroll-mt-8 lg:scroll-mt-12">
        <div class="policy-grid"></div>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

        function load_all_policy(page) {
          $('.policy-container .blocker').show();
          var policy_category = <?php echo json_encode($policy_category) ?>;
          var policy_category_string = JSON.stringify(policy_category);
          var data = {
            page: page,
            per_page: <?php echo $posts_per_page ?>,
            categories: policy_category_string,
            action: 'pagination_load_policy',
          };
          //console.log(data);
          $.post(ajaxurl, data, function(response) {
            //console.log(response);
            $('.policy-grid').html('').prepend(response);
            $('.policy-container .blocker').hide();
          });
        }
        load_all_policy(1);
        $(document).on(
          'click',
          '.policy-pagination li.active',
          function() {
            $(".policy-container").get(0).scrollIntoView({
              behavior: 'smooth'
            });
            var page = $(this).data('page');
            load_all_policy(page);
          }
        );
      });
    </script>

  </div>
</section>