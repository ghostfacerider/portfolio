<?php get_header(); ?>

<div class="row">
  <div class="col-md-6">
    <div class="d-flex justify-content-end">
      <h2><?php echo get_bloginfo("description"); ?></h2>
      <p>
        <a href="<?php echo get_permalink( get_page_by_path('contact') )?>" class="btn btn-primary">Let's Talk</a>
      </p>
  </div>
</div>

<div class="col-md-6">
  <!-- logo -->
    <?php
    // In the template file, such as front-page.php, display the custom logo
      if (function_exists('the_custom_logo')) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'medium'); // change the size of the image
        $logo = $image[0];
        // making the image a circle
        echo '<img class="img-fluid round-circle" src="' . $logo . '" >';
      }
    ?>
  </div>
</div>
  
  <!-- getting all categories -->
  <?php
  $categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC'
  ));

  foreach ($categories as $category) {
    $category_link = get_category_link($category);
    $category_name = $category->name;

    echo ' <h3><a href="' . $category_link . '">' . $category_name . '</a></h3>';

    // Get post

    $posts = get_posts(array(
      "numberposts" => 3,
      "orderby" => 'date',
      "order" => 'desc',
      "category" => $category->term_id
    ));


    foreach ($posts as $fp) {
      echo'<div class="row">';
      echo'<div class="col-md-6">';
      
      //full, large, medium, small thumbnails 
      $url_thumbnail = get_the_post_thumbnail_url($fp->ID, 'medium'); //change the size of the image 
      $excerpt = get_the_excerpt($fp->ID);
      // to get the  hyperlink
      $url_post = get_permalink($fp->ID);
      $title = $fp->post_title;
      $date = get_the_date('F j, Y', $fp->ID);

      //creating a link, displaying the title, date, and excerpt
      echo '<img src="' . $url_thumbnail . '" class="img-fluid"><br>';

      echo'</div><div class="col-md-6">';
      echo '<a href="' . $url_post . '">' . $title . '</a><br>';
      echo $date . '<br>';
      echo $excerpt . '<br>';
      echo '</div></div>';
    }
  }
  ?>

<?php echo "<div> This is the front page!!! </div>"; ?>
<!-- get_sidebar(); -->
<?php get_footer(); ?>
