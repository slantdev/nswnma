<?php

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function nswnma_nav_menu_add_li_class($classes, $item, $args, $depth)
{
  if (isset($args->li_class)) {
    $classes[] = $args->li_class;
  }

  if (isset($args->{"li_class_$depth"})) {
    $classes[] = $args->{"li_class_$depth"};
  }

  return $classes;
}

add_filter('nav_menu_css_class', 'nswnma_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function nswnma_nav_menu_add_submenu_class($classes, $args, $depth)
{
  if (isset($args->submenu_class)) {
    $classes[] = $args->submenu_class;
  }

  if (isset($args->{"submenu_class_$depth"})) {
    $classes[] = $args->{"submenu_class_$depth"};
  }

  return $classes;
}

add_filter('nav_menu_submenu_css_class', 'nswnma_nav_menu_add_submenu_class', 10, 3);

// Walkers
class Desktop_Menu_Walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
  {
    $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

    if ($args->walker->has_children) {
      //$output .= '<div class="flex justify-between">';
      $output .= '<div class="dropdown dropdown-hover">';

      //   <label tabindex="0" class="btn m-1">Hover</label>
      //   <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
      //     <li><a>Item 1</a></li>
      //     <li><a>Item 2</a></li>
      //   </ul>
      // </div>
    }

    if ($item->url && $item->url != '#') {
      $output .= '<a href="' . $item->url . '">';
    } else {
      $output .= '<span>';
    }

    $output .= $item->title;

    if ($item->url && $item->url != '#') {
      $output .= '</a>';
    } else {
      $output .= '</span>';
    }

    if ($args->walker->has_children) {
      $output .= '<button class="submenu-toggle inline-block w-6 h-6 bg-slate-100 rounded text-slate-500"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z"/></svg></button>';
      $output .= '</div>';
    }
  }
}
