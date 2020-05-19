<?php
//inclure le header
get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		if ( has_post_thumbnail() ) :
			the_post_thumbnail('thumbnail');
		endif;
		echo '<h3><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>';
		the_content();
	endwhile;
endif;

//display widgets
dynamic_sidebar('sidebar-1');

//inclure le footer
get_footer();