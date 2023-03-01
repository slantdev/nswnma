<?php

/**
 * Template Name: Membership - Why
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Why Join NSWNMA</h1>
      <div class="mt-8">
        <a href="#" class="btn btn-primary">Get in Touch</a>
      </div>
    </div>
  </div>
  <div class="absolute inset-0 w-full h-full z-0 bg-black">
    <img src="<?php echo nswnma_asset('images/banner/page-banner-2.jpg') ?>" alt="" class="object-cover h-full w-full opacity-70">
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
      <a href="/">Home</a><span>/</span><a href="/">Membership</a><span>/</span><span class="font-bold">Why join</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">Why join</h2>
        <div class="prose xl:prose-lg">
          <p>Our members, in the public, private and aged care sectors, have together achieved great gains for nurses and midwives in NSW. By becoming a member, you add to the collective strength of our 70,000+ membership.</p>
          <p>You’ll share the benefits of belonging and can participate in the wide range of Association activities – as often or as little as you choose. Membership is also fully tax deductible!</p>
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

<!-- Text + Full Column Image -->
<section class="bg-brand-grayblue relative">
  <div class="container">
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-1/2">
        <div class="py-8 lg:pr-16 lg:py-20">
          <h2 class="h3 text-brand-blue mb-8 mt-8">Why can join?</h2>
          <div class="prose">
            <ul>
              <li>Registered Nurse/Midwife</li>
              <li>Enrolled Nurse</li>
              <li>Trainee Enrolled Nurse</li>
              <li>Assistant in Nursing/Assistant in Midwifery</li>
              <li>Associate Member (Student of Nursing/Midwifery)</li>
            </ul>
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
    <img src="<?php echo nswnma_asset('images/banner/page-banner-3.jpg') ?>" alt="" class="object-cover h-full w-full">
  </div>
</section>

<!-- Accordion -->
<section class="bg-white py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-blue mb-8 mt-8">Benefits of your membership</h2>
    </div>
    <div class="flex flex-col lg:flex-row lg:items-end">
      <div class="w-1/2">
        <div class="prose">
          <p>In this section, read about the many benefits of membership, our current contests and promotions, what students get from free associate membership, Association merchandise and activist training.</p>
        </div>
      </div>
    </div>
  </div>
  <section class="pt-12 pb-24">
    <div class="container">
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          1. Legal safety net
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          2. Journey Accident Insurance
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
      <div tabindex="0" class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
        <div class="collapse-title text-2xl font-bold py-5 pl-8 pr-12">
          3. Workplace health and safety
        </div>
        <div class="collapse-content">
          <p>Membership offers the security of knowing that if you need assistance with a situation arising from work, eg. workers compensation, coroner’s inquest or professional disciplinary hearings, we will provide you with appropriate legal representation.</p>
        </div>
      </div>
    </div>
  </section>
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
          <h4>Membership Fees 2022:</h4>
          <p><img src="<?php echo nswnma_asset('images/content/membership-fees.jpg') ?>" alt="" class=""></p>
          <p>Membership fees are tax deductible<br />
            +Trainee AIN’s have fees waived for the duration of their traineeship<br />
            ^Students working in a nursing role undertaking fulltime studies in an undergraduate Bachelor of Nursing/Midwifery or Diploma of Nursing for the duration of the bachelor/diploma
            *All membership fees include GST</p>
          <h4>More questions before joining?</h4>
          <p>If you are not yet a member and would like us to contact you, please email membership@nswnma.asn.au or call us on 02 8595 1234.</p>
          <h4>Why Join? resources</h4>
          <p>Download a Why Join? brochure to distribute to colleagues.</p>
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