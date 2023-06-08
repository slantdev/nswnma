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
$exclude_terms = $posts['exclude_terms'];
$posts_per_page = $posts['posts_per_page'];
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
              <input id="posts-search" name="posts-search" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner" type="text" placeholder="Search query">
            </div>
            <div class="w-[24px] text-center flex-none">In</div>
            <div class="w-1/2">
              <select id="posts-filter" name="posts-filter" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="all" selected>Filter</option>
                <?php
                $taxonomies = get_terms(array(
                  'taxonomy' => 'category',
                  'hide_empty' => true,
                  'orderby' => 'term_order'
                ));
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
      <div class="posts-grid relative">
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $posts_per_page,
          'tax_query' => array(
            'taxonomy' => 'categories',
            'field'    => 'term_id',
            'terms'    => $exclude_terms,
            'operator' => 'NOT IN',
          ),
          // 'paged' => $paged,
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <div class="grid grid-cols-3 gap-8">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php
              $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
              $title =  get_the_title();
              $date =  get_the_date();
              $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
              $link = get_the_permalink();
              ?>
              <div class="border rounded-2xl overflow-hidden shadow-[0_0px_24px_rgba(0,0,0,0.12)] flex flex-col">
                <div class="aspect-w-6 aspect-h-4">
                  <a href="<?php echo $link ?>" class=""><img src="<?php echo $img_src ?>" alt="" class="object-cover h-full w-full"></a>
                </div>
                <div class="p-8 flex flex-col grow">
                  <div class="mb-6 text-gray-500"><?php echo $date ?></div>
                  <h3 class="h4 font-semibold mb-6"><a href="<?php echo $link ?>" class="text-brand-blue hover:underline"><?php echo $title ?></a></h3>
                  <div class="prose mb-8">
                    <p><?php echo $excerpt ?></p>
                  </div>
                  <div class="mt-auto">
                    <a href="<?php echo $link ?>" class="font-medium text-brand-red hover:text-brand-redchili hover:underline">LEARN MORE &raquo;</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
        <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
      </div>
    </div>

  </div>
</section>