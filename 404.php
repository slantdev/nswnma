<?php get_header(); ?>

<div class="container mx-auto my-8">

  <div class="md:flex py-8 lg:py-12">
    <div class="w-full md:w-1/2 flex items-center justify-center">
      <div class="max-w-lg m-8">
        <div class="text-5xl md:text-15xl text-gray-800 border-brand-blue border-b">404</div>
        <div class="w-16 h-1 my-3 md:my-4"></div>
        <p class="text-gray-800 text-2xl md:text-3xl font-light mb-8"><?php _e('Sorry, the page you are looking for could not be found.', 'nswnma'); ?></p>
        <a href="<?php echo get_bloginfo('url'); ?>" class="btn btn-primary">
          <?php _e('Go to Homepage', 'nswnma'); ?>
        </a>
      </div>
    </div>
  </div>

</div>

<?php
get_footer();
