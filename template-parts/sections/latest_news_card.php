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
$button_link = $section_intro['button_link'];
$posts = get_sub_field('posts');
$post_taxonomy = $posts['post_taxonomy'];
$posts_per_page = $posts['posts_per_page'];
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="w-full md:w-1/2">
        <?php if ($headline) : ?>
          <h2 class="h3 text-brand-bluedark font-medium my-4 md:mb-8 md:mt-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
      </div>
      <div class="flex flex-col lg:flex-row lg:items-end">
        <div class="w-full lg:w-1/2">
          <?php if ($description) : ?>
            <div class="prose md:prose-lg">
              <p><?php echo $description ?></p>
            </div>
          <?php endif; ?>

        </div>
        <div class="w-full lg:w-1/2">
          <?php if ($button_link) : ?>
            <div class="flex mt-5 lg:mt-0 lg:justify-end"><a href="<?php echo $button_link['url'] ?>" class="btn btn-primary"><?php echo $button_link['title'] ?></a></div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if ($post_taxonomy) : ?>
      <div class="container mt-12">
        <div class="flex flex-col gap-y-4 lg:flex-row lg:gap-x-8">
          <div class="w-full lg:w-1/2">
            <?php
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 1,
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
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
                $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $title =  get_the_title();
                $date =  get_the_date();
                $link = get_the_permalink();
                ?>
                <div class="h-full w-full relative rounded-lg overflow-hidden shadow-[0_3px_10px_rgba(0,0,0,0.24)]">
                  <img src="<?php echo $img_src ?>" alt="" class="absolute inset-0 object-cover h-full w-full z-0">
                  <div class="w-full h-full bg-gradient-to-t from-black/80 to-transparent via-black/50 relative z-10 flex items-end">
                    <div class="text-white p-6 md:p-8 lg:p-12">
                      <div class="font-bold mb-6"><?php echo $date ?></div>
                      <h3 class="h3 font-medium text-white mb-6"><?php echo $title ?></h3>
                      <div class="prose md:prose-lg text-white">
                        <p><?php echo $excerpt ?></p>
                      </div>
                      <div class="mt-6">
                        <a href="<?php echo $link ?>" class="btn btn-white hover:scale-105">Read More &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
          <div class="w-full lg:w-1/2">
            <div class="flex flex-col gap-y-6 h-full">
              <?php
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'offset' => 1,
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
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php
                  $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
                  $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
                  $title =  get_the_title();
                  $date =  get_the_date();
                  $link = get_the_permalink();
                  ?>
                  <a href="<?php echo $link ?>" class="block bg-white rounded-[6px] shadow-[0_3px_10px_rgba(0,0,0,0.24)] border-b-[6px] border-brand-blue hover:border-brand-red transition duration-300">
                    <div class="p-4 gap-x-4 md:p-8 h-full flex md:gap-x-6 items-center">
                      <div class="w-1/4">
                        <div class="aspect-w-1 aspect-h-1">
                          <img src="<?php echo $img_src ?>" alt="" class="object-cover h-full w-full z-0 rounded-md">
                        </div>
                      </div>
                      <div class="w-3/4">
                        <div class="font-bold text-gray-400 mb-2"><?php echo $date ?></div>
                        <h5 class="h6 font-normal leading-snug"><?php echo $title ?></h5>
                      </div>
                    </div>
                  </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>