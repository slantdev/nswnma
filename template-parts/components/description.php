<?php
$field = $args['field'];
$class = $args['class'];

if ($field) {
  $description = get_sub_field($field);
} else {
  $description = get_sub_field('description');
}

$description_content = $description['description_content'];
$description_color = $description['description_color'];
$description_alignment = $description['description_alignment'];
$description_max_width = $description['description_max_width'];
$description_class = $class;
switch ($description_alignment) {
  case "left":
    $description_class .= ' mr-auto text-left ';
    break;
  case "center":
    $description_class .= ' mx-auto text-center ';
    break;
  case "right":
    $description_class .= ' ml-auto text-right ';
    break;
  default:
    $description_class .= ' ';
}
if ($description_max_width) {
  switch ($description_max_width) {
    case "default":
      $description_class .= '';
      break;
    default:
      $description_class .= $description_max_width;
  }
}
$description_style = '';
if ($description_color) {
  $description_style = 'color: ' . $description_color . ';';
}
if ($description_content) {
  echo '<div class="prose ' . $description_class . ' mb-6 xl:mb-8" style="' . $description_style . '">';
  echo $description_content;
  echo '</div>';
}
