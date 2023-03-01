<?php
get_header();

get_template_part('content-blocks/layouts/page-header', '', array('breadcrumbs' => true));

get_template_part('content-blocks/page', 'builder');

get_footer();
