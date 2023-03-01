<?php

/**
 * Template Name: Membership - Rights
 * Template Post Type: page
 *
 */
get_header();
?>

<!-- Page Title -->
<section class="relative py-24 min-h-[320px] bg-black">
  <div class="container relative z-10">
    <div class="prose">
      <h1 class="text-white text-[44px] font-light">Know Your Rights</h1>
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
      <a href="/">Home</a><span>/</span><a href="/">Membership</a><span>/</span><span class="font-bold">Know Your Rights</span>
    </div>
  </div>
</section>

<?php

function card_guides($atts = array())
{
  $atts = shortcode_atts(array(
    'image' => nswnma_asset('images/guides/virus.png'),
    'title'  => '',
    'download_url'  => '#',
    'bg_color'  => 'bg-[#7DBBC8]',
  ), $atts);
  $output = '';
  $output .= '<div>
    <div class="aspect-w-1 aspect-h-1">
      <div class="rounded-lg flex p-6 items-center justify-center shadow-lg ' . $atts['bg_color'] . '">
        <img src="' . $atts['image'] . '" alt="">
      </div>
    </div>
    <div class="pt-4 pb-4">
      <h4 class="text-xl font-medium text-brand-bluedark line-clamp-2 h-14">' . $atts['title'] . '</h4>
    </div>
    <div class="border-t flex gap-x-2 pt-[8px] hover:border-brand-bluedark hover:border-t-4 hover:pt-[5px]">
      <a href="' . $atts['download_url'] . '" class="inline-block text-gray-500 hover:text-brand-bluedark">
        ' . nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '
      </a>
      <a href="#" class="inline-block text-gray-500 hover:text-brand-bluedark">
      ' . nswnma_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '32', 'class' => '')) . '
      </a>
    </div>
  </div>';

  return $output;
};

?>
<!-- Download Guides -->
<section class="bg-white py-20">
  <div class="container">
    <div class="flex flex-col lg:flex-row lg:flex-nowrap">
      <div class="w-full lg:w-7/12">
        <h2 class="h3 text-brand-blue mb-8 mt-8">Know Your Rights</h2>
        <div class="prose xl:prose-lg">
          <p>It’s time to exercise your rights. Download these guides to know more about your legal rights in your Award.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-10">
    <h3 class="h5 text-brand-bluedark mb-6 font-bold">General guides</h3>
    <div class="grid grid-cols-4 gap-6">
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/virus.png'),
          'title'  => 'COVID-19 & Workers’ Compensation*',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#7DBBC8]',
        )
      );
      ?>
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/money.png'),
          'title'  => 'The Incremental Pay Scale',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#90429F]',
        )
      );
      ?>
    </div>
  </div>
  <div class="container py-10">
    <h3 class="h5 text-brand-bluedark mb-6 font-bold">Public Health System Nurses and Midwives</h3>
    <div class="grid grid-cols-4 gap-6">
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/virus.png'),
          'title'  => 'COVID-19 & Workers’ Compensation*',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#7DBBC8]',
        )
      );
      ?>
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/money.png'),
          'title'  => 'The Incremental Pay Scale',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#90429F]',
        )
      );
      ?>
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/virus.png'),
          'title'  => 'COVID-19 & Workers’ Compensation*',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#7DBBC8]',
        )
      );
      ?>
      <?php
      echo card_guides(
        array(
          'image' => nswnma_asset('images/guides/money.png'),
          'title'  => 'The Incremental Pay Scale',
          'download_url'  => '#',
          'bg_color'  => 'bg-[#90429F]',
        )
      );
      ?>
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