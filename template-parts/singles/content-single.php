<article id="post-<?php the_ID(); ?>" <?php post_class('py-12 xl:py-20'); ?>>
  <div class="flex flex-col lg:flex-row lg:flex-nowrap">
    <div class="w-full order-2 lg:order-1 lg:w-7/12">
      <div class="prose xl:prose-lg">
        <?php the_content(); ?>
      </div>
    </div>
    <?php
    $featured_image = get_the_post_thumbnail_url();
    if ($featured_image) : ?>
      <div class="w-full order-1 lg:order-2 lg:w-5/12">
        <div class="flex flex-col lg:pl-24">
          <div class="mb-4 xl:mb-8">
            <div class="aspect-w-6 aspect-h-7">
              <img src="<?php echo $featured_image ?>" alt="" class="rounded-lg object-cover h-full w-full">
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>

</article>