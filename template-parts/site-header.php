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

  <div class="bg-brand-grayplatinum relative z-40 pt-2">
    <div class="container">
      <?php
      // wp_nav_menu(
      //   array(
      //     'container_id'    => 'primary-menu',
      //     'container_class' => 'hidden bg-gray-100 w-full mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
      //     'menu_class'      => 'menu-ul',
      //     'theme_location'  => 'primary',
      //     'li_class'        => '',
      //     'fallback_cb'     => false,
      //     //'walker' => new Desktop_Menu_Walker(),
      //   )
      // );
      ?>
      <?php
      // $menu_items = get_field('menu_items', 'option');
      // //preint_r($menu_items);
      // if ($menu_items) {
      //   echo '<ul class="primary-menu">';
      //   foreach ($menu_items as $menu_id => $menu) :
      //     $menu_item = $menu['menu_item'];
      //     $has_submenu = $menu['has_submenu'];
      //     $submenu_alignment = $menu['submenu_alignment'];
      //     $menu_columns = $menu['menu_columns'];

      //     $submenu_alignment_class = '';
      //     switch ($submenu_alignment) {
      //       case "right":
      //         $submenu_alignment_class .= ' right-align';
      //         break;
      //       case "center":
      //         $submenu_alignment_class .= ' center-align';
      //         break;
      //       default:
      //         $submenu_alignment_class .= '';
      //     }

      //     if ($has_submenu) {
      //       echo '<li class="has-submenu ' . $submenu_alignment_class . '">';
      //       echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="block py-4 px-6 font-semibold text-brand-bluedark hover:text-brand-red transition duration-200">';
      //       echo $menu_item['title'];
      //       echo '</a>';
      //       echo '<div class="submenu">';
      //       echo '<div class="flex gap-8 rounded-md bg-white min-w-[240px] overflow-hidden">';
      //       if ($menu_columns) {
      //         foreach ($menu_columns as $col) {
      //           $background_color = $col['background_color'];
      //           $submenu = $col['submenu'];
      //           echo '<div class="column" style="background-color: ' . $background_color . ';">';
      //           foreach ($submenu as $menu) {
      //             $submenu_heading = $menu['submenu_heading'];
      //             $submenu_items = $menu['submenu_items'];
      //             echo '<div>';
      //             if ($submenu_heading) {
      //               echo '<h5 class="submenu-heading">' . $submenu_heading . '</h5>';
      //             }
      //             if ($submenu_items) {
      //               echo '<ul class="flex flex-col gap-y-2">';
      //               foreach ($submenu_items as $item) {
      //                 echo '<li><a href="' . $item['submenu_item']['url'] . '" target="' . $item['submenu_item']['target'] . '">' . $item['submenu_item']['title'] . '</a></li>';
      //               }
      //               echo '</ul>';
      //             }
      //             echo '</div>';
      //           }
      //           echo '</div>';
      //         }
      //       }
      //       echo '</div>';
      //       echo '</div>';
      //       echo '</li>';
      //     } else {
      //       echo '<li>';
      //       echo '<a href="' . $menu_item['url'] . '" target="' . $menu_item['target'] . '" class="block py-4 px-6 font-semibold text-brand-bluedark hover:text-brand-red transition duration-200">';
      //       echo $menu_item['title'];
      //       echo '</a>';
      //       echo '</li>';
      //     }
      //   //preint_r($menu_item);
      //   endforeach;
      //   echo '</ul>';
      // }
      ?>
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
      <!-- <ul class="mega-menu">
        <li class="has-submenu">
          <a href="#" class="">About Us</a>
          <div class="mega-submenu absolute left-0 w-full">
            <div class="container">
              <div class="flex">
                <div class="w-3/4 bg-brand-blue">
                  <div class="px-6 py-10">
                    <div class="grid grid-flow-col auto-cols-[1fr] gap-8">
                      <div class="flex flex-col gap-y-8">
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="flex flex-col gap-y-8">
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="flex flex-col gap-y-8">
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                        <div class="submenu">
                          <h5 class="submenu-heading">ABOUT NSWNMA</h5>
                          <ul>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="w-1/4 bg-brand-gray">
                  <div class="py-10 pl-10">
                    <div class="aspect-w-6 aspect-h-4">
                      <img src="http://localhost:3000/wp-content/uploads/2023/03/3957986.jpg" alt="" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="mt-4">
                      <h5 class="text-base font-semibold">About the NSWNMA</h5>
                      <div class="text-sm mt-3">
                        Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Vestibulum ullamcorper mauris at ligula.
                      </div>
                      <a href="" class="btn btn-primary mt-4">Learn</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li><a href="#">Membership</a></li>
        <li><a href="#">Campaigns</a></li>
        <li><a href="#">Education</a></li>
        <li><a href="#">Workplace</a></li>
        <li><a href="#">Publications</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul> -->
    </div>
  </div>
</header>