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

    <?php if ($headline || $description) : ?>
      <div class="container">
        <div class="w-1/2">
          <?php if ($headline) : ?>
            <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose mx-auto">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="container">
      <div class="flex flex-col gap-y-4">
        <div class="flex gap-x-4 w-full items-center">
          <div class="w-1/2">
            <input type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
          </div>
          <div class="w-[24px] text-center flex-none">In</div>
          <div class="w-1/2">
            <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="">Suburb</option>
            </select>
          </div>
        </div>
        <div class="flex gap-x-4 w-full items-center">
          <div class="w-1/2">
            <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="">Topic</option>
            </select>
          </div>
          <div class="w-[24px] text-center flex-none"></div>
          <div class="w-1/2">
            <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="">Month</option>
            </select>
          </div>
        </div>
        <div class="mt-5 flex items-center gap-x-4">
          <button class="btn btn-red">SEARCH</button><button class="text-brand-bluedark font-medium">Reset Search</button>
        </div>
      </div>
    </div>

  </div>
</section>