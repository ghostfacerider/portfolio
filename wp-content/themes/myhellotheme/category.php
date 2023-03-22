<?php

get_header();

$category_name = single_cat_title('', false);
echo '<h2>'.$category_name. '</h2><br>';

if (have_posts()) :
    while (have_posts()) : the_post();
    $id = the_ID();
    $title = get_the_title($id);
    $excerpt = get_the_excerpt($id);
    // to get the  hyperlink get_permalink
    $url_post = get_permalink($id);
    $url_thumbnail = get_the_post_thumbnail_url($fp->ID, 'medium'); //change the size of the image 


    echo'<div class="row"><div class="col-md-3">';
    echo '<img src="' . $url_thumbnail . '" class="img-fluid"><br>';
    echo'<h3><a href="'.$url_post.'">'.$title.'</a></h3>';
    echo $excerpt;
    echo '</div><?div>';
        

    endwhile;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

// get_sidebar();

get_footer();

?>
