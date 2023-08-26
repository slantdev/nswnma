<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$text = get_sub_field('text');
$headline = $text['headline'];
$description = $text['description'];
$button_link = $text['button_link'];

$background = get_sub_field('background');
$background_image = $background['background_image'];
$background_overlay = $background['background_overlay'];

?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative min-h-[320px] bg-black <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container relative z-10">
      <div class="lg:w-7/12 pt-10">
        <?php if ($headline) : ?>
          <h3 class="text-white text-3xl md:text-[44px] leading-[1.1] font-bold"><?php echo $headline ?></h3>
        <?php endif; ?>
        <?php if ($description) : ?>
          <p class="text-xl md:text-2xl text-white mt-4"><?php echo $description ?></p>
        <?php endif; ?>
        <?php if ($button_link) : ?>
          <div class="mt-8">
            <a href="<?php echo $button_link['url'] ?>" class="btn btn-primary"><?php echo $button_link['title'] ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="absolute inset-0 w-full h-full z-0">
      <?php if ($background_image) : ?>
        <img src="<?php echo $background_image['url'] ?>" alt="" class="object-cover h-full w-full">
      <?php endif; ?>
      <?php if ($background_overlay) : ?>
        <div class="absolute inset-0 w-full h-full" style="background-color: <?php echo $background_overlay ?>;"></div>
      <?php endif; ?>
    </div>
  </div>
</section>