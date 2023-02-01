<?php
if (!function_exists('myhellotheme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function myhellotheme_setup()
	{

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain('myhellotheme', get_template_directory() . '/languages');

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(array(
			'primary'   => __('Primary Menu', 'myhellotheme'),
			// 'secondary' => __( 'Secondary Menu', 'myhellotheme' ),
		));

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));


		/* Logo */
		$defaults = array(
			'height' => 400,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description'),
			'unlink-homepage-logo' => true,
		);
		add_theme_support('custom-logo', $defaults);
	}
endif; // myfirsttheme_setup
add_action('after_setup_theme', 'myhellotheme_setup');

// enqueue
wp_enqueue_style('bootstrap_sytle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
wp_enqueue_script('bootstrap_script','https"//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.j');
wp_enqueue_style('sytle', get_stylesheet_uri('style.css'));