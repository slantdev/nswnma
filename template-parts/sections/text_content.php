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
$image_featured = get_sub_field('image_featured');
$text_content = get_sub_field('text_content');
$button_link = get_sub_field('button_link');

$intro_settings = $section_intro['intro_settings'] ?? '';
$intro_text_alignment = $intro_settings['text_alignment'] ?? '';
$intro_container_class = '';
switch ($intro_text_alignment) {
  case "left":
    $intro_container_class .= ' mr-auto text-left ';
    break;
  case "center":
    $intro_container_class .= ' mx-auto text-center ';
    break;
  case "right":
    $intro_container_class .= ' ml-auto text-right ';
    break;
  default:
    $intro_container_class .= ' mr-auto text-left ';
}
$intro_container_max_width = $intro_settings['container_max_width'] ?? '';
switch ($intro_container_max_width) {
  case "max-w-none":
    $intro_container_class .= ' max-w-none ';
    break;
  case "max-w-screen-sm":
    $intro_container_class .= ' max-w-screen-sm ';
    break;
  case "max-w-screen-md":
    $intro_container_class .= ' max-w-screen-md ';
    break;
  case "max-w-screen-lg":
    $intro_container_class .= ' max-w-screen-lg ';
    break;
  case "max-w-screen-xl":
    $intro_container_class .= ' max-w-screen-xl ';
    break;
  default:
    $intro_container_class .= ' max-w-prose ';
}

$text_content_settings = get_sub_field('text_content_settings');
$text_content_text_alignment = $text_content_settings['text_alignment'] ?? '';
$text_content_container_class = '';
switch ($text_content_text_alignment) {
  case "left":
    $text_content_container_class .= ' mr-auto text-left ';
    break;
  case "center":
    $text_content_container_class .= ' mx-auto text-center ';
    break;
  case "right":
    $text_content_container_class .= ' ml-auto text-right ';
    break;
  default:
    $text_content_container_class .= ' mr-auto text-left ';
}
$text_content_container_max_width = $text_content_settings['container_max_width'] ?? '';
switch ($text_content_container_max_width) {
  case "max-w-none":
    $text_content_container_class .= ' max-w-none ';
    break;
  case "max-w-screen-sm":
    $text_content_container_class .= ' max-w-screen-sm ';
    break;
  case "max-w-screen-md":
    $text_content_container_class .= ' max-w-screen-md ';
    break;
  case "max-w-screen-lg":
    $text_content_container_class .= ' max-w-screen-lg ';
    break;
  case "max-w-screen-xl":
    $text_content_container_class .= ' max-w-screen-xl ';
    break;
  default:
    $text_content_container_class .= ' max-w-prose ';
}
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <div class="<?php echo $intro_container_class ?>">
        <?php if ($headline) : ?>
          <h2 class="h3 text-brand-bluedark font-medium mb-4 mt-8 md:mb-8 md:mt-8"><?php echo $section_intro['headline'] ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <div class="prose lg:prose-lg max-w-none">
            <p><?php echo $description ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($image_featured) : ?>
      <div class="container my-8 lg:my-12">
        <img src="<?php echo $image_featured['url'] ?>" class="rounded-lg shadow-[0_3px_10px_rgba(0,0,0,0.24)]" />
      </div>
    <?php endif; ?>

    <?php if ($text_content) : ?>
      <div class="container">
        <div class="<?php echo $text_content_container_class ?>">
          <div class="prose lg:prose-lg max-w-none">
            <?php echo $text_content ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($button_link) : ?>
      <div class="container">
        <div class="<?php echo $text_content_container_class ?>">
          <div class="mt-6 md:mt-8">
            <a href="<?php echo $button_link['url'] ?>" class="btn btn-primary btn-md"><?php echo $button_link['title'] ?></a>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>