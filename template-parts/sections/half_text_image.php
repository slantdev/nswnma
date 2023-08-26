<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$column_image = get_sub_field('column_image');
$column_text = get_sub_field('column_text');

if ($column_text['title']) : ?>
  <section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
    <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">

      <div class="flex flex-col lg:hidden">
        <div class="w-full">
          <?php if ($column_image['image']) : ?>
            <div class="aspect-w-16 aspect-h-9">
              <img src="<?php echo $column_image['image']['url'] ?>" alt="" class="object-cover h-full w-full">
            </div>
          <?php endif; ?>
          <div class="p-6 pb-8">
            <?php if ($column_text['title']) : ?>
              <h2 class="h3 text-brand-blue mb-4 mt-4"><?php echo $column_text['title'] ?></h2>
            <?php endif; ?>
            <?php if ($column_text['text']) : ?>
              <div class="prose">
                <p><?php echo $column_text['text'] ?></p>
              </div>
            <?php endif; ?>
            <?php if ($column_text['button_link']) : ?>
              <div class="mt-4">
                <a href="<?php echo $column_text['button_link']['url'] ?>" class="btn btn-primary"><?php echo $column_text['button_link']['title'] ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="container hidden lg:block">
        <?php
        $image_position = $column_image['image_position'];
        if ($image_position == 'left') :
        ?>
          <div class="flex flex-col lg:flex-row lg:justify-end">
            <div class="w-full lg:w-1/2">
              <div class="py-8 lg:pl-16 lg:py-20">
              <?php else : ?>
                <div class="flex flex-col lg:flex-row">
                  <div class="w-full lg:w-1/2">
                    <div class="py-8 lg:pr-16 lg:py-20">
                    <?php endif; ?>

                    <?php if ($column_text['title']) : ?>
                      <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $column_text['title'] ?></h2>
                    <?php endif; ?>
                    <?php if ($column_text['text']) : ?>
                      <div class="prose">
                        <p><?php echo $column_text['text'] ?></p>
                      </div>
                    <?php endif; ?>
                    <?php if ($column_text['button_link']) : ?>
                      <div class="mt-8">
                        <a href="<?php echo $column_text['button_link']['url'] ?>" class="btn btn-primary"><?php echo $column_text['button_link']['title'] ?></a>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($column_image['image']) : ?>
                <?php
                $image_position = $column_image['image_position'];
                $col_image_style = '';
                if ($image_position == 'left') {
                  $col_image_style = 'left: 0; right: 50%;';
                } else {
                  $col_image_style = 'left: 50%; right: 0;';
                }
                ?>
                <div class="hidden lg:block absolute top-0 right-0 bottom-0 left-1/2 h-full" style="<?php echo $col_image_style ?>">
                  <img src="<?php echo $column_image['image']['url'] ?>" alt="" class="object-cover h-full w-full">
                </div>
              <?php endif; ?>
            </div>
  </section>
<?php endif; ?>