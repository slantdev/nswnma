<section class="bg-brand-graylight pb-10 overflow-hidden">
  <div class="home-slider--swiper relative">
    <div class="swiper-wrapper h-[500px]">
      <div class="swiper-slide w-full h-full relative">
        <div class="container relative z-10 h-full">
          <div class="w-3/4 bg-brand-blue bg-opacity-90 p-14 absolute -bottom-10 text-white">
            <div class="font-bold mb-4">FEATURED</div>
            <h3 class="h3 font-light">Better bargaining system will achieve wage growth and equity for female workers</h3>
            <div class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,.</div>
          </div>
        </div>
        <div class="absolute inset-0 z-0">
          <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
        </div>
      </div>
      <div class="swiper-slide w-full h-full relative">
        <div class="container relative z-10 h-full">
          <div class="w-3/4 bg-brand-blue bg-opacity-90 absolute -bottom-10 text-white">
            <div class="p-14">
              <div class="font-bold mb-4">FEATURED</div>
              <h3 class="h3 font-light">Better bargaining system will achieve wage growth and equity for female workers</h3>
              <div class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,.</div>
            </div>
          </div>
        </div>
        <div class="absolute inset-0 z-0">
          <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
        </div>
      </div>
      <div class="swiper-slide w-full h-full relative">
        <div class="container relative z-10 h-full">
          <div class="w-3/4 bg-brand-blue bg-opacity-90 absolute -bottom-10 text-white">
            <div class="p-14">
              <div class="font-bold mb-4">FEATURED</div>
              <h3 class="h3 font-light">Better bargaining system will achieve wage growth and equity for female workers</h3>
              <div class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,.</div>
            </div>
          </div>
        </div>
        <div class="absolute inset-0 z-0">
          <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
        </div>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 z-10">
      <div class="container">
        <div class="flex gap-x-4 justify-end py-4">
          <div class="home-slider--button-prev p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
            <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => 'rotate-180')); ?>
          </div>
          <div class="home-slider--button-next p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
            <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => '')); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container relative">
      <div class="w-1/4 absolute left-auto right-0 -bottom-[34px] pl-14">
        <div class="swiper-pagination home-slider--pagination"></div>
      </div>
    </div>
  </div>
  <script>
    const homeSlider = new Swiper('.home-slider--swiper', {
      loop: true,
      navigation: {
        nextEl: '.home-slider--button-next',
        prevEl: '.home-slider--button-prev',
      },
      pagination: {
        el: '.home-slider--pagination',
        clickable: true,
      },
      watchOverflow: true,
      slidesPerView: 1,
      centeredSlides: true,
      spaceBetween: 0,
    });
  </script>
</section>