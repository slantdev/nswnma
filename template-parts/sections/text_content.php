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
$image_featured = get_sub_field('image_featured');
$text_content = get_sub_field('text_content');
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

    <?php if ($image_featured) : ?>
      <div class="container my-12">
        <img src="<?php echo $image_featured['url'] ?>" class="rounded-lg shadow-[0_3px_10px_rgba(0,0,0,0.24)]" />
      </div>
    <?php endif; ?>

    <?php if ($text_content) : ?>
      <div class="container">
        <div class="prose prose-lg">
          <?php echo $text_content ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>