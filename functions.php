<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
date_default_timezone_set('Asia/Shanghai');
require get_template_directory() . '/inc/inc.php';

//登录页面的LOGO链接为首页链接
add_filter('login_headerurl',function() {return get_bloginfo('url');});
//登陆界面logo的title为博客副标题
add_filter('login_headertext',function() {return get_bloginfo( 'description' );});

//WordPress 5.0+移除 block-library CSS
add_action( 'wp_enqueue_scripts', 'fanly_remove_block_library_css', 100 );
function fanly_remove_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}
function geturl($slug, $type="page") { //slug
    global $wpdb;
    if ($type == "page") {
        $url_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'");
        echo get_permalink($url_id);
    }else {
        $url_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug = '".$slug."'");
        echo get_category_link($url_id);
    }
}
function changeTheme(){
    $theme=$_POST["theme"];
    switch ($theme) {
        case "white":
            cs_set_option('theme_mode','white');
            break;
        case "black":
            cs_set_option('theme_mode','black');
            break;
        default:
            break;
    }
    echo io_get_option('theme_mode');
    die();
}
add_action( 'wp_ajax_changeTheme', 'changeTheme' );
add_action( 'wp_ajax_nopriv_changeTheme', 'changeTheme' );