<?php
$about_company = get_field('about_company', 'option');
$footer_links = get_field('footer_links', 'option');
$contact_info = get_field('contact_info', 'option');
$social_media = get_field('social_media', 'option');
$additional_links = get_field('additional_links', 'option');
?>
<footer class="bg-[#7C7C7C] text-white">

  <div class="container">
    <div class="py-8 border-b border-solid border-white/40">
      <?php
      if ($footer_links) {
        echo '<div id="footer-menu" class="hidden bg-gray-100 w-full mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block">';
        echo '<ul id="menu-footer-menu" class="menu-ul">';
        foreach ($footer_links as $link) {
          echo '<li class="menu-item"><a href="' . $link['link']['url'] . '">' . $link['link']['title'] . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
      }
      ?>
    </div>

    <div class="flex justify-between items-center py-10 gap-x-16">
      <div class="lg:w-1/3">
        <?php if ($about_company) : ?>
          <div class="block">
            <img src="<?php echo nswnma_asset('images/nswnma-logo-white.png') ?>" alt="<?php echo get_bloginfo('name') ?>" class="w-auto xl:h-[90px]">
          </div>
          <div class="text-xs mt-4">
            <?php echo $about_company ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="lg:w-2/3 pt-8 pl-10">
        <?php if ($contact_info) : ?>
          <div class="flex gap-x-16 text-sm justify-between">
            <?php foreach ($contact_info as $contact) : ?>
              <div class="w-1/2">
                <strong class="uppercase"><?php echo $contact['heading']; ?></strong><br />
                <?php echo $contact['address']; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="flex gap-x-16 justify-end">
          <div class="w-1/2 pl-8">
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

  <div class="bg-white py-8 text-center text-gray-500">
    Copyright &copy; <?php echo date_i18n('Y'); ?> NSW Nurses and Midwives’ Association
  </div>

</footer>