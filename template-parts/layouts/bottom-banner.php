<?php
$exclude_from_page = get_field('exclude_from_page', 'option');
//preint_r($exclude_from_page);
if (!$exclude_from_page) {
  $exclude_from_page = array();
}
$page_id = get_the_ID();

if (!in_array($page_id, $exclude_from_page)) :

  /*
 * Section Settings Variables
 */
  $section_settings = get_field('section_settings', 'option');
  $section_background_color = $section_settings['section_background_color'];
  $section_style = '';
  if ($section_background_color) {
    $section_style .= 'background-color:' . $section_background_color . ';';
  }
  $spacing_top = $section_settings['section_spacing']['spacing_top'];
  $spacing_bottom = $section_settings['section_spacing']['spacing_bottom'];
  $border_left = $section_settings['section_border']['left'];
  $border_top = $section_settings['section_border']['top'];
  $border_right = $section_settings['section_border']['right'];
  $border_bottom = $section_settings['section_border']['bottom'];
  $border_color = $section_settings['section_border']['border_color'];
  $border_style = '';
  if ($border_left || $border_top || $border_right || $border_bottom) {
    $border_style = 'border-style: solid;';
  }
  if ($border_left) {
    $border_style .= 'border-left-width: ' . $border_left . 'px;';
  }
  if ($border_top) {
    $border_style .= 'border-top-width: ' . $border_top . 'px;';
  }
  if ($border_right) {
    $border_style .= 'border-right-width: ' . $border_right . 'px;';
  }
  if ($border_bottom) {
    $border_style .= 'border-bottom-width: ' . $border_bottom . 'px;';
  }
  if ($border_color) {
    $border_style .= 'border-color: ' . $border_color . ';';
  }
  $section_style .= $border_style;

  $add_section_anchor = $section_settings['add_section_anchor'];
  $section_id = '';
  if ($add_section_anchor) {
    $section_id = $section_settings['section_id'];
  }
  $section_padding_top = '';
  switch ($spacing_top) {
    case "none":
      $section_padding_top = 'pt-0';
      break;
    case "xs":
      $section_padding_top = 'pt-4 lg:pt-8 xl:pt-8';
      break;
    case "sm":
      $section_padding_top = 'pt-4 lg:pt-6 xl:pt-14';
      break;
    case "md":
      $section_padding_top = 'pt-8 lg:pt-12 xl:pt-20';
      break;
    case "lg":
      $section_padding_top = 'pt-10 lg:pt-16 xl:pt-28';
      break;
    case "xl":
      $section_padding_top = 'pt-12 lg:pt-20 xl:pt-36';
      break;
    case "2xl":
      $section_padding_top = 'pt-16 lg:pt-24 xl:pt-44';
      break;
    default:
      $section_padding_top = 'pt-12 lg:pt-20 xl:pt-36';
  }
  $section_padding_bottom = '';
  switch ($spacing_bottom) {
    case "none":
      $section_padding_bottom = 'pb-0';
      break;
    case "xs":
      $section_padding_bottom = 'pb-4 xl:pb-8';
      break;
    case "sm":
      $section_padding_bottom = 'pb-4 lg:pb-6 xl:pb-14';
      break;
    case "md":
      $section_padding_bottom = 'pb-8 lg:pb-12 xl:pb-20';
      break;
    case "lg":
      $section_padding_bottom = 'pb-10 lg:pb-16 xl:pb-28';
      break;
    case "xl":
      $section_padding_bottom = 'pb-12 lg:pb-20 xl:pb-36';
      break;
    case "2xl":
      $section_padding_bottom = 'pb-16 lg:pb-24 xl:pb-44';
      break;
    default:
      $section_padding_bottom = 'pb-12 lg:pb-20 xl:pb-36';
  }

  $section_fullwidth = $section_settings['section_full_width'];
  $section_container_class = $section_padding_top . ' ' . $section_padding_bottom  . ' ';
  if (!$section_fullwidth) {
    $section_container_class .= 'relative container mx-auto ';
  } else {
    $section_container_class .= 'px-4 xl:px-8';
  }

  $text = get_field('text', 'option');
  $headline = $text['headline'];
  $description = $text['description'];
  $button_link = $text['button_link'];
  $button_link_target = $button_link['target'];
  if (!$button_link_target) {
    $button_link_target = '_self';
  }

  $background = get_field('background', 'option');
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
              <a href="<?php echo $button_link['url'] ?>" target="<?php echo $button_link_target ?>" class="btn btn-primary"><?php echo $button_link['title'] ?></a>
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

<?php endif; ?>