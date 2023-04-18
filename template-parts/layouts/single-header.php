<?php
/*
 * Single Page Header
 */
?>
<section>
  <div class="relative bg-cover bg-no-repeat bg-[#5E7FB1]">
    <div class="container mx-auto h-full relative z-10 py-6 lg:py-10 lg:pt-12 lg:pb-8 xl:pt-28 xl:pb-20">
      <div class="md:w-3/4 lg:w-3/5 text-white">
        <?php
        $title = get_the_title();
        if ($title) {
          echo '<h1 class="text-4xl md:text-[44px] font-light leading-[1.1em] mb-4">' . $title . '</h1>';
        }
        ?>
        <div class="text-lg mt-12"><time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-lg inline-block pt-3 border-t border-white">Posted on <?php echo get_the_date(); ?></time></div>
      </div>
    </div>
  </div>
</section>

<div class="bg-brand-graylight py-6">
  <div class="container max-w-screen-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<div class="breadcrumb">', '</div>');
    }
    ?>
  </div>
</div>