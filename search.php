<?php

get_header();

$s = get_search_query();
$args = array(
  's' => $s
);

?>

<section>
  <div class="relative bg-cover bg-no-repeat bg-[#5E7FB1]">
    <div class="container mx-auto h-full relative z-10 py-6 lg:py-10 lg:pt-12 lg:pb-8 xl:pt-28 xl:pb-20">
      <div class="md:w-3/4 lg:w-3/5 text-white">
        <h1 class="text-4xl md:text-[44px] font-light leading-[1.1em] mb-4">Search Results : <?php echo $s ?></h1>
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

<?php
// The Query
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
?>
  <div class="bg-slate-50">
    <div class="container mx-auto max-w-4xl relative py-16 lg:py-24">
      <ul class="search-results">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li class="mb-4 lg:mb-8">
            <?php
            //preint_r($post);
            $post_type = $post->post_type;
            //echo $post_type;
            if ($post_type == 'submission' || $post_type == 'policy') {
              $id = $post->ID;
              $submission_pdf = get_field('submission_pdf', $id);
              $external_link_submission = get_field('external_link_submission', $id);
              $target = '_blank';
              if ($submission_pdf) {
                $link = $submission_pdf['url'];
              } else {
                if ($external_link_submission) {
                  $link = $external_link_submission;
                }
              }
            } else {
              $link = get_the_permalink();
              $target = '_self';
            }

            ?>
            <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="block bg-white shadow-md border border-gray-200 rounded-lg transition duration-300 hover:shadow-xl">
              <div class="flex flex-wrap md:flex-nowrap">
                <?php if ($post_type == 'submission' || $post_type == 'policy') : ?>
                  <div class="w-full flex p-4 lg:p-8">
                    <div class="grow pr-4 lg:pr-8">
                      <h3 class="font-bold text-brand-bluedark mb-2 text-xl lg:text-2xl"><?php the_title(); ?></h3>
                    </div>
                    <div class="flex-none"><?php echo nswnma_icon(array('icon' => 'download', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></div>
                  </div>
                <?php else : ?>
                  <div class="w-full p-4 lg:p-8">
                    <h3 class="font-bold text-brand-bluedark mb-2 text-xl lg:text-2xl"><?php the_title(); ?></h3>
                    <div class="text-sm"><?php the_excerpt() ?></div>
                  </div>
                <?php endif; ?>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <div class="container mx-auto max-w-4xl relative py-16 lg:py-24">
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
  <?php endif; ?>

  </div>

  <?php
  get_footer();
