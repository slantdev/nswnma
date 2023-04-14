<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}

if (have_rows('section', $the_id)) :

  // Loop through rows.
  while (have_rows('section', $the_id)) : the_row();

    if (get_row_layout() == 'image_left_text') :
      get_template_part('template-parts/sections/image_left_text');

    elseif (get_row_layout() == 'hero_slider') :
      get_template_part('template-parts/sections/hero_slider');

    elseif (get_row_layout() == 'select_shortcut') :
      get_template_part('template-parts/sections/select_shortcut');

    elseif (get_row_layout() == 'info_box_filter') :
      get_template_part('template-parts/sections/info_box_filter');

    elseif (get_row_layout() == 'half_text_image') :
      get_template_part('template-parts/sections/half_text_image');

    elseif (get_row_layout() == 'content_slider') :
      get_template_part('template-parts/sections/content_slider');

    elseif (get_row_layout() == 'latest_news') :
      get_template_part('template-parts/sections/latest_news');

    elseif (get_row_layout() == 'full_width_banner') :
      get_template_part('template-parts/sections/full_width_banner');

    endif;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;
