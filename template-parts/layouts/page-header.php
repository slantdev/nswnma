<?php
/*
 * Page Settings
 */
$breadcrumbs = $args['breadcrumbs'];
if ($breadcrumbs !== true) {
  $breadcrumbs = false;
} else {
  $breadcrumbs = true;
}

//echo $args['breadcrumbs'];

$enable_page_header = get_field('enable_page_header');
if ($enable_page_header) :
  $page_header = get_field('page_header');
  $hero_title = $page_header['hero_title'] ?? '';
  $hero_text = $page_header['hero_text'] ?? '';
  $hero_button = $page_header['hero_button'] ?? '';
  $hero_background = $page_header['hero_background'] ?? '';
  $hero_bg_color = $page_header['hero_bg_color'] ?? '';
  $hero_overlay_color = $page_header['hero_overlay_color'] ?? '';
  $bg_position_x = $page_header['bg_position_x'] ?? '';
  $bg_position_y = $page_header['bg_position_y'] ?? '';

  if (!$hero_title) {
    $hero_title = get_the_title();
  }

  $hero_bg_style = '';
  if ($hero_background) {
    $hero_bg_style .= 'background-image: url(' . $hero_background . ');';
  }
  if ($hero_bg_color) {
    $hero_bg_style .= 'background-color: ' . $hero_bg_color . ';';
  }
  if ($bg_position_x) {
    $hero_bg_style .= 'background-position: ' . $bg_position_x . ' ' . $bg_position_y . ';';
  }

  $hero_overlay_style = '';
  if ($hero_overlay_color) {
    $hero_overlay_style = 'background-color: ' . $hero_overlay_color;
  }

  $enable_page_anchor_navigation = get_field('enable_page_anchor_navigation');
  $anchor_list = get_field('anchor_list');

?>
  <section>
    <div class="relative bg-cover bg-no-repeat bg-center" style="<?php echo $hero_bg_style; ?>">
      <div class="container mx-auto h-full relative z-10 py-16 xl:py-28">
        <div class="md:w-3/4 lg:w-3/5 text-white">
          <?php
          if ($hero_title) {
            echo '<h1 class="text-4xl md:text-[44px] font-light leading-[1.1em]">' . $hero_title . '</h1>';
          }
          ?>
          <?php
          if ($hero_text) {
            echo '<div class="text-base mt-4 md:text-lg">' . $hero_text . '</div>';
          }
          ?>
          <?php
          if ($hero_button) {
            echo '<div class="mt-8">
              <a href="' . $hero_button['url'] . '" class="btn btn-primary">' . $hero_button['title'] . '</a>
            </div>';
          }
          ?>
        </div>
      </div>
      <div class="absolute inset-0 z-0" style="<?php echo $hero_overlay_style ?>">
      </div>
    </div>
    <?php if ($enable_page_anchor_navigation) : ?>
      <section class="relative bg-brand-bluedark">
        <div class="container py-6 lg:py-12">
          <div class="flex justify-center">
            <div class="dropdown dropdown-end">
              <label tabindex="0" class="my-1 relative flex justify-between items-center text-xl lg:text-2xl text-white pb-3 border-b border-brand-redchili w-[240px] md:w-[460px]">
                <span>On this page</span>
                <div>
                  <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '32', 'class' => 'text-white rotate-90 h-6 md:h-8')); ?>
                </div>
              </label>
              <?php if ($anchor_list) : ?>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full">
                  <?php foreach ($anchor_list as $anchor) : ?>
                    <li><a href="#<?php echo $anchor['section_target_id'] ?>"><?php echo $anchor['navigation_title'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php if ($breadcrumbs) { ?>
      <div class="bg-brand-graylight">
        <div class="container mx-auto py-5">
          <?php
          if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div class="breadcrumb">', '</div>');
          }
          ?>
        </div>
      </div>
    <?php } ?>
  </section>
<?php endif; ?>