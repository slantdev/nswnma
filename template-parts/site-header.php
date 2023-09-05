<header class="site-header fixed z-50 w-full bg-white xl:relative">

  <div class="container">
    <div class="flex justify-between items-center py-3 lg:py-6">
      <a href="/" class="block">
        <img src="<?php echo nswnma_asset('images/nswnma-logo.png') ?>" alt="<?php echo get_bloginfo('name') ?>" class="w-auto h-[48px] xl:h-[90px]">
      </a>
      <div class="flex justify-between items-center gap-x-4">
        <?php
        $member_login_button = get_field('member_login_button', 'option');
        if ($member_login_button) {
          echo '<div class="hidden xl:block">';
          echo '<a href="' . $member_login_button['url'] . '" class="btn btn-primary">' . $member_login_button['title'] . '</a>';
          echo '</div>';
        }
        ?>
        <div class="hidden xl:block relative">
          <form id="header-searchform" class="" method="get" action="<?php echo site_url('/'); ?>">
            <input id="searchform-input" type="text" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : '' ?>" placeholder="Search the site for" class="bg-white rounded-md border border-solid border-gray-300 pl-4 pr-7 w-72 focus:border-brand-blue">
            <button type="button" class="absolute right-0 top-0 p-2.5">
              <?php echo nswnma_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '22', 'class' => 'text-brand-bluedark')); ?>
            </button>
          </form>
        </div>

        <button type="button" id="mobilemenu-open" class="p-2 text-black xl:hidden">
          <svg class="w-8 h-8" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 6H21V8H3V6ZM3 11H21V13H3V11ZM3 16H21V18H3V16Z" fill="currentColor" />
          </svg>
        </button>

      </div>
    </div>
  </div>

  <div class="hidden xl:block bg-brand-grayplatinum relative z-40 pt-2">
    <div class="container">
      <?php
      $menu_items = get_field('megamenu_items', 'option');
      //preint_r($menu_items);
      if ($menu_items) {
        echo '<ul class="mega-menu">';
        foreach ($menu_items as $menu_id => $menu) :
          $menu_item = $menu['menu_item'];
          $has_submenu = $menu['has_submenu'];
          $menu_columns = $menu['menu_columns'];
          $add_featured_text = $menu['add_featured_text'];
          $featured_text = $menu['featured_text'];
          $has_featured_text_class = '';
          if ($add_featured_text) {
            $has_featured_text_class = 'has-featured-text';
          }

          if ($has_submenu) {
            echo '<li class="has-submenu">';
            echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="">';
            echo $menu_item['title'];
            echo '</a>';
            echo '<div class="mega-submenu ' . $has_featured_text_class . '">';
            echo '<div class="container">';
            echo '<div class="flex">';
            $submenu_column_class = 'w-full';
            if ($add_featured_text && $featured_text) {
              $submenu_column_class = 'w-3/4';
            }
            echo '<div class="bg-brand-blue ' . $submenu_column_class . '">';
            echo '<div class="px-6 py-10">';
            if ($menu_columns) {
              echo '<div class="grid grid-flow-col auto-cols-[1fr] gap-8">';
              foreach ($menu_columns as $col) {
                $submenu = $col['submenu'];
                echo '<div class="flex flex-col gap-y-10">';
                foreach ($submenu as $menu) {
                  $submenu_heading = $menu['submenu_heading'];
                  $submenu_items = $menu['submenu_items'];
                  echo '<div class="submenu">';
                  if ($submenu_heading) {
                    echo '<h5 class="submenu-heading">' . $submenu_heading . '</h5>';
                  }
                  if ($submenu_items) {
                    echo '<ul class="flex flex-col">';
                    foreach ($submenu_items as $item) {
                      echo '<li><a href="' . $item['submenu_item']['url'] . '" target="' . $item['submenu_item']['target'] . '">' . $item['submenu_item']['title'] . '</a></li>';
                    }
                    echo '</ul>';
                  }
                  echo '</div>';
                }
                echo '</div>';
              }
              echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            if ($add_featured_text && $featured_text) {
              $image = $featured_text['image'];
              $title = $featured_text['title'];
              $description = $featured_text['description'];
              $button = $featured_text['button'];
              echo '<div class="w-1/4 bg-brand-gray">';
              echo '<div class="py-10 pl-10">';
              if ($image) {
                echo '<div class="aspect-w-6 aspect-h-4">';
                echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" class="w-full h-full object-cover rounded-lg">';
                echo '</div>';
              }
              if ($title) {
                echo '<div class="mt-4">';
                echo '<h5 class="text-base font-semibold">' . $title . '</h5>';
                echo '</div>';
              }
              if ($description) {
                echo '<div class="text-sm mt-3">' . $description . '</div>';
              }
              if ($button) {
                echo '<a href="' . $button['url'] . '" class="btn btn-primary mt-4">' . $button['title'] . '</a>';
              }
              echo '</div>';
              echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
          } else {
            echo '<li>';
            echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="">';
            echo $menu_item['title'];
            echo '</a>';
            echo '</li>';
          }
        //preint_r($menu_item);
        endforeach;
        echo '</ul>';
      }
      ?>
    </div>
  </div>

  <div id="mobilemenu" class="h-screen w-[300px] bg-brand-grayplatinum fixed top-0 right-0 px-6 pr-2 pt-20 z-50 translate-x-full transition duration-300 ease-in-out">
    <button id="mobilemenu-close" type="button" class="absolute top-3 right-3 text-black/70 hover:text-white transition duration-200">
      <svg class="w-8 h-8" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="currentColor" />
      </svg>
    </button>
    <div class="h-full overflow-y-auto">
      <?php
      $menu_items = get_field('megamenu_items', 'option');
      //preint_r($menu_items);
      if ($menu_items) {
        echo '<div class="menumobile flex flex-col gap-4 pr-4">';
        foreach ($menu_items as $menu_id => $menu) :
          $menu_item = $menu['menu_item'];
          $has_submenu = $menu['has_submenu'];
          $menu_columns = $menu['menu_columns'];
          $add_featured_text = $menu['add_featured_text'];
          $featured_text = $menu['featured_text'];
          $has_featured_text_class = '';
          if ($add_featured_text) {
            $has_featured_text_class = 'has-featured-text';
          }
          if ($has_submenu) {
            echo '<div class="collapse collapse-arrow">';
            //echo '<input type="radio" name="mobilemenu-accordion" />';
            echo '<input type="checkbox" />';
            echo '<div class="collapse-title text-base font-medium">';
            //echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="">';
            echo $menu_item['title'];
            //echo '</a>';
            echo '</div>';
            if ($menu_columns) {
              echo '<div class="collapse-content bg-brand-blue !p-0">';
              echo '<div class="grid grid-cols-1 gap-4 py-6 p-4">';
              foreach ($menu_columns as $col) {
                $submenu = $col['submenu'];
                echo '<div class="flex flex-col gap-y-6">';
                foreach ($submenu as $menu) {
                  $submenu_heading = $menu['submenu_heading'];
                  $submenu_items = $menu['submenu_items'];
                  echo '<div class="submenu">';
                  if ($submenu_heading) {
                    echo '<h5 class="text-base text-white font-semibold mb-2">' . $submenu_heading . '</h5>';
                  }
                  if ($submenu_items) {
                    echo '<ul class="flex flex-col">';
                    foreach ($submenu_items as $item) {
                      echo '<li><a class="text-base text-white" href="' . $item['submenu_item']['url'] . '" target="' . $item['submenu_item']['target'] . '">' . $item['submenu_item']['title'] . '</a></li>';
                    }
                    echo '</ul>';
                  }
                  echo '</div>';
                }
                echo '</div>';
              }
              echo '</div>';
              echo '</div>';
            }
            echo '</div>';
          } else {
            echo '<div class="bg-white rounded-md p-4 font-medium">';
            echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="">';
            echo $menu_item['title'];
            echo '</a>';
            echo '</div>';
          }
        //preint_r($menu_item);
        endforeach;

        $member_login_button = get_field('member_login_button', 'option');
        if ($member_login_button) {
          echo '<div class="mt-8">';
          echo '<a href="' . $member_login_button['url'] . '" class="btn btn-primary btn-block !py-4">' . $member_login_button['title'] . '</a>';
          echo '</div>';
        }

        echo '<div class="relative">';
        echo '<form id="header-searchform" class="" method="get" action="' . esc_url(home_url('/')) . '">';
        echo '<input id="searchform-input" type="text" name="s" value="' . isset($_GET['s']) ? esc_attr($_GET['s']) : '' . '" placeholder="Search the site for" class="bg-white rounded-md border border-solid border-gray-300 pl-4 py-4 pr-7 w-full focus:border-brand-blue">';
        echo '<button type="button" class="absolute right-0 top-2 p-2.5">';
        echo nswnma_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '22', 'class' => 'text-brand-bluedark'));
        echo '</button>';
        echo '</form>';
        echo '</div>';

        echo '</div>';
      }
      ?>
    </div>
  </div>
  <div id="mobilemenu-overlay" tabindex="0" class="fixed inset-0 bg-black/80 z-40 invisible opacity-0 transition duration-300"></div>

</header>