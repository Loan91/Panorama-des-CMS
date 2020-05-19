<?php
/* Enqueues Styles and Scripts */
add_action('wp_enqueue_scripts', 'mytheme_enqueues');

function mytheme_enqueues() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
}

add_theme_support('title-tag');

/* Activer les menus */
add_action('after_setup_theme', 'mytheme_menus');

function mytheme_menus() {
	register_nav_menus(array(
		'main_menu'   => __('Menu Principal', 'mythemelg'),
		'footer_menu' => __('Menu du pied de page', 'mythemelg')
	)
	);
}

/* Activer les widgets */
add_action('widgets_init', 'mytheme_sidebars');

function mytheme_sidebars() {
	register_sidebar(array(
		'name' 		  => __('Ma colonne latérale', 'mythemelg'),
		'id' 		  => 'sidebar-1',
		'description' => __('Colonne latérale des articles', 'mythemelg')
	));
	register_sidebar(array(
		'name' 		  => __('Zone de pied de page', 'mythemelg'),
		'id' 		  => 'sidebar-2',
		'description' => __('Dans le pied de page', 'mythemelg')
	));
}