<?php

/**
 * Template Name: About - Council
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Council of the NSW Nurses and Midwives’ Association</h1>
      <div class="mt-8">
        <a href="#" class="btn btn-primary">Get in Touch</a>
      </div>
    </div>
  </div>
  <div class="absolute inset-0 w-full h-full z-0 bg-black">
    <img src="<?php echo nswnma_asset('images/banner/page-banner-3.jpg') ?>" alt="" class="object-cover h-full w-full opacity-70">
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
      <a href="/">Home</a><span>/</span><a href="/">About Us</a><span>/</span><span class="font-bold">Council of the NSW Nurses and Midwives’ Association</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">Council of the NSW Nurses and Midwives’ Association</h2>
        <div class="prose xl:prose-lg">
          <p>The Council of the NSW Nurses and Midwives’ Association consists of 23 members: the General Secretary, Assistant General Secretary and 21 delegates elected from the Committee of Delegates.</p>
          <p>The Councillors are elected by the membership for a four-year term, with the General Secretary and Assistant General Secretary being full-time paid officers and the 21 members elected from the membership.</p>
          <p>The NSWNMA Council acts as the Committee of Management responsible for:</p>
          <ul>
            <li>the oversight of day-to-day management (which is undertaken by the General Secretary and Assistant General Secretary)</li>
            <li>ensuring the implementation of policy as determined by Annual Conference and </li>
            <li>ensuring the deliverance of the Rules and Objectives of the NSWNMA.</li>
          </ul>
        </div>
      </div>
      <div class="w-full lg:w-5/12">
        <div class="flex flex-col pl-24">
          <div class="mb-4 xl:mb-8"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="rounded-lg"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Grid -->
<section class="pb-24">
  <div class="container">
    <div class="mb-10">
      <h5 class="text-lg text-brand-bluedark font-semibold">Click here for Council of Australian Nursing and Midwifery Federation (NSW Branch)</h5>
    </div>
    <div class="grid grid-cols-3 gap-8">
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
      <a class="block bg-white shadow-lg rounded-md border-b-[6px] border-transparent cursor-pointer hover:border-brand-blue hover:shadow-2xl transition duration-300">
        <div class="py-10 max-w-[256px] mx-auto">
          <div class="max-h-[256px] max-w-[256px] mx-auto">
            <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden"><img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full"></div>
          </div>
          <div class="mt-6">
            <h5 class="font-light text-2xl leading-snug">Shaye Candish</h5>
            <div class="font-bold text-lg mt-6">General Secretary, NSW Nurses and Midwives’ Association</div>
            <div class="text-lg mt-6">RN, Bachelor of Nursing, Post Graduate Certificate in Emergency Nursing</div>
          </div>
        </div>
      </a>
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
    <img src="<?php echo nswnma_asset('images/banner/page-banner-2.jpg') ?>" alt="" class="object-cover h-full w-full opacity-60">
  </div>
</section>

<?php get_footer(); ?>