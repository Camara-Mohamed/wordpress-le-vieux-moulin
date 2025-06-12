<?php

// Chargement des assets
$manifestPath = get_theme_file_path('public/.vite/manifest.json');
if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest['wp-content/themes/levieuxmoulin/resources/css/styles.scss']['file'])) {
        wp_enqueue_style(
            'levieuxmoulin',
            get_theme_file_uri('public/'.$manifest['wp-content/themes/levieuxmoulin/resources/css/styles.scss']['file']),
            [],
            null
        );
    }

    if (isset($manifest['wp-content/themes/levieuxmoulin/resources/js/main.js']['file'])) {
        wp_enqueue_script(
            'levieuxmoulin',
            get_theme_file_uri('public/'.$manifest['wp-content/themes/levieuxmoulin/resources/js/main.js']['file']),
            [],
            null,
            true
        );
    }
}