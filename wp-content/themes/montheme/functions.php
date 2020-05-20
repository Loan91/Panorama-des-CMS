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

/* The customizer API */

add_action('customize_register', 'mytheme_customizer');

function mytheme_customizer($wp_customize){
    $wp_customize->add_section('cd_colors', array(
        'title' => __('Couleurs', 'mythemelg'),
        'priority' => 30
    ));
    $wp_customize->add_setting('bg_color', array(
        'default' => '#FFFFFF'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
        'bg_color', array(
            'label' => __('Couleur de fond', 'mythemelg'),
            'section' => 'cd_colors'
        )));

    $wp_customize->add_setting('txt_color', array(
        'default' => '#000000'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
        'txt_color', array(
            'label' => __('Couleur des textes', 'mythemelg'),
            'section' => 'cd_colors'
        )));

    $wp_customize->add_section('media', array(
        'title' => __('Bannière', 'mythemelg'),
        'priority' => 35
    ));
    $wp_customize->add_setting('ban_img', array(
        'default' => ''
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize,
        'bg_color', array(
            'label' => __('Choisir votre bannière'),
            'section' => 'media'
        )));
}

/* Apply settings */
add_action('wp_head', 'mytheme_customizercss');

function mytheme_customizercss(){
    echo '<style>body{background:'.get_theme_mod('bg_color').';color:'.
        get_theme_mod('txt_color').';}</style>';
}

/* Custom Post Types */

add_action('init', 'mytheme_cpt');

function mytheme_cpt(){
    $labels = array(
        'name' => __('Evenements', 'mythemelg')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-awards',
        'hierarchical' => true
    );

    register_post_type('events', $args);
}

/* Taxonomie */

add_action('init', 'mytheme_customtaxo');

function mytheme_customtaxo(){
    $labels_type = array(
        'name' => __('Genres', 'mythemelg'),
        'singular_name' => __('Genre', 'mythemelg'),
        'all_items' => __('Tous les genres', 'mythemelg')
    );

    $args_type = array(
        'hierarchical' => true,
        'labels' => $labels_type,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_in_menu' => true
    );

    register_taxonomy('genres', 'events', $args_type);
}

/* Custom field */

add_action('add_meta_boxes', 'mytheme_add_custommetabox');

function mytheme_add_custommetabox(){
    $events = ['events'];
    foreach ($events as $event){
        add_meta_box(
            'begin_metabox', // Unique ID
            'Date de début',
            'mytheme_custommetabox_html',
            $event
        );
    }
}

//En attente de correction
function mytheme_custommetabox_html($post){
    // Structure HTML champs personnalisé
    $value = get_post_meta($post->ID, '_wporg_meta_key', true);
    ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something" <?php selected($value, 'something'); ?>>Something</option>
        <option value="else" <?php selected($value, 'else'); ?>>Else</option>
    </select>
    <label for="date_field">Date for this field</label>
    <input type="date" name="date_field" id="date_field">
    <?php
}

add_action('save_post', 'mytheme_save_postdata');

//En attente de correction
function mytheme_save_postdata($post_id){
    // update_post_meta($post_id,...)
    if (array_key_exists('wporg_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
    if (array_key_exists('date_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_date_meta_key',
            $_POST['date_field']
        );
    }
}

/* TP Custom field */