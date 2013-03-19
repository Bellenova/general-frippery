<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and the header
 *
 * @package WordPress
 * @subpackage RotorWash
 * @since RotorWash 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title('&raquo;',true,'right'); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" 
          href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime(get_stylesheet_directory() . '/style.css'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
    // not using disqus? uncomment the following
    /*
    	if ( is_singular() && get_option( 'thread_comments' ) )
    		wp_enqueue_script( 'comment-reply' );
    */

    wp_head();
?>
</head>

<body <?php body_class(); ?>>
<header>
<? if (is_front_page()) { ?>
  <div id="logo"> <a href="<?php echo home_url( '/' ); ?>" 
               title="<?php echo esc_attr(get_bloginfo('name', 'display')), ' &mdash; ', esc_attr(get_bloginfo( 'description' )); ?>" 
               rel="home"><img src="<?php bloginfo('template_url'); ?>/media/images/logo-home.png" alt="<?php bloginfo( 'name' ); ?>"/></a> </div>
<? } else { ?>
<div id="logo"> <a href="<?php echo home_url( '/' ); ?>" 
               title="<?php echo esc_attr(get_bloginfo('name', 'display')), ' &mdash; ', esc_attr(get_bloginfo( 'description' )); ?>" 
               rel="home"><img src="<?php bloginfo('template_url'); ?>/media/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a> </div>
<? } ?>
  <nav id="access" role="navigation">
    <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
  </nav>
</header>

<div id="social-media">
<img src="<?php bloginfo('template_url'); ?>/media/images/media-icons.png" alt="<?php bloginfo( 'name' ); ?>" usemap="#Map"/>
</div>
<map name="Map">
  <area shape="rect" coords="3,4,31,26" href="/feed" alt="RSS">
  <area shape="rect" coords="41,4,65,24" href="http://www.twitter.com/#" alt="Twitter" target="_blank">
  <area shape="rect" coords="78,5,103,30" href="https://www.facebook.com/#" alt="FaceBook" target="_blank">
  <area shape="rect" coords="114,4,149,27" href="http://www.youtube.com/user/#?feature=results_main" alt="YouTube" target="_blank">
</map>
<section id="rw-content-wrapper">
