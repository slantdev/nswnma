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
$headline = $section_intro['headline'];
$description = $section_intro['description'];
$filters = get_sub_field('filters');
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
      <div class="flex gap-x-4 justify-center">
        <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
          <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
            <div class="w-[14px] h-[14px] bg-brand-blue rounded-full"></div>
          </div>
          <div class="whitespace-nowrap">I work in the public sector</div>
        </button>
        <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
          <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
            <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
          </div>
          <div class="whitespace-nowrap">I work in the private sector</div>
        </button>
        <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
          <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
            <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
          </div>
          <div class="whitespace-nowrap">I work in aged care</div>
        </button>
        <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
          <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
            <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
          </div>
          <div class="whitespace-nowrap">Just Browsing</div>
        </button>
      </div>
      <?php if ($info_box) : ?>
        <div class="my-10">
          <div class="card-swiper swiper">
            <div class="swiper-wrapper">
              <?php foreach ($info_box as $info) : ?>
                <?php
                $icon = $info['icon'];
                $icon_color = $info['icon_color'];
                $icon_style = '';
                if ($icon_color) {
                  $icon_style .= 'color: ' . $icon_color . ';';
                }
                $title = $info['title'];
                $description = $info['description'];
                $button_link = $info['button_link'];
                $assign_filter = $info['assign_filter'];
                $data_filter = json_encode($assign_filter);
                ?>
                <div class="swiper-slide" data-filter='<?php echo $data_filter ?>'>
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
          <script>
            const cardSwiper = new Swiper('.card-swiper', {
              loop: false,
              pagination: {
                el: '.card-swiper--pagination',
                clickable: true,
              },
              watchOverflow: true,
              slidesPerView: 3,
              centeredSlides: false,
              spaceBetween: 0,
            });
          </script>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- <section class="bg-white relative py-20">
  <div class="container">
    <div class="text-center mb-10">
      <h2 class="h3 text-brand-bluedark">Welcome to NSWNMA</h2>
      <div class="prose max-w-xl mx-auto my-10">
        <p>Nurses and midwives across NSW are committed to advocating for healthier and stronger communities</p>
      </div>
    </div>
    <div class="flex gap-x-4 justify-center">
      <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
        <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
          <div class="w-[14px] h-[14px] bg-brand-blue rounded-full"></div>
        </div>
        <div class="whitespace-nowrap">I work in the public sector</div>
      </button>
      <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
        <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
          <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
        </div>
        <div class="whitespace-nowrap">I work in the private sector</div>
      </button>
      <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
        <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
          <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
        </div>
        <div class="whitespace-nowrap">I work in aged care</div>
      </button>
      <button class="inline-flex items-center py-3 px-6 rounded-full bg-white shadow-[0_3px_6px_rgba(0,0,0,0.16)] cursor-pointer hover:shadow-[0_6px_12px_rgba(0,0,0,0.2)] transition duration-200">
        <div class="flex-none shadow-[inset_0_3px_6px_rgba(0,0,0,0.16)] bg-brand-graylight w-6 h-6 mr-4 rounded-full flex items-center justify-center">
          <div class="w-[14px] h-[14px] bg-brand-blue rounded-full hidden"></div>
        </div>
        <div class="whitespace-nowrap">Just Browsing</div>
      </button>
    </div>
    <div class="my-10">
      <div class="card-swiper swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="mx-4 px-10 py-14 rounded-lg border border-solid text-center">
              <div>
                <?php echo nswnma_icon(array('icon' => 'education', 'group' => 'utilities', 'size' => '60', 'class' => 'text-brand-bludark mx-auto')); ?>
              </div>
              <div class="my-4">
                <h4 class="text-xl leading-tight text-brand-blue mb-4">Membership</h4>
                <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
              </div>
              <div class="">
                <a href="#" class="btn btn-primary">View More</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mx-4 px-10 py-14 rounded-lg border border-solid text-center">
              <div>
                <?php echo nswnma_icon(array('icon' => 'education', 'group' => 'utilities', 'size' => '60', 'class' => 'text-brand-bludark mx-auto')); ?>
              </div>
              <div class="my-4">
                <h4 class="text-xl leading-tight text-brand-blue mb-4">Membership</h4>
                <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
              </div>
              <div class="">
                <a href="#" class="btn btn-primary">View More</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mx-4 px-10 py-14 rounded-lg border border-solid text-center">
              <div>
                <?php echo nswnma_icon(array('icon' => 'education', 'group' => 'utilities', 'size' => '60', 'class' => 'text-brand-bludark mx-auto')); ?>
              </div>
              <div class="my-4">
                <h4 class="text-xl leading-tight text-brand-blue mb-4">Membership</h4>
                <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
              </div>
              <div class="">
                <a href="#" class="btn btn-primary">View More</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mx-4 px-10 py-14 rounded-lg border border-solid text-center">
              <div>
                <?php echo nswnma_icon(array('icon' => 'education', 'group' => 'utilities', 'size' => '60', 'class' => 'text-brand-bludark mx-auto')); ?>
              </div>
              <div class="my-4">
                <h4 class="text-xl leading-tight text-brand-blue mb-4">Membership</h4>
                <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
              </div>
              <div class="">
                <a href="#" class="btn btn-primary">View More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-swiper--pagination mt-10 text-center"></div>
      </div>
      <script>
        const cardSwiper = new Swiper('.card-swiper', {
          loop: false,
          pagination: {
            el: '.card-swiper--pagination',
            clickable: true,
          },
          watchOverflow: true,
          slidesPerView: 3,
          centeredSlides: false,
          spaceBetween: 0,
        });
      </script>
    </div>
  </div>
</section> -->