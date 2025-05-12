<?php
register_taxonomy('projects_type', ['projects'], [
    'labels' => [
        'name' => 'Les types de projets',
        'singular' => 'Les types de projets'
    ],
    'description' => 'Les types de projets',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'type-de-projets'],
],
);

