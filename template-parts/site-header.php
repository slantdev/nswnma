<header>

  <div class="container">
    <div class="flex justify-between items-center py-6">
      <a href="/" class="block">
        <img src="<?php echo nswnma_asset('images/nswnma-logo.png') ?>" alt="<?php echo get_bloginfo('name') ?>" class="w-auto xl:h-[90px]">
      </a>
      <div class="flex justify-between items-center gap-x-4">
        <div>
          <a href="#" class="btn btn-primary">Member Login</a>
        </div>
        <div>
          <div class="relative">
            <input type="text" value="" placeholder="Search the site for" class="bg-white rounded-md border border-solid border-gray-300 pl-4 pr-7 w-72 focus:border-brand-blue">
            <button type="button" class="absolute right-0 top-0 p-2.5">
              <?php echo nswnma_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '22', 'class' => 'text-brand-bluedark')); ?>
            </button>
          </div>
        </div>
        <div class="lg:hidden">
          <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
            <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                <g id="icon-shape">
                  <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                </g>
              </g>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="navbar bg-brand-grayplatinum">
    <div class="container">
      <?php
      wp_nav_menu(
        array(
          'container_id'    => 'primary-menu',
          'container_class' => 'hidden bg-gray-100 w-full mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
          'menu_class'      => 'menu-ul',
          'theme_location'  => 'primary',
          'li_class'        => '',
          'fallback_cb'     => false,
          //'walker' => new Desktop_Menu_Walker(),
        )
      );
      ?>
    </div>
  </div>
</header>