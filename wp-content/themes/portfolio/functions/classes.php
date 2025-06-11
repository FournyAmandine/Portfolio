<?php

function class_body($classes) {
    if (is_page(11)||is_page(18)) {
        $classes[] = 'about';
    }
    if (is_page(13)||is_page(24)) {
        $classes[] = 'projects';
    }
    if (is_page(15)||is_page(22)) {
        $classes[] = 'contact';
    }
    if (is_page(544)||is_page(546)) {
        $classes[] = 'privacy';
    }

    return $classes;
}
add_filter('body_class', 'class_body');