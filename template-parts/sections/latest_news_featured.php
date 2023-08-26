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
$post_taxonomy = $posts['post_taxonomy'];
$posts_per_page = $posts['posts_per_page'];
if (is_admin()) {
  $posts_per_page = 1;
}
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="max-w-prose">
        <?php if ($headline) : ?>
          <h2 class="h3 text-brand-bluedark font-medium my-4 md:mb-8 md:mt-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <div class="prose md:prose-lg">
            <p><?php echo $description ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($post_taxonomy) : ?>
      <div class="container mt-12">
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $posts_per_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'term_id',
              'terms' => $post_taxonomy
            )
          )
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <div class="flex flex-col lg:flex-row gap-16">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php
              $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
              $title =  get_the_title();
              $date =  get_the_date();
              $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
              $link = get_the_permalink();
              ?>
              <div class="flex flex-col lg:flex-row gap-12">
                <div class="w-full lg:w-1/2">
                  <div class="aspect-w-16 aspect-h-9 lg:h-full lg:w-full relative rounded-lg overflow-hidden shadow-[0_3px_10px_rgba(0,0,0,0.24)]">
                    <a href="<?php echo $link ?>" class=""><img src="<?php echo $img_src ?>" alt="" class="absolute inset-0 object-cover h-full w-full z-0"></a>
                  </div>
                </div>
                <div class="w-full lg:w-1/2 py-6">
                  <div class="mb-6"><?php echo $date ?></div>
                  <h3 class="h3 font-medium mb-6"><a href="<?php echo $link ?>" class="text-brand-blue hover:underline"><?php echo $title ?></a></h3>
                  <div class="prose prose-lg">
                    <p><?php echo $excerpt ?></p>
                  </div>
                  <div class="mt-6">
                    <a href="<?php echo $link ?>" class="text-brand-red hover:text-brand-redchili hover:underline">Read More &raquo;</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>
</section>