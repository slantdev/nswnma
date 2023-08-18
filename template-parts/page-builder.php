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

    if (get_row_layout() == 'text_left_image_right') :
      get_template_part('template-parts/sections/text_left_image_right');

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
      get_template_part('template-parts/sections/latest_news_card');

    elseif (get_row_layout() == 'full_width_banner') :
      get_template_part('template-parts/sections/full_width_banner');

    elseif (get_row_layout() == 'accordion') :
      get_template_part('template-parts/sections/accordion');

    elseif (get_row_layout() == 'team_grid') :
      get_template_part('template-parts/sections/team_grid');

    elseif (get_row_layout() == 'text_content') :
      get_template_part('template-parts/sections/text_content');

    elseif (get_row_layout() == 'latest_news_featured') :
      get_template_part('template-parts/sections/latest_news_featured');

    elseif (get_row_layout() == 'latest_news_archive') :
      get_template_part('template-parts/sections/latest_news_archive');

    elseif (get_row_layout() == 'download_guides') :
      get_template_part('template-parts/sections/download_guides');

    elseif (get_row_layout() == 'contact_form') :
      get_template_part('template-parts/sections/contact_form');

    elseif (get_row_layout() == 'reports_archive') :
      get_template_part('template-parts/sections/reports_archive');

    elseif (get_row_layout() == 'scholarship_archive') :
      get_template_part('template-parts/sections/scholarship_archive');

    elseif (get_row_layout() == 'submissions_archive') :
      get_template_part('template-parts/sections/submissions_archive');

    // elseif (get_row_layout() == 'image_center') :
    //   get_template_part('template-parts/sections/image_center');

    elseif (get_row_layout() == 'event_search') :
      get_template_part('template-parts/sections/event_search');

    elseif (get_row_layout() == 'events_card') :
      get_template_part('template-parts/sections/events_card');

    endif;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;
