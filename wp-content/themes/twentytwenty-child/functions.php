<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueues');

function my_theme_enqueues() {
	wp_enqueue_style('parent_style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('child_style', get_stylesheet_directory_uri().'/style.css');
}