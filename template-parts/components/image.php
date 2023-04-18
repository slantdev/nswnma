<?php
$image = get_sub_field('image');
preint_r($image);
$image_source = $image['image_source'];
$image_corners = $image['image_corners'];
$image_max_width = $image['image_max_width'];
$image_id = $image_source['ID'];
$image_src = $image_source['url'];

preint_r($image);

$image_container_class = '';
switch ($image_max_width) {
  case "none":
    $image_container_class = 'max-w-none';
    break;
  case "xs":
    $image_container_class = 'max-w-xs';
    break;
  case "sm":
    $image_container_class = 'max-w-sm';
    break;
  case "md":
    $image_container_class = 'max-w-md';
    break;
  case "lg":
    $image_container_class = 'max-w-lg';
    break;
  case "xl":
    $image_container_class = 'max-w-xl';
    break;
  case "2xl":
    $image_container_class = 'max-w-2xl';
    break;
  default:
    $image_container_class = 'max-w-full';
}

$aspect_w = '';
$aspect_h = '';
$image_class = '';
if (isset($args['aspect_w'])) {
  $aspect_w = $args['aspect_w'];
  $image_container_class .= ' aspect-w-' . $aspect_w;
}
if (isset($args['aspect_h'])) {
  $aspect_h = $args['aspect_h'];
  $image_container_class .= ' aspect-h-' . $aspect_h;
}
if (isset($args['class'])) {
  $image_class = $args['class'];
}
//$image_class = $args['class'];
if ($image_id) {
  echo '<div class="mb-8 mx-auto xl:mb-12 ' . $image_container_class . '">';
  echo wp_get_attachment_image($image_id, 'large', false, array('class' => $image_corners . ' mx-auto ' . $image_class));
  echo '</div>';
}
