<?php
//display footer widgets
dynamic_sidebar('sidebar-2');

//display footer_menu
wp_nav_menu(array(
	'theme_location' => 'footer_menu'));
//hook
wp_footer();
?>
</body>
</html>