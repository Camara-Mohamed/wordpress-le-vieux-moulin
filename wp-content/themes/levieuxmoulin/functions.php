<?php

if (!session_id()) {
    session_start();
}

add_theme_support('post-thumbnails');

// Setup du thème
require_once get_template_directory() . '/inc/setup.php';

require_once get_template_directory() . '/inc/assets.php';
require_once get_template_directory().'/inc/post-types.php';
require_once get_template_directory() . '/inc/navigation.php';