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
$posts = get_sub_field('posts');
$post_taxonomy = $posts['post_taxonomy'];
$posts_per_page = $posts['posts_per_page'];
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="w-1/2">
        <?php if ($section_intro['headline']) : ?>
          <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
      </div>
      <div class="flex flex-col lg:flex-row lg:items-end">
        <?php if ($section_intro['description']) : ?>
          <div class="w-1/2">
            <div class="prose">
              <p><?php echo $section_intro['description'] ?></p>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($section_intro['button_link']) : ?>
          <div class="w-1/2">
            <div class="flex justify-end"><a href="<?php echo $section_intro['button_link']['url'] ?>" class="btn btn-secondary"><?php echo $section_intro['button_link']['title'] ?></a></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if ($post_taxonomy) : ?>
      <?php
      $carousel_id = uniqid('carousel-');
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
      <div class="mt-10 overflow-x-hidden">
        <div id="<?php echo $carousel_id ?>" class="content-carousel--swiper">
          <div class="swiper-wrapper">
            <?php if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
                $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $title =  get_the_title();
                $date =  get_the_date();
                $link = get_the_permalink();
                ?>
                <div class="swiper-slide max-w-screen-xl">
                  <div class="container">
                    <div class="bg-white flex flex-col md:flex-row rounded-lg overflow-hidden shadow-xl">
                      <div class="w-full md:w-4/12">
                        <div class="p-4 md:p-8 lg:p-12">
                          <div class="text-sm font-bold mb-8"><?php echo $date ?></div>
                          <h3 class="text-2xl text-brand-bluedark font-medium mb-6"><?php echo $title ?></h3>
                          <div class="prose text-sm">
                            <p><?php echo $excerpt ?></p>
                          </div>
                          <div class="mt-8">
                            <a href="<?php echo $link ?>" class="font-medium text-brand-redchili hover:text-brand-red">Read The Story &raquo;</a>
                          </div>
                        </div>
                      </div>
                      <div class="w-full md:w-8/12">
                        <img src="<?php echo $img_src ?>" alt="" class="object-cover h-full w-full">
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
          <div class="flex gap-x-6 justify-center py-10">
            <div class="content-carousel--button-prev p-3 rounded-full bg-brand-bluedark shadow-lg flex items-center justify-center cursor-pointer text-white hover:bg-white hover:text-brand-bluedark transition duration-300">
              <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => 'rotate-180')); ?>
            </div>
            <div class="content-carousel--button-next p-3 rounded-full bg-brand-bluedark shadow-lg flex items-center justify-center cursor-pointer text-white hover:bg-white hover:text-brand-bluedark transition duration-300">
              <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => '')); ?>
            </div>
          </div>
        </div>
        <script>
          new Swiper('#<?php echo $carousel_id ?>', {
            loop: true,
            navigation: {
              nextEl: '#<?php echo $carousel_id ?> .content-carousel--button-next',
              prevEl: '#<?php echo $carousel_id ?> .content-carousel--button-prev',
            },
            slidesPerView: "auto",
            centeredSlides: true,
            spaceBetween: 0,
          });
        </script>
      </div>
    <?php endif; ?>
  </div>
</section>