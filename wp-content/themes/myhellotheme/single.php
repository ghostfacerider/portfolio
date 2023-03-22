<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <h2><?php the_title();  ?></h2>

        <p>
            <?php the_author(); ?> 
            <br>
            <?php echo get_the_date('F j, Y');?>
        </p>

        <?php 
        $id = get_the_ID();

        // displaying the image
        $url_thumbnail = get_the_post_thumbnail_url($id, 'full'); //change the size of the image 
        echo '<img src="' . $url_thumbnail . '" class="img-fluid"><br>';
        
        //displaying  the content
        the_content(); 
        the_category();
        
        ?>

<?php
    endwhile;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

// get_sidebar();
get_footer();
?>