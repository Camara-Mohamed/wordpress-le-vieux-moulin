<?php

register_post_type('news', [
    'labels' => [
        'name' => __('Actualités', 'levm'),
        'singular_name' => __('Actualité', 'levm'),
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'actualites'],
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'show_in_rest' => true,
]);