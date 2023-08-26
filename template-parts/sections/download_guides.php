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
$guides_grid = get_sub_field('guides_grid');

function card_guides($atts = array())
{
  $atts = shortcode_atts(array(
    'image' => nswnma_asset('images/guides/virus.png'),
    'title'  => '',
    'download_url'  => '#',
    'bg_color'  => '#7DBBC8',
  ), $atts);
  $output = '';
  $output .= '<div>
    <div class="aspect-w-1 aspect-h-1">
      <div class="rounded-lg flex p-6 items-center justify-center shadow-lg" style="background-color: ' . $atts['bg_color'] . ';">
        <img src="' . $atts['image'] . '" alt="">
      </div>
    </div>
    <div class="pt-4 pb-4">
      <h4 class="text-xl font-medium text-brand-bluedark line-clamp-2 h-14">' . $atts['title'] . '</h4>
    </div>
    <div class="border-t flex gap-x-2 pt-[8px] hover:border-brand-bluedark hover:border-t-4 hover:pt-[5px]">
      <a href="' . $atts['download_url'] . '" class="inline-block text-gray-500 hover:text-brand-bluedark">
        ' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '
      </a>
      <a href="#" class="inline-block text-gray-500 hover:text-brand-bluedark">
      ' . nswnma_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '
      </a>
    </div>
  </div>';

  return $output;
};
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
                $card_image = $card['card_image'];
                $card_color = $card['card_color'];
                $title = $card['title'];
                $guide_pdf = $card['guide_pdf'];
                echo card_guides(
                  array(
                    'image' => $card_image['url'],
                    'title'  => $title,
                    'download_url'  => $guide_pdf['url'],
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