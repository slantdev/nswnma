<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$placeholder = get_sub_field('placeholder');
$links = get_sub_field('links');

if ($placeholder) : ?>
  <section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
    <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
      <div class="container max-w-screen-xl">
        <div class="bg-brand-bluedark rounded-lg p-10 text-white">
          <?php if ($headline) : ?>
            <h3 class="text-[34px] font-semibold mb-6"><?php echo $headline ?></h3>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="text-lg font-medium">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
          <?php if ($form_shortcode) : ?>
            <?php echo do_shortcode($form_shortcode) ?>
          <?php else : ?>
            <div class="flex gap-x-6 mt-6">
              <input type="text" class="grow w-full text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Business Name">
              <input type="text" class="grow w-full text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Email">
              <input type="text" class="grow text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Phone">
              <div class="flex-none"><button class="btn btn-yellow text-brand-bluedark">Download Now</button></div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="relative bg-brand-bluedark">
  <div class="container py-12">
    <div class="flex justify-center">
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="m-1 relative flex justify-between items-center text-2xl w-[460px] text-brand-bluedark cursor-pointer border border-solid border-gray-300 bg-white py-3 pl-6 pr-3 rounded-md">
          <span>I'm looking for</span>
          <div>
            <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '32', 'class' => 'text-brand-bluedark rotate-90')); ?>
          </div>
        </label>
        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full">
          <li><a>Item 1</a></li>
          <li><a>Item 2</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>