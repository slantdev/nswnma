<?php

/**
 * Template Name: Education - CPD
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Continuing Professional Development (CPD)</h1>
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
      <a href="/">Home</a><span>/</span><a href="/">Education</a><span>/</span><span class="font-bold">Continuing Professional Development (CPD)</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-bluedark mb-8 mt-8">Continuing Professional Development (CPD)</h2>
        <div class="prose xl:prose-lg">
          <p>The NSWNMA offers a range of workshops, study days and webinars throughout the year, as well as the stimulating Professional Day at each Annual Conference – members enjoy reduced rates. Search our education calendar for an event near you.</p>
          <p>Use this resource guide to assist in ensuring you meet your CPD requirements: Guide to Continuing Professional Development (CPD).</p>
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

<!-- Featured -->
<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-blue mb-8 mt-8">Featured</h2>
    </div>
    <div class="flex flex-col lg:flex-row lg:items-end">
      <div class="w-1/2">
        <div class="prose">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container my-12">
    <div class="bg-white flex flex-col md:flex-row rounded-lg overflow-hidden shadow-[0_3px_10px_rgba(0,0,0,0.24)]">
      <div class="w-full md:w-4/12">
        <div class="p-4 md:p-8 lg:p-12 h-full flex flex-col">
          <img src="<?php echo nswnma_asset('images/content/ilearn.jpg') ?>" alt="" class="mb-auto">
          <h3 class="text-2xl text-brand-bluedark font-medium mb-6">iLearn – FREE online Professional Education for NSWNMA members!</h3>
          <div class="prose text-sm">
            <p>Meeting your Continuing Professional Development (CPD) obligations is now even easier with iLearn – our online education portal.</p>
          </div>
        </div>
      </div>
      <div class="w-full md:w-8/12">
        <img src="<?php echo nswnma_asset('images/banner/page-banner.jpg') ?>" alt="" class="object-cover h-full w-full">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex">
      <div class="w-2/3">
        <div class="prose prose-lg">
          <h3 class="text-xl font-semibold text-brand-bluedark">Featuring:</h3>
          <ul>
            <li>
              FREE access to over 200 CPD modules online
            <li>
              Highly visual and interactive modules you can do at your own pace</li>
            <li>
              New modules added regularly</li>
            <li>
              Your own personalised ePortfolio and CPD tracker so you can provide evidence to the Nursing and Midwifery Board of Australia (NMBA) of participation in CPD annually.</li>
            </li>
          </ul>
          <p><strong>New users must create a ONE-TIME login to Member Central</strong></p>
          <p>The ANMF online Continuing Professional Education (CPE) portal is being phased out and will remain active until 1 November 2022. Members should complete any courses they are enrolled in and download their full CPD record before the close of the website. Find assistance on how to do this here or email education@anmf.org.au</p>
          <p>For all NSWNMA courses throughout the year, please refer to the Online Education Calendar. All courses may attract CPD hours. For enquiries, please contact the Association on 02 8595 1234 (metro) or 1300 367 962 (rural).</p>
        </div>
      </div>
      <div class="w-1/3 pl-24">
        <div class="flex flex-col gap-y-6">
          <a href="#" class="btn btn-primary">Login Via Member Central</a>
          <a href="#" class="btn btn-secondary">View Our eLearning Library</a>
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