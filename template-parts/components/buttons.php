<?php
$field = $args['field'];
$class = $args['class'];
if ($field) {
  $buttons = get_sub_field($field);
} else {
  $buttons = get_sub_field('buttons');
}
$buttons_alignment = $buttons['buttons_alignment'];

$button_container_class = $class;
switch ($buttons_alignment) {
  case "left":
    $button_container_class .= ' text-left';
    break;
  case "right":
    $button_container_class .= ' text-right';
    break;
  case "center":
    $button_container_class .= ' text-center mx-auto';
    break;
  default:
    $button_container_class .= ' text-left';
}

$buttons_repeater = $buttons['buttons_repeater'];
if ($buttons_repeater) {
  $button_count = count($buttons_repeater);
  $button_margin = "";
  if ($button_count > 1) {
    $button_margin = "mr-4 mb-4";
  }
  echo '<div class="mb-6 xl:mb-0 ' . $button_container_class . '">';
  foreach ($buttons_repeater as $button) {
    if ($button['button_link']) {
      $button_title = $button['button_link']['title'];
      $button_url = $button['button_link']['url'];
      $button_target = $button['button_link']['target'];
      $button_bg_color = $button['button_bg_color'];
      $button_text_color = $button['button_text_color'];
      $button_size = $button['button_size'];
      $button_class = '';
      switch ($button_size) {
        case "xs":
          $button_class = 'px-4 py-2 rounded-md text-xs font-semibold leading-none';
          break;
        case "sm":
          $button_class = 'px-4 py-2 xl:px-4 xl:py-2 rounded-md text-sm font-semibold leading-none';
          break;
        case "md":
          $button_class = 'px-4 py-2.5 text-sm xl:px-5 xl:py-3 rounded-md xl:text-base font-semibold leading-none';
          break;
        case "lg":
          $button_class = 'px-6 py-4 rounded-md text-base xl:px-8 xl:py-4 xl:rounded-lg xl:text-lg font-semibold leading-none';
          break;
        case "xl":
          $button_class = 'px-8 py-4 rounded-lg text-lg xl:px-10 xl:py-5 xl:rounded-xl xl:text-xl font-semibold leading-none';
          break;
        default:
          $button_class = 'px-6 py-3 rounded-md text-base xl:px-8 xl:py-4 xl:rounded-lg xl:text-lg font-semibold leading-none';
      }
      $button_style = '';
      if ($button_bg_color) {
        $button_style .= 'background-color: ' . $button_bg_color . ';';
      }
      if ($button_text_color) {
        $button_style .= 'color: ' . $button_text_color . ';';
      }
      if ($button_url) {
        echo '<a href="' . $button_url . '" class="inline-block transition duration-300 hover:brightness-[1.2] ' . $button_class . ' ' . $button_margin . '" style="' . $button_style . '" title="' . $button_title . '" target="' . $button_target . '">' . $button_title . '</a>';
      }
    }
  }
  echo '</div>';
}
