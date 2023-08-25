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
$scholarship_category = $posts['scholarship_category'];
$posts_per_page = $posts['posts_per_page'];
if (is_admin()) {
  $posts_per_page = 2;
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

    <div class="container mt-12">
      <?php
      if ($scholarship_category) {
        $args = array(
          'post_type' => 'scholarship',
          'posts_per_page' => $posts_per_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'term_id',
              'terms' => $post_taxonomy
            )
          )
        );
      } else {
        $args = array(
          'post_type' => 'scholarship',
          'posts_per_page' => $posts_per_page,
        );
      }
      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()) : ?>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-12 lg:gap-20">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $title =  get_the_title();
            $date =  get_the_date();
            $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
            $link = get_the_permalink();
            ?>
            <div class="flex flex-col">
              <div class="aspect-w-6 aspect-h-4 mb-8">
                <a href="<?php echo $link ?>" class=""><img src="<?php echo $img_src ?>" alt="" class="object-cover h-full w-full rounded-2xl"></a>
              </div>
              <div class="p-0 flex flex-col grow">
                <h3 class="h4 font-semibold mb-6"><a href="<?php echo $link ?>" class="text-brand-blue hover:underline"><?php echo $title ?></a></h3>
                <div class="prose mb-8">
                  <p><?php echo $excerpt ?></p>
                </div>
                <div class="mt-auto">
                  <a href="<?php echo $link ?>" class="btn btn-primary">Learn More</a>
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