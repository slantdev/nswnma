<article id="post-<?php the_ID(); ?>" <?php post_class('py-12 xl:py-20'); ?>>
  <div class="flex flex-col lg:flex-row lg:flex-nowrap">
    <div class="w-full order-2 lg:order-1 lg:w-7/12">
      <div class="prose xl:prose-lg">
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
        $multi_end_date_end_time = '';

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
          $multi_start_date = $multidate_event['start_date']['start_date'] ?? '';
          $multi_start_date_start_time = $multidate_event['start_date']['start_time'] ?? '';
          $multi_start_date_end_time = $multidate_event['start_date']['end_time'] ?? '';
          $multi_end_date = $multidate_event['end_date']['end_date'] ?? '';
          $multi_end_date_start_time = $multidate_event['end_date']['start_time'] ?? '';
          $multi_end_date_end_time = $multidate_event['end_date']['end_time'] ?? '';
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
          $single_event_date = $single_date_event['event_date'] ?? '';
          $single_start_time = $single_date_event['start_time'] ?? '';
          $single_end_time = $single_date_event['end_time'] ?? '';
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
        <div class="p-6 shadow rounded-lg border border-gray-200">
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
          <?php if ($registration_link) : ?>
            <div class="mt-8 inline-flex gap-4">
              <a href="<?php echo $registration_link['url'] ?>" target="<?php echo $registration_link['target'] ?>" class="btn btn-primary">Register</a>
            </div>
          <?php endif; ?>
        </div>
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