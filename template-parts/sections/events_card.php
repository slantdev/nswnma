<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_intro = get_sub_field('section_intro');
$headline = $section_intro['headline'];
$description = $section_intro['description'];
$posts = get_sub_field('posts');
$event_taxonomy = $posts['event_taxonomy'];
$posts_per_page = $posts['posts_per_page'];
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($headline || $description) : ?>
      <div class="container">
        <div class="text-center">
          <?php if ($headline) : ?>
            <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose mx-auto">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php
    if (!$posts_per_page) {
      $posts_per_page = -1;
    }
    if (is_admin()) {
      $posts_per_page = 1;
    }
    if ($event_taxonomy) {
      $args = array(
        'post_type' => 'event',
        'posts_per_page' => $posts_per_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $event_taxonomy
          )
        )
      );
    } else {
      $args = array(
        'post_type' => 'event',
        'posts_per_page' => $posts_per_page,
      );
    }
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
      <div class="container mt-14">
        <div class="grid grid-cols-1 gap-y-10">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            $id = get_the_ID();
            $set_multidate_event = get_field('set_multidate_event', $id);
            $single_event_date = '';
            $single_start_time = '';
            $single_end_time = '';
            $multi_start_date = '';
            $multi_start_date_start_time = '';
            $multi_start_date_end_time = '';
            $multi_end_date = '';
            $multi_end_date_start_time = '';
            $multi_end_dateend_time = '';

            $location = get_field('location', $id);
            $cpd_hours = get_field('cpd_hours', $id);
            $cost = get_field('cost', $id);
            $registration_link = get_field('registration_link', $id);

            $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
            $img_src = get_the_post_thumbnail_url($id, 'large');
            $title =  get_the_title();
            $date =  get_the_date();
            $link = get_the_permalink();

            $event_date = '';
            if ($set_multidate_event) {
              $multidate_event = get_field('multidate_event', $id);
              $multi_start_date = $multidate_event['start_date']['start_date'];
              $multi_start_date_start_time = $multidate_event['start_date']['start_time'];
              $multi_start_date_end_time = $multidate_event['start_date']['end_time'];
              $multi_end_date = $multidate_event['end_date']['end_date'];
              $multi_end_date_start_time = $multidate_event['end_date']['start_time'];
              $multi_end_date_end_time = $multidate_event['end_date']['end_time'];
              if ($multi_start_date) {
                $event_date .= $multi_start_date;
              }
              if ($multi_start_date_start_time) {
                $event_date .= ' (' . $multi_start_date_start_time;
              }
              if ($multi_start_date_end_time) {
                $event_date .= ' - ' . $multi_start_date_end_time . ')';
              } else {
                $event_date .= ')';
              }
              if ($multi_end_date) {
                $event_date .= ' - ' . $multi_end_date;
              }
              if ($multi_end_date_start_time) {
                $event_date .= ' (' . $multi_end_date_start_time;
              }
              if ($multi_end_date_end_time) {
                $event_date .= ' - ' . $multi_end_date_end_time . ')';
              } else {
                $event_date .= ')';
              }
            } else {
              $single_date_event = get_field('single_date_event', $id);
              $single_event_date = $single_date_event['event_date'];
              $single_start_time = $single_date_event['start_time'];
              $single_end_time = $single_date_event['end_time'];
              if ($single_event_date) {
                $event_date .= $single_event_date;
              }
              if ($single_start_time) {
                $event_date .= ' (' . $single_start_time;
              }
              if ($single_end_time) {
                $event_date .= ' - ' . $single_end_time . ')';
              } else {
                $event_date .= ')';
              }
            }
            ?>
            <div class="border rounded-md p-10 bg-slate-50">
              <div class="flex gap-x-10">
                <div class="w-1/2">
                  <h3 class="h4 text-brand-blue mb-8 mt-2 tracking-tight leading-snug font-bold"><?php echo $title ?></h3>
                  <div class="prose prose-lg">
                    <div><?php echo $event_date ?></div>
                    <div class="mt-8">
                      <?php if ($location) : ?>
                        <strong>Location:</strong> <?php echo $location ?><br />
                      <?php endif; ?>
                      <?php if ($cpd_hours) : ?>
                        <strong>CPD Hours:</strong> <?php echo $cpd_hours ?><br />
                      <?php endif; ?>
                      <?php if ($cost) : ?>
                        <strong>Cost:</strong> <?php echo $cost ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ($registration_link) : ?>
                    <div class="mt-8">
                      <a href="<?php echo $registration_link['url'] ?>" class="btn btn-primary">Register</a>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="w-1/2">
                  <div class="aspect-w-6 aspect-h-4"><img src="<?php echo $img_src ?>" alt="" class="w-full h-full object-cover rounded-lg"></div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</section>