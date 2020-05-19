<?php
/* Template des pages categories
 * titre de la categorie
 * description
 * zone de widtgets
 * liste des articles avec titre et extrait
 * pagination
 */

get_header();

single_cat_title();
echo category_description();

if(have_posts()):
    while(have_posts()): the_post();
        if(has_post_thumbnail()){
            the_post_thumbnail('thumbnail');
        }
        echo '<h3><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>';
        the_excerpt();
    endwhile;
endif;

get_footer();