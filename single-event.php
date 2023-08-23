<?php

get_header();

get_template_part('template-parts/layouts/single-header-event');
?>

<div class="relative container mx-auto">

  <?php if (have_posts()) : ?>

    <?php
    while (have_posts()) :
      the_post();
    ?>

      <?php get_template_part('template-parts/singles/content', 'event'); ?>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

<?php
get_footer();
