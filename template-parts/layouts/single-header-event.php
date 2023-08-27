<?php
/*
 * Single Page Header
 */
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
<section>
  <div class="relative bg-cover bg-no-repeat bg-[#5E7FB1]">
    <div class="container mx-auto h-full relative z-10 py-8 lg:py-10 lg:pt-12 lg:pb-8 xl:pt-28 xl:pb-20">
      <div class="md:w-3/4 lg:w-3/5 text-white">
        <?php
        $title = get_the_title();
        if ($title) {
          echo '<h1 class="text-4xl md:text-[44px] font-light leading-[1.1em]">' . $title . '</h1>';
        }
        ?>
        <div class="text-base md:text-lg mt-6 lg:mt-12">
          <div class="text-lg inline-block pt-3 border-t border-white"><?php echo $event_date ?></div>
        </div>
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