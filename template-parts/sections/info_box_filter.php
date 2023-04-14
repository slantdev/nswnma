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

if ($info_box) : ?>
  <section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
    <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
      <div class="container max-w-screen-xl">
        <div class="bg-brand-bluedark rounded-lg p-10 text-white">
          <?php if ($headline) : ?>
            <h3 class="text-[34px] font-semibold mb-6"><?php echo $headline ?></h3>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="text-lg font-medium">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
          <?php if ($form_shortcode) : ?>
            <?php echo do_shortcode($form_shortcode) ?>
          <?php else : ?>
            <div class="flex gap-x-6 mt-6">
              <input type="text" class="grow w-full text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Business Name">
              <input type="text" class="grow w-full text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Email">
              <input type="text" class="grow text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0" placeholder="Phone">
              <div class="flex-none"><button class="btn btn-yellow text-brand-bluedark">Download Now</button></div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="bg-white relative py-20">
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
</section>