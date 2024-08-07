<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$placeholder = get_sub_field('placeholder');
$links = get_sub_field('links');


if ($placeholder) : ?>
  <section class="relative bg-brand-bluedark">
    <div class="container py-12">
      <div class="flex justify-center">
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="my-1 relative flex justify-between items-center text-2xl text-white pb-3 border-b border-brand-redchili w-[240px] md:w-[460px]">
            <?php if ($placeholder) : ?>
              <span><?php echo $placeholder ?></span>
            <?php else : ?>
              <span>On this page</span>
            <?php endif; ?>
            <div>
              <?php echo nswnma_icon(array('icon' => 'chevron', 'group' => 'utilities', 'size' => '32', 'class' => 'text-white rotate-90')); ?>
            </div>
          </label>
          <?php if ($links) : ?>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full">
              <?php
              foreach ($links as $link) :
                $link_url = $link['link']['url'] ?? '#';
                $link_title = $link['link']['title'] ?? '';
                if ($link_url && $link_title) :
              ?>
                  <li><a href="<?php echo $link_url ?>"><?php echo $link_title ?></a></li>
              <?php
                endif;
              endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>