<?php

/**
 * Add container to video embeds in WordPress
 *
 * @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
 */
function nswnma_video_container($html)
{
  return '<div class="aspect-w-16 aspect-h-9">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'nswnma_video_container', 10, 3);
add_filter('video_embed_html', 'nswnma_video_container'); // Jetpack


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
      <a href="' . $atts['download_url'] . '" target="_blank" class="inline-block text-gray-500 hover:text-brand-bluedark">
        ' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '
      </a>
    </div>
  </div>';

  return $output;
};
