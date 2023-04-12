<?php

/**
 * Template Name: Education - Calendar
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Education calendar</h1>
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
      <a href="/">Home</a><span>/</span><a href="/">Education</a><span>/</span><span class="font-bold">Education calendar</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">Education calendar</h2>
        <div class="prose xl:prose-lg">
          <p>Register online to receive email confirmation of your registration. Click “Register” next to the course you’re interested in.</p>
          <p>Visitors to Association offices will be required to meet NSW Health COVID-19 vaccination requirements as current at the time of the visit.</p>
          <p>Unless otherwise stated in the description, our webinars are not recorded or sent to registrants following each session. Our webinars are restricted to Australia only – whilst Zoom will allow international people to register, it will prevent joining on the day. </p>
          <p>For more information on courses or queries regarding undertaking CPD, contact the Association: metro (02) 8595 1234 or from rural 1300 367 962.</p>
          <div class="mt-8 flex gap-x-5">
            <a href="#" class="btn btn-primary">Login to iLearn</a>
            <a href="#" class="btn btn-primary">Check out iLearn Library modules</a>
          </div>
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

<!-- Education Events -->
<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="w-1/2">
      <h2 class="h3 text-brand-bluedark font-medium mb-8 mt-8">Search Education Events</h2>
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
            <option value="">Suburb</option>
          </select>
        </div>
      </div>
      <div class="flex gap-x-4 w-full items-center">
        <div class="w-1/2">
          <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
            <option value="">Topic</option>
          </select>
        </div>
        <div class="w-[24px] text-center flex-none"></div>
        <div class="w-1/2">
          <select name="" id="" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
            <option value="">Month</option>
          </select>
        </div>
      </div>
      <div class="mt-5 flex items-center gap-x-4">
        <button class="btn btn-red">SEARCH</button><button class="text-brand-bluedark font-medium">Reset Search</button>
      </div>
    </div>
  </div>
</section>

<section class="bg-white py-20">
  <div class="container">
    <div class="text-center">
      <h2 class="h3 text-brand-blue mb-8 mt-8">Events</h2>
      <div class="prose mx-auto">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
  </div>

  <div class="container mt-14">
    <div class="grid grid-cols-1 gap-y-10">
      <div class="border rounded-md p-10 bg-slate-50">
        <div class="flex gap-x-10">
          <div class="w-1/2">
            <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold">Delegate Skills – Association Member Training</h3>
            <div class="prose prose-lg">
              <div>15 November 2022 | 10:00am - 4:00pm</div>
              <div class="mt-8">
                <strong>Location:</strong> Waterloo<br />
                <strong>CPD Hours:</strong> NA<br />
                <strong>Cost:</strong> Free
              </div>
            </div>
            <div class="mt-8">
              <a href="#" class="btn btn-primary">Register</a>
            </div>
          </div>
          <div class="w-1/2">
            <div class="aspect-w-6 aspect-h-4"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
          </div>
        </div>
      </div>
      <div class="border rounded-md p-10 bg-slate-50">
        <div class="flex gap-x-10">
          <div class="w-1/2">
            <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold">Delegate Skills – Association Member Training</h3>
            <div class="prose prose-lg">
              <div>15 November 2022 | 10:00am - 4:00pm</div>
              <div class="mt-8">
                <strong>Location:</strong> Waterloo<br />
                <strong>CPD Hours:</strong> NA<br />
                <strong>Cost:</strong> Free
              </div>
            </div>
            <div class="mt-8">
              <a href="#" class="btn btn-primary">Register</a>
            </div>
          </div>
          <div class="w-1/2">
            <div class="aspect-w-6 aspect-h-4"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
          </div>
        </div>
      </div>
      <div class="border rounded-md p-10 bg-slate-50">
        <div class="flex gap-x-10">
          <div class="w-1/2">
            <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold">Delegate Skills – Association Member Training</h3>
            <div class="prose prose-lg">
              <div>15 November 2022 | 10:00am - 4:00pm</div>
              <div class="mt-8">
                <strong>Location:</strong> Waterloo<br />
                <strong>CPD Hours:</strong> NA<br />
                <strong>Cost:</strong> Free
              </div>
            </div>
            <div class="mt-8">
              <a href="#" class="btn btn-primary">Register</a>
            </div>
          </div>
          <div class="w-1/2">
            <div class="aspect-w-6 aspect-h-4"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
          </div>
        </div>
      </div>
      <div class="border rounded-md p-10 bg-slate-50">
        <div class="flex gap-x-10">
          <div class="w-1/2">
            <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold">Delegate Skills – Association Member Training</h3>
            <div class="prose prose-lg">
              <div>15 November 2022 | 10:00am - 4:00pm</div>
              <div class="mt-8">
                <strong>Location:</strong> Waterloo<br />
                <strong>CPD Hours:</strong> NA<br />
                <strong>Cost:</strong> Free
              </div>
            </div>
            <div class="mt-8">
              <a href="#" class="btn btn-primary">Register</a>
            </div>
          </div>
          <div class="w-1/2">
            <div class="aspect-w-6 aspect-h-4"><img src="<?php echo nswnma_asset('images/placeholder/img-01.jpg') ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
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