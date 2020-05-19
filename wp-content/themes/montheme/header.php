<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<?php wp_head();?>
</head>
<body>
	<header>
		<h1><?php bloginfo('name');?></h1>
		<p><?php bloginfo('description');?></p>
	</header>

<?php
$id = get_theme_mod('ban_img');

if($id != 0){
    $url = wp_get_attachment_url($id);
    echo '<img src="'.$url.'">';
}

//display main_menu
wp_nav_menu(array(
	'theme_location' => 'main_menu'));