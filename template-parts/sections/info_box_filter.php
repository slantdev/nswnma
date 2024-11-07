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
$filters = get_sub_field('filters');
$enable_filter = $filters['enable_filter'] ?? '';
$filters_repeater = $filters['filters'] ?? '';
$info_boxes = get_sub_field('info_boxes');
$info_box = get_sub_field('info_box');
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <?php if ($section_intro) : ?>
        <div class="text-center mb-10">
          <?php if ($headline) : ?>
            <h2 class="h3 text-brand-bluedark"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose max-w-xl mx-auto my-10">
              <p><?php echo $description ?></p>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($enable_filter) : ?>
        <div class="info-box--filter flex gap-x-4 xl:justify-center overflow-x-auto pb-6 px-3">
          <?php if ($filters_repeater) : ?>
            <?php foreach ($filters_repeater as $key => $filter) : ?>
              <button data-target="<?php echo $filter['filter_slug'] ?>" class="info-box--filter-btn inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
                <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
                  <div class="indicator"></div>
                </div>
                <div class="whitespace-nowrap"><?php echo $filter['filter_text'] ?></div>
              </button>
            <?php endforeach ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($info_boxes) : ?>
        <div class="infobox-swipers">
          <?php if (is_admin()) : ?>
            <?php
            $assigned_filter_slug = $info_boxes[0]['assigned_filter_slug'];
            $info_box = $info_boxes[0]['info_box'];
            ?>
            <div id="infobox-swiper--<?php echo $assigned_filter_slug ?>" class="my-10">
              <div class="card-swiper swiper">
                <div class="swiper-wrapper grid grid-cols-1 md:grid-cols-3">
                  <?php foreach (array_slice($info_box, 0, 3) as $info) : ?>
                    <?php
                    $icon = $info['icon'] ?? '';
                    $icon_color = $info['icon_color'] ?? '';
                    $icon_style = '';
                    if ($icon_color) {
                      $icon_style .= 'color: ' . $icon_color . ';';
                    }
                    $title = $info['title'] ?? '';
                    $description = $info['description'] ?? '';
                    $button_link = $info['button_link'] ?? '';
                    ?>
                    <div class="swiper-slide">
                      <div class="mx-4 px-10 py-14 rounded-lg border border-solid text-center">
                        <?php if ($icon) : ?>
                          <div style="<?php echo $icon_style ?>">
                            <?php echo nswnma_icon(array("icon" => $icon, 'group' => 'content', 'size' => '60', 'class' => 'mx-auto')); ?>
                          </div>
                        <?php endif; ?>
                        <div class="my-4">
                          <?php if ($title) : ?>
                            <h4 class="text-xl leading-tight text-brand-blue mb-4"><?php echo $title ?></h4>
                          <?php endif; ?>
                          <?php if ($description) : ?>
                            <p class="text-gray-500 text-sm"><?php echo $description ?></p>
                          <?php endif; ?>
                        </div>
                        <?php if ($button_link) : ?>
                          <div>
                            <a href="<?php echo $button_link['url'] ?>" class="btn btn-primary"><?php echo $button_link['title'] ?></a>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="card-swiper--pagination mt-10 text-center"></div>
              </div>
            </div>
          <?php else : ?>
            <?php foreach ($info_boxes as $key => $row) : ?>
              <?php
              $assigned_filter_slug = $row['assigned_filter_slug'] ?? '';
              $info_box = $row['info_box'] ?? '';
              ?>
              <div id="infobox-swiper--<?php echo $assigned_filter_slug ?>" class="infobox-swiper my-10">
                <div class="card-swiper swiper infobox-swiper-<?php echo $key ?>">
                  <div class="swiper-wrapper">
                    <?php foreach ($info_box as $info) : ?>
                      <?php
                      $icon = $info['icon'] ?? '';
                      $icon_color = $info['icon_color'] ?? '';
                      $icon_style = '';
                      if ($icon_color) {
                        $icon_style .= 'color: ' . $icon_color . ';';
                      }
                      $title = $info['title'] ?? '';
                      $description = $info['description'] ?? '';
                      $button_link = $info['button_link'] ?? '';
                      ?>
                      <div class="swiper-slide">
                        <div class="mx-2 md:mx-4 px-6 py-10 lg:px-10 lg:py-14 rounded-lg border border-solid text-center">
                          <?php if ($icon) : ?>
                            <div style="<?php echo $icon_style ?>">
                              <?php echo nswnma_icon(array("icon" => $icon, 'group' => 'content', 'size' => '60', 'class' => 'mx-auto')); ?>
                            </div>
                          <?php endif; ?>
                          <div class="my-4">
                            <?php if ($title) : ?>
                              <h4 class="text-xl leading-tight text-brand-blue mb-4"><?php echo $title ?></h4>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                              <p class="text-gray-500 text-sm"><?php echo $description ?></p>
                            <?php endif; ?>
                          </div>
                          <?php if ($button_link) : ?>
                            <div>
                              <a href="<?php echo $button_link['url'] ?>" class="btn btn-primary"><?php echo $button_link['title'] ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="card-swiper--pagination mt-10 text-center"></div>
                </div>
                <script>
                  new Swiper('.infobox-swiper-<?php echo $key ?>', {
                    loop: false,
                    pagination: {
                      el: '.infobox-swiper-<?php echo $key ?> .card-swiper--pagination',
                      clickable: true,
                    },
                    watchOverflow: true,
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 0,
                    breakpoints: {
                      768: {
                        slidesPerView: 2,
                      },
                      1024: {
                        slidesPerView: 3,
                      },
                    },
                  });
                </script>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>