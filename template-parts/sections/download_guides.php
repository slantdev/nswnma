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
$headline = $section_intro['headline'] ?? '';
$description = $section_intro['description'] ?? '';
$guides_grid = get_sub_field('guides_grid');
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($headline) : ?>
      <div class="container">
        <div class="flex flex-col lg:flex-row lg:flex-nowrap">
          <div class="w-full lg:w-7/12">
            <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $section_intro['headline'] ?></h2>
            <?php if ($description) : ?>
              <div class="prose xl:prose-lg">
                <?php echo $description ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($guides_grid) : ?>
      <?php foreach ($guides_grid as $grid) : ?>
        <?php
        $group_title = $grid['group_title'];
        $guide_cards = $grid['guide_cards'];
        ?>
        <div class="container md:py-10">
          <?php if ($group_title) : ?>
            <h3 class="h5 text-brand-bluedark mb-6 font-bold"><?php echo $group_title ?></h3>
          <?php endif; ?>
          <?php if ($guide_cards) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 md:gap-6">
              <?php foreach ($guide_cards as $card) : ?>
                <?php
                $card_image = $card['card_image']['url'] ?? '';
                $card_color = $card['card_color'] ?? '';
                $title = $card['title'] ?? '';
                $guide_pdf = $card['guide_pdf'] ?? '';
                $external_link = $card['external_link']['url'] ?? '';
                $download_url = "#";
                if ($guide_pdf) {
                  $download_url = $guide_pdf['url'];
                } else if ($external_link) {
                  $download_url = $external_link;
                }
                echo card_guides(
                  array(
                    'image' => $card_image,
                    'title'  => $title,
                    'download_url'  => $download_url,
                    'bg_color'  => $card_color,
                  )
                );
                ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>
</section>