<footer class="bg-[#7C7C7C] text-white">

  <div class="container">
    <div class="py-8 border-b border-solid border-white/40">
      <?php
      wp_nav_menu(
        array(
          'container_id'    => 'footer-menu',
          'container_class' => 'hidden bg-gray-100 w-full mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
          'menu_class'      => 'menu-ul',
          'theme_location'  => 'footer',
          'li_class'        => '',
          'fallback_cb'     => false,
        )
      );
      ?>
    </div>

    <div class="flex justify-between items-center py-10 gap-x-16">
      <div class="lg:w-1/3">
        <div class="block">
          <img src="<?php echo nswnma_asset('images/nswnma-logo-white.png') ?>" alt="<?php echo get_bloginfo('name') ?>" class="w-auto xl:h-[90px]">
        </div>
        <div class="text-xs mt-4">
          The New South Wales Nurses and Midwives’ Association operates in accordance with the Privacy Act 1988 and the Australian Privacy Principles. For further details please refer to our Privacy Policy (last update Oct 2019) or contact the Association. Information provided by members on this forum will be handled and used in accordance with those Principles. Members have the right to request access to or correct any personal information concerning themselves held by the Association.
        </div>
      </div>
      <div class="lg:w-2/3 pt-8 pl-10">
        <div class="flex gap-x-12 text-sm justify-between">
          <div>
            <div class="mb-4">
              <strong class="uppercase">Sydney office</strong><br />
              50 O’Dea Avenue, Waterloo, NSW 2017<br />
              (Limited visitor parking available underground)
            </div>
            <div>
              <strong>Metro tel:</strong> (02) 8595 1234<br />
              <strong>Regional tel:</strong> 1300 367 962<br />
              <strong>Fax:</strong> (61 2) 9662 1414<br />
              <strong>Email:</strong> gensec@nswnma.asn.au
            </div>
          </div>
          <div>
            <div class="mb-4">
              <strong class="uppercase">Hunter office</strong><br />
              8-14 Telford Street, Newcastle East, <br />
              NSW 2300
            </div>
            <div>
              <strong>Metro tel:</strong> (02) 8595 1234<br />
              <strong>Regional tel:</strong> 1300 367 962
            </div>
            <div class="mt-10">
              <div class="flex gap-x-2">
                <a href="#" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                  <?php echo nswnma_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                </a>
                <a href="#" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                  <?php echo nswnma_icon(array('icon' => 'twitter', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                </a>
                <a href="#" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                  <?php echo nswnma_icon(array('icon' => 'instagram', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                </a>
                <a href="#" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                  <?php echo nswnma_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                </a>
                <a href="#" class="flex justify-center items-end text-white p-2 rounded-full bg-gray-600 hover:bg-gray-700 text-white/70 hover:text-white">
                  <?php echo nswnma_icon(array('icon' => 'youtube', 'group' => 'social', 'size' => '22', 'class' => '')); ?>
                </a>
              </div>
            </div>
            <div class="mt-8">
              <div class="flex gap-x-10">
                <a href="#" class="font-semibold hover:underline">Disclaimer</a>
                <a href="#" class="font-semibold hover:underline">Privacy</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-8 text-center text-gray-500">
    Copyright &copy; <?php echo date_i18n('Y'); ?> NSW Nurses and Midwives’ Association
  </div>

</footer>