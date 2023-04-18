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
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="w-1/2">
        <?php if ($headline) : ?>
          <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $headline ?></h2>
        <?php endif; ?>
      </div>
      <?php if ($description) : ?>
        <div class="flex flex-col lg:flex-row lg:items-end">
          <div class="w-1/2">
            <div class="prose">
              <?php echo $description ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php
    $args = array(
      'post_type' => 'team',
      'posts_per_page' => -1,
    );
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
      <div class="container mt-10">
        <div class="grid grid-cols-3 gap-8">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            $title =  get_the_title();
            $the_id = get_the_ID();
            $photo = get_field('photo', $the_id);
            $name = get_field('name', $the_id);
            if (!$name) {
              $name = $title;
            }
            $position = get_field('position', $the_id);
            $education = get_field('education', $the_id);
            ?>
            <div class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-default hover:border-brand-blue hover:shadow-2xl transition duration-300">
              <div class="py-10 max-w-[256px] mx-auto">
                <div class="max-h-[256px] max-w-[256px] mx-auto">
                  <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo $photo['url'] ?>" alt="" class="object-cover h-full w-full"></div>
                </div>
                <div class="mt-6">
                  <?php if ($name) : ?>
                    <h5 class="font-light text-2xl leading-snug"><?php echo $name ?></h5>
                  <?php endif; ?>
                  <?php if ($position) : ?>
                    <div class="font-bold text-lg mt-6"><?php echo $position ?></div>
                  <?php endif; ?>
                  <?php if ($education) : ?>
                    <div class="text-lg mt-6"><?php echo $education ?></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>
</section>