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
$accordion = get_sub_field('accordion');
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <?php if ($headline) : ?>
        <div class="w-1/2">
          <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $headline ?></h2>
        </div>
      <?php endif; ?>
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

    <?php if ($accordion) : ?>
      <section class="pt-12 pb-24">
        <div class="container">
          <?php foreach ($accordion as $row) : ?>
            <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
              <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
                <?php echo $row['title'] ?>
              </div>
              <div class="collapse-content">
                <?php echo $row['content'] ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </section>
    <?php endif; ?>

  </div>
</section>