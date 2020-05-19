<?php
/* Enqueue Styles and Scripts */ 

add_action('wp_enqueue_scripts','mytheme_enqueues');

function mytheme_enqueues() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
	wp_enqueue_style('bootstrap-css','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
}


add_theme_support('title-tag');
add_theme_support('post_thumbnails');

/* Menus */
add_action('after_setup_theme', 'mytheme_menus');

function mytheme_menus() {
	register_nav_menus(array(
		'main_menu' => __('Menu Principal', 'mythemelg'),
		'footer_menu' => __('Menu du footer', 'mythemelg')
	)
	);
}

/* Widgets */

add_action('widgets_init', 'mytheme_sidebars');

function mytheme_sidebars() {
	register_sidebar(
		array(
			'name' => __('Ma colonne latérale', 'mythemelg'),
			'id'	=> 'sidebar-1',
			'description' => __('Colonne latérale des articles', 'mythemelg')
		)
	);
	register_sidebar(
		array(
			'name' => __('Zone de pied de page', 'mythemelg'),
			'id'	=> 'sidebar-2',
			'description' => __('dans le pied de page', 'mythemelg')
		)
	);
}








