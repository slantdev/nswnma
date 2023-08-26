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
$accordion = get_sub_field('accordion');
?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container">
      <?php if ($headline) : ?>
        <div class="w-full lg:w-1/2">
          <h2 class="h3 text-brand-blue mb-8 mt-8"><?php echo $headline ?></h2>
        </div>
      <?php endif; ?>

      <div class="flex flex-col lg:flex-row lg:items-end">
        <?php if ($description) : ?>
          <div class="w-full lg:w-1/2">
            <div class="prose">
              <?php echo $description ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($section_intro['button_link']) : ?>
          <div class="w-full lg:w-1/2">
            <div class="flex mt-6 lg:mt-0 lg:justify-end"><a href="<?php echo $section_intro['button_link']['url'] ?>" class="btn btn-secondary"><?php echo $section_intro['button_link']['title'] ?></a></div>
          </div>
        <?php endif; ?>
      </div>

    </div>

    <?php if ($accordion) : ?>
      <?php
      $accordion_default_state = get_sub_field('accordion_default_state');
      ?>
      <section class="pt-12 pb-24">
        <div class="container">
          <?php foreach ($accordion as $key => $row) : ?>
            <div class="collapse collapse-plus bg-brand-graylight rounded-xl shadow-[0_3px_6px_rgba(0,0,0,0.16)] mb-6">
              <?php if ($accordion_default_state == 'closed') {
                echo '<input type="checkbox" />';
              } elseif ($accordion_default_state == 'first') {
                if ($key == 0) {
                  echo '<input type="checkbox" checked />';
                } else {
                  echo '<input type="checkbox" />';
                }
              } else {
                echo '<input type="checkbox" checked />';
              }
              ?>
              <div class="collapse-title text-xl lg:text-2xl font-bold py-5 pl-8 pr-12">
                <?php echo $row['title'] ?>
              </div>
              <div class="collapse-content">
                <div class="prose lg:prose-lg max-w-none">
                  <?php echo $row['content'] ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </section>
    <?php endif; ?>

  </div>
</section>