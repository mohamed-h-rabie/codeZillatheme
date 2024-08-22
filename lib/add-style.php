<?php

function codezilla_enqueue_style()
{
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('album', get_stylesheet_directory_uri() . '/assets/css/album.css');
    wp_enqueue_script(
        'popper',
        get_stylesheet_directory_uri() . '/assets/js/vendor/popper.min.js',
        array(),
        false,
        true
    );
    wp_enqueue_script(
        'bootstrap-min',
        get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js',
        array(),
        false,
        true
    );
    wp_enqueue_script(
        'vendor',
        get_stylesheet_directory_uri() . '/assets/js/vendor/holder.min.js',
        array(),
        false,
        true
    );
}
add_action('wp_enqueue_scripts', 'codezilla_enqueue_style');
