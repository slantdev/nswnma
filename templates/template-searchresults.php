<?php

/**
 * Template Name: Search Results
 * Template Post Type: page
 *
 */

get_header();

$s = get_search_query();
$args = array(
  's' => $s
);

global $post;
$search_query = isset($_GET['searchwp']) ? sanitize_text_field($_GET['searchwp']) : null;
$search_page  = isset($_GET['swppg']) ? absint($_GET['swppg']) : 1;

$search_results    = [];
$search_pagination = '';
if (!empty($search_query) && class_exists('\\SearchWP\\Query')) {
  $searchwp_query = new \SearchWP\Query($search_query, [
    'engine' => 'default', // The Engine name.
    'fields' => 'all',          // Load proper native objects of each result.
    'page'   => $search_page,
  ]);

  $search_results = $searchwp_query->get_results();

  $search_pagination = paginate_links(array(
    'format'  => '?swppg=%#%',
    'current' => $search_page,
    'total'   => $searchwp_query->max_num_pages,
  ));
}
?>

<section>
  <div class="relative bg-cover bg-no-repeat bg-[#5E7FB1]">
    <div class="container mx-auto h-full relative z-10 py-6 lg:py-10 lg:pt-12 lg:pb-8 xl:pt-28 xl:pb-20">
      <div class="md:w-3/4 lg:w-3/5 text-white">
        <h1 class="text-4xl md:text-[44px] font-light leading-[1.1em] mb-4">Search Results : <?php echo $search_query ?></h1>
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


<div class="bg-slate-50">
  <div class="container mx-auto max-w-4xl relative py-16 lg:py-24">
    <ul class="search-results">
      <?php if ($s == 'lamp' || $s == 'the lamp') : ?>
        <li class="mb-4 lg:mb-8">
          <a href="https://thelamp.com.au" target="_blank" class="block bg-white shadow-md border border-gray-200 rounded-lg transition duration-300 hover:shadow-xl">
            <div class="flex flex-wrap md:flex-nowrap">
              <div class="w-full flex p-4 lg:p-8">
                <div class="grow pr-4 lg:pr-8">
                  <h3 class="font-bold text-brand-bluedark mb-2 text-xl lg:text-2xl">The Lamp</h3>
                  <div class="text-sm">The Lamp is the magazine of the NSW Nurses and Midwives’ Association. It is published bi-monthly and mailed to every member of the Association.</div>
                </div>
                <div class="flex-none"><?php echo nswnma_icon(array('icon' => 'external-link', 'group' => 'utilities', 'size' => '32', 'class' => '')) ?></div>
              </div>
            </div>
          </a>
        </li>
      <?php endif; ?>
      <?php
      if (!empty($search_query) && !empty($search_results)) :
      ?>
        <?php foreach ($search_results as $search_result) : ?>
          <?php
          //preint_r($search_result);
          $post = $search_result;
          $show_post = TRUE;
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
              } else {
                $show_post = FALSE;
              }
            }
          } else {
            $link = get_the_permalink();
            $target = '_self';
          }

          ?>
          <?php if ($show_post) : ?>
            <li class="mb-4 lg:mb-8">
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
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
        <?php if ($searchwp_query->max_num_pages > 1) : ?>
          <div class="navigation pagination" role="navigation">
            <h2 class="screen-reader-text">Results navigation</h2>
            <div class="nav-links"><?php echo wp_kses_post($search_pagination); ?></div>
          </div>
        <?php endif; ?>

      <?php elseif (!empty($search_query)) : ?>
        <li class="mb-4 lg:mb-8">
          <div class="block bg-white shadow-md border border-gray-200 rounded-lg transition duration-300 hover:shadow-xl">
            <div class="w-full flex p-4 lg:p-8">
              <div class="text-center"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
            </div>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </div>



</div>

<?php
get_footer();
