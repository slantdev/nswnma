<?php

get_header();

get_template_part('template-parts/layouts/single-header');
?>

<div class="relative container mx-auto">

  <?php if (have_posts()) : ?>

    <?php
    while (have_posts()) :
      the_post();
    ?>

      <?php get_template_part('template-parts/singles/content', 'single'); ?>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

<?php
get_footer();
