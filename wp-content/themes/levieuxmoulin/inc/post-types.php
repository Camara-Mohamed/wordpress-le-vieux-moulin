<?php

register_post_type('news', [
    'labels' => [
        'name' => 'Actualités',
        'singular_name' => 'Actualité',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'actualites'],
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'show_in_rest' => true,
]);