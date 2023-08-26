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
$posts_per_page = $posts['posts_per_page'];
$include_exclude_categories = $posts['include_exclude_categories'];
$categories = $include_exclude_categories['categories'];
$condition = $include_exclude_categories['condition'];
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
          <div class="prose lg:prose-lg">
            <p><?php echo $description ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($show_search_bar) : ?>
      <div class="container mt-12">
        <div class="flex flex-col gap-y-4">
          <div class="flex flex-col md:flex-row gap-y-4 gap-x-4 w-full items-center">
            <div class="w-full md:w-1/2">
              <input id="posts-search" name="posts-search" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner" type="text" placeholder="Search query">
            </div>
            <div class="hidden md:block md:w-[24px] text-center flex-none">In</div>
            <div class="w-full md:w-1/2">
              <select id="posts-filter" name="posts-filter" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="all" selected>Filter</option>
                <?php
                if ($categories) {
                  if ($condition == 'include') {
                    $taxonomies = get_terms(array(
                      'taxonomy' => 'category',
                      //'hide_empty' => true,
                      'hide_empty' => false,
                      'orderby' => 'term_order',
                      'include' => $categories,
                    ));
                  } else {
                    $taxonomies = get_terms(array(
                      'taxonomy' => 'category',
                      //'hide_empty' => true,
                      'hide_empty' => false,
                      'orderby' => 'term_order',
                      'exclude' => $categories,
                    ));
                  }
                } else {
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'category',
                    //'hide_empty' => true,
                    'hide_empty' => false,
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
            <div class="md:ml-2">
              <button id="posts-search-button" type="button" class="btn btn-red !text-base !pr-10 !pl-4 !py-[14px] !inline-flex !flex-nowrap">
                <svg class="spinner-border animate-spin ml-0 mr-2 h-5 w-5 text-white opacity-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-20" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="inline-block ml-1">Search</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="container mt-12">
      <div class="posts-container relative scroll-mt-12">
        <div class="posts-grid"></div>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

        function load_all_posts(page) {
          $('.posts-container .blocker').show();
          var categories = <?php echo json_encode($categories) ?>;
          var categoriesString = JSON.stringify(categories);
          var include = '<?php echo $condition ?>';
          var data = {
            page: page,
            per_page: <?php echo $posts_per_page ?>,
            condition: '<?php echo $condition ?>',
            categories: categoriesString,
            action: 'pagination_load_posts',
          };
          //console.log(data);
          $.post(ajaxurl, data, function(response) {
            //console.log(response);
            $('.posts-grid').html('').prepend(response);
            $('.posts-container .blocker').hide();
          });
        }
        load_all_posts(1);
        $(document).on(
          'click',
          '.posts-pagination li.active',
          function() {
            $(".posts-container").get(0).scrollIntoView({
              behavior: 'smooth'
            });
            var page = $(this).data('page');
            load_all_posts(page);
          }
        );
      });
    </script>

  </div>
</section>