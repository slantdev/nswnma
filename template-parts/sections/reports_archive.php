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
$report_category = $posts['report_category'];
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
              <input type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
            <div class="w-[24px] text-center flex-none">In</div>
            <div class="w-1/2">
              <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
                <option value="">Filter</option>
              </select>
            </div>
            <div class="ml-2">
              <button class="btn btn-red !text-base !px-10 !py-4">SEARCH</button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="container mt-12">
      <?php
      if ($report_category) {
        $args = array(
          'post_type' => 'report',
          'posts_per_page' => $posts_per_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'term_id',
              'terms' => $report_category
            )
          )
        );
      } else {
        $args = array(
          'post_type' => 'report',
          'posts_per_page' => $posts_per_page,
        );
      }
      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()) : ?>
        <div class="grid grid-cols-3 gap-6">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $title =  get_the_title();
            $report_pdf = get_field('report_pdf', get_the_ID());
            ?>
            <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
              <div class="aspect-w-4 aspect-h-5">
                <img src="<?php echo $img_src ?>" alt="" class="w-full h-full object-cover rounded-lg">
              </div>
              <div class="pt-8">
                <div class="flex justify-between">
                  <div class="text-white text-xl"><?php echo $title ?></div>
                  <?php if ($report_pdf) : ?>
                    <div><a href="<?php echo $report_pdf ?>" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>