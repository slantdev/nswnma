<?php
$about_company = get_field('about_company', 'option');
$footer_links = get_field('footer_links', 'option');
$contact_info = get_field('contact_info', 'option');
$social_media = get_field('social_media', 'option');
$additional_links = get_field('additional_links', 'option');
?>
<footer class="bg-[#7C7C7C] text-white">

  <div class="container">
    <div class="py-4 border-b border-solid border-white/40 lg:py-8">
      <?php
      if ($footer_links) {
        echo '<div id="footer-menu" class="w-full">';
        echo '<ul id="menu-footer-menu" class="menu-ul">';
        foreach ($footer_links as $link) {
          echo '<li class="menu-item"><a href="' . $link['link']['url'] . '">' . $link['link']['title'] . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
      }
      ?>
    </div>

    <div class="flex flex-col py-8 gap-y-8 lg:flex-row lg:justify-between lg:items-center lg:py-10 lg:gap-x-16">
      <div class="lg:w-1/3">
        <?php if ($about_company) : ?>
          <div class="block">
            <img src="<?php echo nswnma_asset('images/nswnma-logo-white.png') ?>" alt="<?php echo get_bloginfo('name') ?>" class="w-[200px] xl:w-auto xl:h-[90px]">
          </div>
          <div class="text-xs mt-4">
            <?php echo $about_company ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="lg:w-2/3 lg:pt-8 lg:pl-10">
        <?php if ($contact_info) : ?>
          <div class="flex flex-col lg:flex-row gap-y-6 text-sm justify-between lg:gap-x-16">
            <?php foreach ($contact_info as $contact) : ?>
              <div class="w-full lg:w-1/2">
                <strong class="uppercase"><?php echo $contact['heading']; ?></strong><br />
                <?php echo $contact['address']; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="flex lg:gap-x-16 lg:justify-end">
          <div class="lg:w-1/2 lg:pl-8">
            <?php if ($social_media) : ?>
              <div class="mt-4">
                <div class="flex gap-x-2">
                  <?php if ($social_media['facebook']) : ?>
                    <a href="<?php echo $social_media['facebook']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($social_media['twitter']) : ?>
                    <a href="<?php echo $social_media['twitter']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'twitter', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($social_media['instagram']) : ?>
                    <a href="<?php echo $social_media['instagram']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'instagram', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($social_media['linkedin']) : ?>
                    <a href="<?php echo $social_media['linkedin']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($social_media['youtube']) : ?>
                    <a href="<?php echo $social_media['youtube']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'youtube', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($social_media['soundcloud']) : ?>
                    <a href="<?php echo $social_media['soundcloud']['url'] ?>" target="_blank" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                      <?php echo nswnma_icon(array('icon' => 'soundcloud', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($additional_links) : ?>
              <div class="mt-4">
                <div class="flex gap-x-8 text-sm">
                  <?php foreach ($additional_links as $link) : ?>
                    <a href="<?php echo $link['link']['url'] ?>" class="font-semibold hover:underline"><?php echo $link['link']['title'] ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-6 lg:py-8 text-center text-gray-500 text-sm">
    <div class="container max-w-[800px]">
      All content copyright &copy; <?php echo date_i18n('Y'); ?> NSW Nurses and Midwives' Association and authorised by S. Candish, General Secretary, NSW Nurses and Midwives' Association, 50 O'Dea Avenue Waterloo NSW 2017 Australia.
    </div>
  </div>

</footer>