<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$headline = get_sub_field('headline');
$content = get_sub_field('content');
$form_shortcode = get_sub_field('form_shortcode');

?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($headline) : ?>
      <div class="container">
        <div class="w-full md:w-1/2">
          <h2 class="h3 text-brand-bluedark mb-4 mt-4 md:mb-8 md:mt-8"><?php echo $headline ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <div class="container">
      <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-2/5">
          <?php if ($content) : ?>
            <div class="prose lg:prose-lg">
              <?php echo $content ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="w-full mt-8 lg:mt-0 lg:w-3/5 lg:pl-16">
          <?php if ($form_shortcode) : ?>
            <?php echo do_shortcode($form_shortcode) ?>
          <?php else : ?>
            <div class="flex flex-col gap-y-4">
              <div class="flex gap-x-4 w-full">
                <div class="w-1/2">
                  <label for="" class="block mb-1">First Name *</label>
                  <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
                </div>
                <div class="w-1/2">
                  <label for="" class="block mb-1">Last Name *</label>
                  <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
                </div>
              </div>
              <div>
                <label for="" class="block mb-1">Email *</label>
                <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
              </div>
              <div>
                <label for="" class="block mb-1">Phone *</label>
                <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
              </div>
              <div>
                <label for="" class="block mb-1">Post Code *</label>
                <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
              </div>
              <div class="mt-5">
                <button class="btn btn-red">SUBMIT</button>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</section>