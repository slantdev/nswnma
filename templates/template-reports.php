<?php

/**
 * Template Name: Publications - Reports
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">About us</h1>
      <div class="mt-8">
        <a href="#" class="btn btn-primary">Get in Touch</a>
      </div>
    </div>
  </div>
  <div class="absolute inset-0 w-full h-full z-0 bg-black">
    <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full opacity-70">
  </div>
</section>

<!-- Page Navigation -->
<section class="relative bg-brand-bluedark">
  <div class="container py-8">
    <div class="flex justify-center">
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="m-1 relative flex justify-between items-center text-2xl w-[460px] text-white">
          <span>On this page</span>
          <div>
            <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '32', 'class' => 'text-white rotate-90')); ?>
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

<!-- Breadcrumbs -->
<section class="bg-brand-graylight">
  <div class="container py-4">
    <div class="flex breadcrumbs">
      <a href="/">Home</a><span>/</span><span class="font-bold">About Us</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">About the NSWNMA</h2>
        <div class="prose xl:prose-lg">
          <p>The New South Wales Nurses and Midwives’ Association (NSWNMA) is the registered union for all nurses and midwives in New South Wales. The Association represents the industrial interests of nurses and midwives employed in NSW in the public, private, aged care and disability sectors. Our role is to protect the interests of nurses, midwives and the nursing and midwifery professions.</p>
          <p>The NSWNMA also represents and provides for the professional, educational and industrial welfare of nurses and midwives in government and non-government forums at state, national and international level.</p>
          <p>The NSWNMA has over 73,000 members and is affiliated to Unions NSW and the Australian Council of Trade Unions (ACTU).</p>
          <p>The NSWNMA works in association with the Australian Nursing and Midwifery Federation (ANMF). NSWNMA members are also members of the New South Wales Branch of the ANMF.</p>
          <p>All of our affiliations and sponsors can be found here.</p>
        </div>
      </div>
      <div class="w-full lg:w-5/12">
        <div class="flex flex-col pl-24">
          <div class="mb-4 xl:mb-8"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="rounded-lg"></div>
          <div class="flex flex-col divide-y divide-gray-300">
            <a class="inline-flex items-center gap-x-4 px-4 py-3 text-brand-bluedark text-xl font-medium cursor-pointer hover:text-brand-red">
              <div class="flex-none">
                <?php echo nswnma_icon(array('icon' => 'call', 'group' => 'utilities', 'size' => '36', 'class' => '')); ?>
              </div>
              <div>Contact Us</div>
            </a>
            <a class="inline-flex items-center gap-x-4 px-4 py-3 text-brand-bluedark text-xl font-medium cursor-pointer hover:text-brand-red">
              <div class="flex-none">
                <?php echo nswnma_icon(array('icon' => 'membership', 'group' => 'utilities', 'size' => '36', 'class' => '')); ?>
              </div>
              <div>Membership</div>
            </a>
            <a class="inline-flex items-center gap-x-4 px-4 py-3 text-brand-bluedark text-xl font-medium cursor-pointer hover:text-brand-red">
              <div class="flex-none">
                <?php echo nswnma_icon(array('icon' => 'campaign', 'group' => 'utilities', 'size' => '36', 'class' => '')); ?>
              </div>
              <div>Campaigns</div>
            </a>
            <a class="inline-flex items-center gap-x-4 px-4 py-3 text-brand-bluedark text-xl font-medium cursor-pointer hover:text-brand-red">
              <div class="flex-none">
                <?php echo nswnma_icon(array('icon' => 'education', 'group' => 'utilities', 'size' => '36', 'class' => '')); ?>
              </div>
              <div>Education</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Text + Full Column Image -->
<section class="bg-brand-grayblue relative">
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

<section class="bg-brand-grayblue relative">
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
<section class="bg-white py-20">
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