<?php

add_action('wp_enqueue_scripts', function () {
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');
    if (!file_exists($manifestPath)) return;

    $manifest = json_decode(file_get_contents($manifestPath), true);

    // CSS
    if (isset($manifest['wp-content/themes/levieuxmoulin/resources/css/styles.scss']['file'])) {
        wp_enqueue_style(
            'levieuxmoulin',
            get_theme_file_uri('public/' . $manifest['wp-content/themes/levieuxmoulin/resources/css/styles.scss']['file']),
            [],
            null
        );
    }

    // reCAPTCHA v3 — uniquement sur la page contact
    $js_deps = [];
    if (is_page_template('template-contact.php') && defined('RECAPTCHA_SITE_KEY')) {
        wp_enqueue_script(
            'google-recaptcha',
            'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY,
            [],
            null,
            true
        );
        $js_deps = ['google-recaptcha'];
    }

    // JS principal (contient le code reCAPTCHA via Vite)
    if (isset($manifest['wp-content/themes/levieuxmoulin/resources/js/main.js']['file'])) {
        wp_enqueue_script(
            'levieuxmoulin',
            get_theme_file_uri('public/' . $manifest['wp-content/themes/levieuxmoulin/resources/js/main.js']['file']),
            $js_deps,
            null,
            true
        );
    }

    // Passe la siteKey au JS principal sur la page contact
    if (is_page_template('template-contact.php') && defined('RECAPTCHA_SITE_KEY')) {
        wp_localize_script('levieuxmoulin', 'levmRecaptcha', [
            'siteKey' => RECAPTCHA_SITE_KEY,
        ]);
    }
});
