<?php

/**
 * Template Name: Campaigns - Safer
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Safer hospitals = safer communities</h1>
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
      <a href="/">Home</a><span>/</span><a href="/">Campaigns</a><span>/</span><span class="font-bold">Safer hospitals = safer communities</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">Safer hospitals = safer communities</h2>
        <div class="prose xl:prose-lg">
          <p>After two years of hearings and submissions, a NSW parliamentary committee has handed down its report into Health outcomes and access to health and hospital services in rural, regional, and remote New South Wales. </p>

          <p>Dozens of NSWNMA members wrote submissions and shared stories as witnesses during the inquiry, revealing the shocking state of a regional and rural health system severely neglected by the NSW government. It’s evident how urgently we need safe staffing ratios.</p>

          <p>All 44 recommendations contained in the report are important steps towards implementing change however, there are nine recommendations that specifically relate to nurses and midwives, listed at the end of this page.</p>

          <p>These recommendations are a result of NSWNMA members using your voices. Currently, these are only recommendations put forward by the parliamentary committee. The NSW government will determine what recommendations it will adopt in their response to the full report, but they have until November to do this.</p>

          <p>Regional and rural communities should not have to wait any longer. We cannot allow the NSW government to delay implementing any of these proposals. These recommendations are the first step to addressing many problems faced by regional and rural health facilities, but the introduction of a nursing and midwifery ratios system is critical to resolving the staffing crisis. </p>

          <p><strong>We need safe staffing and safe working conditions in regional and rural hospitals, including:</strong></p>

          <p>a minimum of 3 nurses on all shifts, including 2 registered nurses; and staffing enhancements available when a there are no visiting medical officers available and where hospitals are reliant on virtual medical officer coverage.</p>
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

<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-bluedark mb-8 mt-8">Please sign our petition below:</h2>
    </div>
  </div>
  <div class="container">
    <div class="flex">
      <div class="w-2/5">
        <div class="prose xl:prose-lg">
          <p><strong>Safer Hospitals = Safer Communities</strong></p>
          <p>I support safe staffing and safe working conditions in regional and rural hospitals, including:</p>
          <ul>
            <li>a minimum of 3 nurses on all shifts, including 2 registered nurses; and</li>
            <li>staffing enhancements accessible when there are no visiting medical officers available and where hospitals are reliant on virtual medical officer coverage</li>
          </ul>
        </div>
      </div>
      <div class="w-3/5 pl-16">
        <div class="flex flex-col gap-y-4">
          <div class="flex gap-x-4 w-full">
            <div class="w-1/2">
              <label for="" class="block mb-1">First Name *</label>
              <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
            <div class="w-1/2">
              <label for="" class="block mb-1">Last Name *</label>
              <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
            </div>
          </div>
          <div>
            <label for="" class="block mb-1">Email *</label>
            <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
          </div>
          <div>
            <label for="" class="block mb-1">Phone *</label>
            <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
          </div>
          <div>
            <label for="" class="block mb-1">Post Code *</label>
            <input type="text" class="w-full rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
          </div>
          <div class="mt-5">
            <button class="btn btn-red">SUBMIT</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Accordion -->
<section class="bg-white py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-bluedark mb-8 mt-8">Inquiry recommendations specific to nursing and midwifery:</h2>
    </div>
  </div>
  <section class="pt-12 pb-24">
    <div class="container">
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          Recommendation 1
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          Recommendation 2
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          Recommendation 3
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
    </div>
  </section>
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