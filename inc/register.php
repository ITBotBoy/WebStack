<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'THEME_URL', get_bloginfo('template_directory') );
function theme_load_scripts() {
	$theme_version = esc_attr(wp_get_theme()->get('Version'));
    wp_register_style( 'font-awesome',      THEME_URL.'/css/font-awesome.min.css', array(), $theme_version, 'all'  );
    wp_register_style( 'font-iconfont',      THEME_URL.'/css/iconfont.css', array(), $theme_version, 'all'  );
	wp_register_style( 'bootstrap',         THEME_URL.'/css/bootstrap.css', array(), $theme_version, 'all'  );
	wp_register_style( 'nav',               THEME_URL.'/css/nav.css', array(), $theme_version );

	wp_register_script( 'bootstrap',        THEME_URL.'/js/bootstrap.min.js', array('jquery'), $theme_version, true );
	wp_register_script( 'TweenMax',         THEME_URL.'/js/TweenMax.min.js', array('jquery'), $theme_version, true );
	wp_register_script( 'appjs',            THEME_URL.'/js/app.js', array('jquery'), $theme_version, true );
	wp_register_script( 'lazyload',         THEME_URL.'/js/lazyload.min.js', array('jquery'), $theme_version, true );

	if( !is_admin() )
    {
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('font-iconfont');
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('nav'); 

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', THEME_URL.'/js/jquery-1.11.1.min.js', array(), $theme_version ,false);
		wp_enqueue_script('jquery');

		wp_enqueue_script('bootstrap');
		wp_enqueue_script('TweenMax');
		wp_enqueue_script('appjs'); 
		
		if(io_get_option('lazyload')) wp_enqueue_script('lazyload'); 

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	wp_localize_script('appjs', 'theme' , array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'addico'  => get_template_directory_uri() . '/images/add.png',
	)); 
}
add_action('wp_enqueue_scripts', 'theme_load_scripts');
 