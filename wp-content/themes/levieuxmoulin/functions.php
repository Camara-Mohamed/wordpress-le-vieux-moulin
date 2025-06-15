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
require_once get_template_directory() . '/forms/contactForm.php';

// Page d'option
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Informations générales',
        'menu_title' => 'Informations générales',
        'menu_slug' => 'some-informations',
        'capability' => 'edit_posts',
        'icon_url'      => 'dashicons-info',
        'redirect' => false
    ));
}

add_action('admin_post_nopriv_submit_contact_form', 'levm_handle_contact_form');
add_action('admin_post_submit_contact_form', 'levm_handle_contact_form');