<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$hero_slider = get_sub_field('hero_slider');

if ($hero_slider) : ?>
  <section class="bg-brand-bluedark pb-10 overflow-hidden relative">
    <div class="home-slider--swiper relative">
      <div class="absolute bottom-0 left-0 right-0">
        <div class="container relative">
          <div class="absolute -bottom-10 left-10 md:right-0 md:bottom-0">
            <div class="flex gap-x-4 justify-end pb-4 relative z-[5]">
              <div class="home-slider--button-prev p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
                <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => 'rotate-180')); ?>
              </div>
              <div class="home-slider--button-next p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
                <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => '')); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-wrapper h-[580px]">
        <?php if (is_admin()) : ?>
          <?php
          $slide_image = $hero_slider[0]['slide_image'];
          $bg_overlay = $hero_slider[0]['bg_overlay'];
          $headline = $hero_slider[0]['headline'];
          $description = $hero_slider[0]['description'];
          $buttons = $hero_slider[0]['buttons'];
          $link = $hero_slider[0]['link'];

          $overlay_style = '';
          if ($bg_overlay) {
            $overlay_style = 'background-color: ' . $bg_overlay;
          }
          ?>
          <div class="swiper-slide w-full h-full relative z-0">
            <?php if ($slide_image) : ?>
              <div class="absolute inset-0 z-0">
                <img src="<?php echo $slide_image['url'] ?>" alt="" class="object-cover h-full w-full">
              </div>
            <?php endif; ?>
            <div class="container relative h-full">
              <div class="slide-textbox w-4/5 md:w-3/4 bg-brand-blue bg-opacity-90 p-6 lg:p-14 absolute z-20 bottom-20 md:-bottom-10 text-white">
                <div class="font-bold mb-4">FEATURED</div>
                <?php if ($headline) : ?>
                  <h3 class="h3 text-white font-light"><?php echo $headline ?></h3>
                <?php endif; ?>
                <?php if ($description) : ?>
                  <div class="mt-4 md:mt-6"><?php echo $description ?></div>
                <?php endif; ?>
                <?php if ($link) : ?>
                  <div class="mt-4 md:mt-6"><a href="<?php echo $link['url'] ?>" class="btn btn-secondary"><?php echo $link['title'] ?></a></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php else : ?>
          <?php foreach ($hero_slider as $slide) : ?>
            <?php
            $slide_image = $slide['slide_image'];
            $bg_overlay = $slide['bg_overlay'];
            $headline = $slide['headline'];
            $description = $slide['description'];
            $buttons = $slide['buttons'];
            $link = $slide['link'];

            $overlay_style = '';
            if ($bg_overlay) {
              $overlay_style = 'background-color: ' . $bg_overlay;
            }
            ?>
            <div class="swiper-slide w-full h-full relative z-0">
              <?php if ($slide_image) : ?>
                <div class="absolute inset-0 z-0">
                  <img src="<?php echo $slide_image['url'] ?>" alt="" class="object-cover h-full w-full">
                </div>
              <?php endif; ?>
              <div class="container relative h-full">
                <div class="slide-textbox w-11/12 md:w-3/4 bg-brand-blue bg-opacity-90 p-6 pb-20 md:p-8 lg:p-14 absolute z-20 -bottom-10 text-white">
                  <div class="font-bold mb-4">FEATURED</div>
                  <?php if ($headline) : ?>
                    <h3 class="h3 font-light"><?php echo $headline ?></h3>
                  <?php endif; ?>
                  <?php if ($description) : ?>
                    <div class="mt-4 md:mt-6"><?php echo $description ?></div>
                  <?php endif; ?>
                  <?php if ($link) : ?>
                    <div class="mt-4 md:mt-6"><a href="<?php echo $link['url'] ?>" class="btn btn-secondary"><?php echo $link['title'] ?></a></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <?php if (!is_admin()) : ?>
        <div class="container relative hidden md:block">
          <div class="w-1/3 md:w-1/4 absolute left-auto right-0 -bottom-[34px] md:pl-14">
            <div class="swiper-pagination home-slider--pagination"></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php if (!is_admin()) : ?>
      <script>
        const homeSlider = new Swiper('.home-slider--swiper', {
          loop: true,
          watchOverflow: true,
          slidesPerView: 1,
          centeredSlides: true,
          spaceBetween: 0,
          effect: 'fade',
          speed: 1000,
          autoplay: {
            delay: 8000,
          },
          navigation: {
            nextEl: '.home-slider--button-next',
            prevEl: '.home-slider--button-prev',
          },
          pagination: {
            el: '.home-slider--pagination',
            clickable: true,
          },
        });
      </script>
    <?php endif; ?>
  </section>
<?php endif; ?>