<?php
// inclure le header.php
get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Display post content
        if(has_post_thumbnail()) {
        	the_post_thumbnail('thumbnail');
        }
        echo '<h3><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>';
        the_excerpt();
    endwhile; 
endif; 


// inclure footer.php
get_footer();