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


register_post_type('contact_message', [
    'label' => 'Message de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-email',
    'public' => true,
    'has_archive' => false,
    'supports' => [
        'title',
        'editor',
    ]
]);
