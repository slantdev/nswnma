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
$post_taxonomy = $posts['post_taxonomy'];
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
              <!-- <div class="flex gap-8">
                <div class="w-1/2">
                  <div class="h-full w-full relative rounded-lg overflow-hidden shadow-[0_3px_10px_rgba(0,0,0,0.24)]">
                    <a href="<?php echo $link ?>" class=""><img src="<?php echo $img_src ?>" alt="" class="absolute inset-0 object-cover h-full w-full z-0"></a>
                  </div>
                </div>
                <div class="w-1/2 py-6">
                  <div class="mb-6"><?php echo $date ?></div>
                  <h3 class="h3 font-medium mb-6"><a href="<?php echo $link ?>" class="text-brand-blue hover:underline"><?php echo $title ?></a></h3>
                  <div class="prose prose-lg">
                    <p><?php echo $excerpt ?></p>
                  </div>
                  <div class="mt-6">
                    <a href="<?php echo $link ?>" class="text-brand-red hover:text-brand-redchili hover:underline">Read More &raquo;</a>
                  </div>
                </div>
              </div> -->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>
</section>