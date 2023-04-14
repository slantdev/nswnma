<?php

/**
 * Template Name: Homepage
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Content Carousel -->
<section class="bg-brand-bluedark pb-10 overflow-hidden">
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

<!-- Site Navigation -->
<section class="relative bg-brand-bluedark">
  <div class="container py-12">
    <div class="flex justify-center">
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="m-1 relative flex justify-between items-center text-2xl w-[460px] text-brand-bluedark cursor-pointer border border-solid border-gray-300 bg-white py-3 pl-6 pr-3 rounded-md">
          <span>I'm looking for</span>
          <div>
            <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '32', 'class' => 'text-brand-bluedark rotate-90')); ?>
          </div>
        </label>
        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full">
          <li><a>Item 1</a></li>
          <li><a>Item 2</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Info Box with Filter -->
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

<!-- Text + Full Column Image -->
<section class="bg-white relative border-t border-solid">
  <div class="container">
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-1/2">
        <div class="py-8 lg:pr-16 lg:py-20">
          <h2 class="h3 text-brand-blue mb-8 mt-8">Why join NSWNMA?</h2>
          <div class="prose">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="mt-8">
            <a href="#" class="btn btn-primary">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="absolute top-0 right-0 bottom-0 left-1/2 h-full">
    <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
  </div>
</section>

<section class="bg-white relative">
  <div class="container">
    <div class="flex flex-col lg:flex-row lg:justify-end">
      <div class="w-full lg:w-1/2">
        <div class="py-8 lg:pl-16 lg:py-20">
          <h2 class="h3 text-brand-blue mb-8 mt-8">Become a member</h2>
          <div class="prose">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="mt-8">
            <a href="#" class="btn btn-primary">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="absolute top-0 right-1/2 bottom-0 left-0 h-full">
    <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
  </div>
</section>

<!-- Content Carousel -->
<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-blue mb-8 mt-8">Member benefits</h2>
    </div>
    <div class="flex flex-col lg:flex-row lg:items-end">
      <div class="w-1/2">
        <div class="prose">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="w-1/2">
        <div class="flex justify-end"><a href="#" class="btn btn-secondary">View More</a></div>
      </div>
    </div>
  </div>
  <div class="mt-10 overflow-x-hidden">
    <div class="content-carousel--swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide max-w-screen-xl">
          <div class="container">
            <div class="bg-white flex flex-col md:flex-row rounded-lg overflow-hidden shadow-xl">
              <div class="w-full md:w-4/12">
                <div class="p-4 md:p-8 lg:p-12">
                  <div class="text-sm font-bold mb-8">March 14th, 2019</div>
                  <h3 class="text-2xl text-brand-bluedark font-medium mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                  <div class="prose text-sm">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="mt-8">
                    <a href="#" class="font-medium text-brand-redchili hover:text-brand-red">Read The Story &raquo;</a>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-8/12">
                <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide max-w-screen-xl">
          <div class="container">
            <div class="bg-white flex flex-col md:flex-row rounded-lg overflow-hidden shadow-xl">
              <div class="w-full md:w-4/12">
                <div class="p-4 md:p-8 lg:p-12">
                  <div class="text-sm font-bold mb-8">March 14th, 2019</div>
                  <h3 class="text-2xl text-brand-bluedark font-medium mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                  <div class="prose text-sm">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="mt-8">
                    <a href="#" class="font-medium text-brand-redchili hover:text-brand-red">Read The Story &raquo;</a>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-8/12">
                <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide max-w-screen-xl">
          <div class="container">
            <div class="bg-white flex flex-col md:flex-row rounded-lg overflow-hidden shadow-xl">
              <div class="w-full md:w-4/12">
                <div class="p-4 md:p-8 lg:p-12">
                  <div class="text-sm font-bold mb-8">March 14th, 2019</div>
                  <h3 class="text-2xl text-brand-bluedark font-medium mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                  <div class="prose text-sm">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="mt-8">
                    <a href="#" class="font-medium text-brand-redchili hover:text-brand-red">Read The Story &raquo;</a>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-8/12">
                <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex gap-x-6 justify-center py-10">
        <div class="content-carousel--button-prev p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
          <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => 'rotate-180')); ?>
        </div>
        <div class="content-carousel--button-next p-3 rounded-full bg-white shadow-lg flex items-center justify-center cursor-pointer text-brand-bluedark hover:bg-brand-bluedark hover:text-white transition duration-300">
          <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '16', 'class' => '')); ?>
        </div>
      </div>
    </div>
    <script>
      const contentCarouselSwiper = new Swiper('.content-carousel--swiper', {
        loop: true,
        navigation: {
          nextEl: '.content-carousel--button-next',
          prevEl: '.content-carousel--button-prev',
        },
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 0,
      });
    </script>
  </div>
</section>

<!-- Latest News Grid -->
<section class="bg-white pt-20 pb-24">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8">Latest News</h2>
    </div>
    <div class="flex flex-col lg:flex-row lg:items-end">
      <div class="w-1/2">
        <div class="prose prose-lg">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="w-1/2">
        <div class="flex justify-end"><a href="#" class="btn btn-primary">View More</a></div>
      </div>
    </div>
  </div>
  <div class="container mt-12">
    <div class="flex gap-x-8">
      <div class="w-1/2">
        <div class="h-full w-full relative rounded-lg overflow-hidden shadow-[0_3px_10px_rgba(0,0,0,0.24)]">
          <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="absolute inset-0 object-cover h-full w-full z-0">
          <div class="w-full h-full bg-gradient-to-t from-black/80 to-transparent via-black/50 relative z-10 flex items-end">
            <div class="text-white p-4 md:p-8 lg:p-12">
              <div class="font-bold mb-6">March 14th, 2019</div>
              <h3 class="h3 font-medium mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
              <div class="prose prose-lg text-white">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="mt-6">
                <a href="#" class="btn btn-white hover:scale-105">Read More &raquo;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-1/2">
        <div class="flex flex-col gap-y-6 h-full">
          <a href="#" class="block bg-white rounded-[6px] shadow-[0_3px_10px_rgba(0,0,0,0.24)] border-b-[6px] border-brand-blue hover:border-brand-red transition duration-300">
            <div class="p-8 h-full flex gap-x-6 items-center">
              <div class="w-1/4">
                <div class="aspect-w-1 aspect-h-1">
                  <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full z-0 rounded-md">
                </div>
              </div>
              <div class="w-3/4">
                <div class="font-bold text-gray-400 mb-2">Nov 14th, 2022</div>
                <h5 class="h6 font-normal leading-snug">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut</h5>
              </div>
            </div>
          </a>
          <a href="#" class="block bg-white rounded-[6px] shadow-[0_3px_10px_rgba(0,0,0,0.24)] border-b-[6px] border-brand-blue hover:border-brand-red transition duration-300">
            <div class="p-8 h-full flex gap-x-6 items-center">
              <div class="w-1/4">
                <div class="aspect-w-1 aspect-h-1">
                  <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full z-0 rounded-md">
                </div>
              </div>
              <div class="w-3/4">
                <div class="font-bold text-gray-400 mb-2">Nov 14th, 2022</div>
                <h5 class="h6 font-normal leading-snug">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut</h5>
              </div>
            </div>
          </a>
          <a href="#" class="block bg-white rounded-[6px] shadow-[0_3px_10px_rgba(0,0,0,0.24)] border-b-[6px] border-brand-blue hover:border-brand-red transition duration-300">
            <div class="p-8 h-full flex gap-x-6 items-center">
              <div class="w-1/4">
                <div class="aspect-w-1 aspect-h-1">
                  <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full z-0 rounded-md">
                </div>
              </div>
              <div class="w-3/4">
                <div class="font-bold text-gray-400 mb-2">Nov 14th, 2022</div>
                <h5 class="h6 font-normal leading-snug">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Hero BG Image + Text -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="lg:w-7/12 pt-10">
      <h3 class="text-white text-[44px] leading-1.1 font-bold">Join over 74,000 nurses and midwives in NSW by becoming a valued member today.</h3>
      <p class="text-2xl text-white mt-4">You’ll automatically become a member of the Australian Nursing and Midwifery Federation</p>
      <div class="mt-8">
        <a href="#" class="btn btn-primary">View More</a>
      </div>
    </div>
  </div>
  <div class="absolute inset-0 w-full h-full z-0 bg-black">
    <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full opacity-60">
  </div>
</section>

<?php get_footer(); ?>