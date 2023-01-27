<?php get_header(); ?>


<main class="container">
  <!-- logo -->
  <?php
  // In the template file, such as front-page.php, display the custom logo
  if (function_exists('the_custom_logo')) {
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'medium'); // change the size of the image
    $logo = $image[0];
    echo '<img src="' . $logo . '" >';
  }
  ?>

  <h2><?php echo get_bloginfo("description"); ?></h2>

  <p>
    <a href="#" class="" btn btn-primary>Let's Talk</a>
  </p>

  <hr>

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

    $posts = get_posts(array(
      "numberposts" => 3,
      "orderby" => 'date',
      "order" => 'desc',
      "category" => $category->term_id
    ));

    //Getting the thumbnail
    foreach ($posts as $fp) {
      //full, large, medium, small thumbnails 
      $url_thumbnail = get_the_post_thumbnail_url($fp->ID, 'medium'); //change the size of the image 
      $excerpt = get_the_excerpt($fp->ID);
      $url_post = get_permalink($fp->ID);
      $title = $fp->post_title;
      $date = $fp->post_date;

      //creating a link, displaying the title, date, and excerpt
      echo '<img src="' . $url_thumbnail . '" class="img-fluid"><br>';
      echo '<a href="' . $url_post . '">' . $title . '</a><br>';
      echo $date . '<br>';
      echo $excerpt . '<br>';
    }
  }
  ?>

  <?php
  // getting a Posts
  $posts = get_posts(
    array(
      'post_status' => 'publish',
    )
  );

  //Getting the thumbnail
  foreach ($posts as $fp) {
    //full, large, medium, small thumbnails 
    $url_thumbnail = get_the_post_thumbnail_url($fp->ID, 'medium'); // change the size of the image
    $excerpt = get_the_excerpt($fp->ID);
    $url_post = get_permalink($fp->ID);
    $title = $fp->post_title;
    $date = $fp->post_date;

    //creating a link, displaying the title, date, and excerpt
    echo '<img src="' . $url_thumbnail . '" class="img-fluid"><br>';
    echo '<a href="' . $url_post . '">' . $title . '</a><br>';
    echo $date . '<br>';
    echo $excerpt . '<br>';
  }
  ?>
</main>



<!-- get_sidebar(); -->
<div> This is the front page </div>
<?php get_footer(); ?>