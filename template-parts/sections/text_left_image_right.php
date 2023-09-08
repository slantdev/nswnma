<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
// $column_text_class = 'lg:w-2/3 xl:w-3/5';
// $column_image_class = 'max-w-[420px] lg:max-w-none lg:w-1/3 xl:w-2/5';
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$image = get_sub_field('image');
$navigation = get_sub_field('navigation');
?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative container mx-auto <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <?php if ($heading) : ?>
          <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8"><?php echo $heading ?></h2>
        <?php endif; ?>
        <?php if ($content) : ?>
          <div class="prose xl:prose-lg">
            <?php echo $content ?>
          </div>
        <?php endif; ?>
        <?php get_template_part('template-parts/components/buttons', '', array('field' => 'buttons', 'class' => 'mt-6 xl:mt-12')); ?>
      </div>
      <div class="w-full mt-8 lg:mt-0 lg:w-5/12">
        <div class="flex flex-col lg:pl-24">
          <?php if ($image) : ?>
            <div class="">
              <div class="aspect-w-6 aspect-h-7">
                <img src="<?php echo $image['url'] ?>" alt="" class="rounded-lg object-cover h-full w-full">
              </div>
            </div>
          <?php endif; ?>
          <?php if ($navigation) : ?>
            <div class="mt-4 lg:mt-8 flex flex-col divide-y divide-gray-300">
              <?php foreach ($navigation as $nav) : ?>
                <?php
                $icon = $nav['icon'];
                $link = $nav['link'];
                ?>
                <?php if ($link) : ?>
                  <a href="<?php echo $link['url'] ?>" class="inline-flex items-center gap-x-4 px-4 py-3 text-brand-bluedark text-xl font-medium cursor-pointer hover:text-brand-red">
                    <?php if ($icon) : ?>
                      <div class="flex-none">
                        <?php echo nswnma_icon(array('icon' => $icon, 'group' => 'content', 'size' => '36', 'class' => '')); ?>
                      </div>
                    <?php endif; ?>
                    <div><?php echo $link['title'] ?></div>
                  </a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>