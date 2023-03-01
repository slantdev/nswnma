<?php

/**
 * Template Name: Membership - Benefits
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Member Advantage – NSWNMA Member Benefits program</h1>
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
      <a href="/">Home</a><span>/</span><a href="/">Membership</a><span>/</span><span class="font-bold">Member Benefits program</span>
    </div>
  </div>
</section>

<!-- Left Text + Right Image -->
<section>
  <div class="container py-20">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-bluedark mb-8 mt-8">Member Advantage – NSWNMA Member Benefits program</h2>
        <div class="prose xl:prose-lg">
          <p>As a member of the NSWNMA, you are eligible to access thousands of Member Advantage program benefits, from everyday savings on fuel and groceries, to wholesale pricing at The Good Guys, to discounts on dining out, gym memberships, movie tickets and much more.</p>
          <p>Everything to help you save on what you need and spoil yourself with what you want.</p>
          <p>Login to Member Central today and start saving!</p>
          <p><a href="#" class="btn btn-primary">Login to Member Central</a></p>
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

<section>
  <div class="container py-12 border-t">
    <img src="<?php echo nswnma_asset('images/content/member-advantage.jpg') ?>" alt="" class="">
  </div>
</section>

<!-- Featured -->
<section class="bg-brand-grayblue py-20">
  <div class="container">
    <div class="flex">
      <div class="w-2/3">
        <div class="prose prose-lg">
          <h3 class="text-2xl font-semibold text-brand-red">TANGIBLE BENEFITS:</h3>
          <p class="lead">Member Advantage benefits can make a real difference to your everyday life: from reducing your grocery bills or accessing a great deal on a new car, to using discounted theme park tickets to enjoying a day out with the kids.</p>
          <div class="mt-16">
            <h3 class="text-2xl font-semibold text-brand-bluedark">GIFT CARDS</h3>
            <p>One of the easiest ways to save is by taking advantage of discounted gift cards from hundreds of retailers around Australia.</p>
            <p>By purchasing exclusively discounted gift cards, and using them to pay for your everyday expenses, you can save hundreds of dollars. For example, the average family with two adults and two children aged between 5 and 14 spend $336 on their weekly grocery shop*. If you used Woolies or Coles gift cards purchased with a 4% discount to pay for these groceries, it could save you almost $700 a year.</p>
            <p>*Source: Budget Direct ‘Average grocery bill and cost of food in Australia’</p>
            <h3 class="text-2xl font-semibold text-brand-bluedark">TANGIBLE BENEFITS</h3>
            <p>Member Advantage benefits can make a real difference to your everyday life: from reducing your grocery bills or accessing a great deal on a new car, to using discounted theme park tickets to enjoying a day out with the kids.</p>
            <h3 class="text-2xl font-semibold text-brand-bluedark">THE GOOD GUYS</h3>
            <p>Whether you need a new fridge, bigger TV or harder working washing machine, you can access exclusive savings at The Good Guys Commercial through Member Advantage. From kitchen appliances to reverse-cycle air conditioners, you can jump online 24/7 and find what you need at the right price.</p>
            <p>The Good Guys Commercial will deliver your new purchase to your door and even arrange installation. Register for your free account through Member Central and talk to the dedicated Member Advantage commercial team.</p>
            <p>Member Advantage can help every member of the NSWNMA make the most of your dollars. Login and start browsing your benefits today!</p>
            <p><img src="<?php echo nswnma_asset('images/content/the-good-guys.jpg') ?>" alt="" class=""></p>
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