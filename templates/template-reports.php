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
      <h1 class="text-white text-[44px] font-light">Reports</h1>
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

<section class="bg-white py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8">Reports</h2>
    </div>
  </div>
  <div class="container">
    <div class="flex flex-col gap-y-4">
      <div class="flex gap-x-4 w-full items-center">
        <div class="w-1/2">
          <input type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
        </div>
        <div class="w-[24px] text-center flex-none">In</div>
        <div class="w-1/2">
          <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
            <option value="">Filter</option>
          </select>
        </div>
        <div class="ml-2">
          <button class="btn btn-red !text-base !px-10 !py-4">SEARCH</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-14">
    <div class="grid grid-cols-3 gap-6">
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
      <div class="bg-brand-bluedark rounded-lg p-4 shadow-lg">
        <div class="aspect-w-4 aspect-h-5">
          <img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="pt-8">
          <div class="flex justify-between">
            <div class="text-white text-xl">November 2022</div>
            <div><a href="#" class="inline-block text-white opacity-80 hover:opacity-100"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured -->
<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="flex">
      <div class="w-2/3">
        <div class="prose prose-lg">
          <div class="mt-16">
            <h3 class="text-2xl font-semibold text-brand-bluedark">Australian Nursing and Midwifery Federation reports/factsheets</h3>
            <ul>
              <li>Aged Care Staffing Levels and Skills Mix Project December 2016</li>
              <li>Aussie values – worth fighting and voting for – an ANMF discussion paper on the Abbott Government’s 2013-14 Commission of Audit June-July 2014</li>
              <li>‘What Nurses Want’ – the first national survey on nurses’ attitudes to work in Australia</li>
              <li>Primary health care in Australia | A nursing and midwifery consensus view</li>
              <li>Ensuring quality, safety and positive patient outcomes | Why investing in nursing makes $ense</li>
              <li>Balancing risk and safety for our community | Unlicensed workers in the health and aged care system</li>
              <li>Access Economics Report on Nurses in Residential Aged Care</li>
              <li>ANMF Fact Sheet No. 1: Snapshot of the Australian Nursing Federation</li>
              <li>ANMF Fact Sheet No. 2: Snapshot of nursing in Australia</li>
              <li>ANMF Fact Sheet No. 3: Snapshot of nursing careers, qualifications and experience</li>
              <li>ANMF Fact Sheet No. 4: Snapshot of aged care</li>
              <li>ANMF Fact Sheet No. 5: Snapshot of nursing roles in primary health care</li>
              <li>ANMF Fact Sheet No. 6: Snapshot of nurse practitioners in Australia</li>
              <li>ANMF Fact Sheet No. 7: Snapshot of general practice nurses in Australia</li>
              <li>ANMF submissions</li>
              <li>ANMF policies, guidelines and position statements</li>
            </ul>
          </div>
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