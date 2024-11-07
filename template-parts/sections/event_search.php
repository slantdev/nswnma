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
$headline = $section_intro['headline'] ?? '';
$description = $section_intro['description'] ?? '';
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">

    <?php if ($headline || $description) : ?>
      <div class="container">
        <div class="w-full lg:w-1/2">
          <?php if ($headline) : ?>
            <h2 class="h3 text-brand-bluedark font-medium mt-4 mb-6 md:my-8"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose mx-auto">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="container">
      <div class="flex flex-col gap-y-4">
        <div class="flex flex-col md:flex-row gap-y-3 gap-x-4 w-full items-center">
          <div class="w-full md:w-1/2">
            <input id="events-search" name="events-search" type="text" placeholder="Search Query" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-inner">
          </div>
          <div class="hidden md:block w-[24px] text-center flex-none">In</div>
          <div class="w-full md:w-1/2">
            <select id="events-suburb" name="events-suburb" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="all" selected>-- Suburb --</option>
              <?php
              $taxonomies = get_terms(array(
                'taxonomy' => 'event_suburb',
                'hide_empty' => true,
                //'hide_empty' => false,
                'orderby' => 'term_order'
              ));

              if (!empty($taxonomies)) :
                $output = '';
                foreach ($taxonomies as $category) {
                  $output .= '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                }
                echo $output;
              endif;
              ?>
            </select>
          </div>
        </div>
        <div class="flex flex-col md:flex-row gap-y-3 gap-x-4 w-full items-center">
          <div class="w-full md:w-1/2">
            <select id="events-topic" name="events-topic" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="all" selected>-- Topic --</option>
              <?php
              $taxonomies = get_terms(array(
                'taxonomy' => 'event_topic',
                'hide_empty' => true,
                //'hide_empty' => false,
                'orderby' => 'term_order'
              ));

              if (!empty($taxonomies)) :
                $output = '';
                foreach ($taxonomies as $category) {
                  $output .= '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                }
                echo $output;
              endif;
              ?>
            </select>
          </div>
          <div class="hidden md:block w-[24px] text-center flex-none"></div>
          <div class="w-full md:w-1/2">
            <select id="events-month" name="events-month" class="w-full p-4 rounded-lg border border-solid border-gray-200 bg-white shadow-md">
              <option value="all" selected>-- Month --</option>
              <?php
              $taxonomies = get_terms(array(
                'taxonomy' => 'event_month',
                //'hide_empty' => true,
                'hide_empty' => false,
                'orderby' => 'term_order'
              ));

              if (!empty($taxonomies)) :
                $output = '';
                foreach ($taxonomies as $category) {
                  $output .= '<option value="' . esc_attr($category->term_id) . '">' . esc_attr($category->name) . '</option>';
                }
                echo $output;
              endif;
              ?>
            </select>
          </div>
        </div>
        <div class="mt-5 mb-4 md:mb-0 flex items-center gap-x-4">
          <button id="events-search-button" type="button" class="btn btn-red !text-base !pr-10 !pl-4 !py-[8px] !inline-flex !flex-nowrap">
            <svg class="spinner-border animate-spin ml-0 mr-2 h-5 w-5 text-white opacity-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-20" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="inline-block ml-1">Search</span>
          </button>
          <button id="events-search-reset" class="text-brand-bluedark font-medium">Reset Search</button>
        </div>
      </div>
    </div>

  </div>
</section>