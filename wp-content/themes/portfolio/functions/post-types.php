<?php

register_post_type('projects', [
    'label' => 'Projets',
    'description' => 'Les projets de mon portfolio',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer',
    'public' => true,
    'rewrite' => [
        'slug' => 'actualites'
    ],
    'supports' => [
        'title',
        'thumbnail',
    ]
]);
