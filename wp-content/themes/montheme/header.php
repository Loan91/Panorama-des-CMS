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
//display main_menu
wp_nav_menu(array(
	'theme_location' => 'main_menu'));