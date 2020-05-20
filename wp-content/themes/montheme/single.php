<?php
// inclure le header.php
get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Display post content
        if(has_post_thumbnail()) {
        	the_post_thumbnail('large');
        }

        if( get_post_meta(get_the_ID(), '_wporg_meta_key', true) == "something")
            echo "C'est Something";
        if( get_post_meta(get_the_ID(), '_wporg_meta_key', true) == "else")
            echo "C'est Else";

        echo"<br>";

        echo get_post_meta(get_the_ID(), '_date_meta_key', true);

        echo '<h3><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>';
        the_content();
    endwhile; 
endif; 

//display widgets
dynamic_sidebar('sidebar-1');

// inclure footer.php
get_footer();