<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php if ( is_home() || is_front_page() ) : ?>
<title><?php bloginfo('name'); ?> | <?php bloginfo('description');?></title>
<?php else : ?>
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
<?php endif; ?>
<meta name="theme-color" content="#2C2E2F" />
<meta name="keywords" content="<?php echo io_get_option('seo_home_keywords') ?>">
<meta name="description" content="<?php echo io_get_option('seo_home_desc') ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri() ?>/screenshot.png">
<link rel="shortcut icon" href="<?php echo io_get_option('favicon') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/style.css'?>">
<link rel="apple-touch-icon" href="<?php echo io_get_option('apple_icon') ?>">
<?php wp_head(); ?>
</head>
 <body class="page-body <?php echo io_get_option('theme_mode')?>">
    <div class="page-container">
      