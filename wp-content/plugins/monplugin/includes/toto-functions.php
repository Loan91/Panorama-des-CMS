<?php
/* Test */
add_action('wp_footer', 'myplugin_FooterAddText');

function myplugin_FooterAddText(){
    echo "<i>Mon Plugin TOTO est activé!</i>";
}

/* Add menu in Admin */
add_action('admin_menu', 'myplugin_Add_AdminLink');

function myplugin_Add_AdminLink(){
    add_menu_page(
        'Plugin TOTO Page',
        'Plugin TOTO',
        'manage_options',
        'monplugin/includes/toto-acp-page.php'
    );
}

/* Shortcodes */
//[toto]
add_shortcode('toto', 'myplugin_TotoShortcode');

function myplugin_TotoShortcode(){
    return "<b>Mon Shortcode Toto</b>";
}