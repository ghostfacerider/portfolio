
<footer>
    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo("name"); ?></a>
        </div>

        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <ul class="nav">
                    <?php 
                    $menu = wp_get_nav_menu_items('Primary Menu');

                    foreach($menu as $menu_item)
                    {
                        echo '<li class="nav-item"><a href="'.$menu_item->url.'"class="nav-link">'.$menu_item->title.'</a></li>'; //$menu_item->url." ".$menu_item->title ."<br>";
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- close container-->
<?php wp_footer(); ?>

</body>
</html> 